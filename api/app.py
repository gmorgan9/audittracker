from flask import Flask, request, jsonify
import mysql.connector
import random

app = Flask(__name__)

# MySQL connection
def get_db_connection():
    return mysql.connector.connect(
        host='localhost',
        user='dbuser',
        password='DBuser123!',
        database='audittracker'
    )

def generate_unique_idno(cursor):
    while True:
        e_idno = random.randint(1000000, 9999999)
        cursor.execute("SELECT COUNT(*) FROM engagements WHERE idno = %s", (e_idno,))
        if cursor.fetchone()[0] == 0:
            return e_idno

# Sanitize empty strings to None, ensuring null values are properly handled
def sanitize(value):
    return value if value != '' else None

@app.route('/upload_data', methods=['POST'])
def upload_data():
    data = request.get_json()

    if not data:
        return jsonify({'error': 'No JSON payload provided'}), 400

    conn = get_db_connection()
    cursor = conn.cursor()

    try:
        for row in data:
            # Generate a unique IDNO
            e_idno = generate_unique_idno(cursor)

            # Roles with corresponding DOL fields
            roles = {
                'manager': {'name': row['manager'], 'dol': None},
                'senior': {'name': row['senior'], 'dol': row['senior_dol']},
                'staff_1': {'name': row['staff_1'], 'dol': row['staff_1_dol']},
                'staff_2': {'name': row['staff_2'], 'dol': row['staff_2_dol']}
            }

            # Count assigned sections for Garrett Morgan
            garrett_section_count = 0
            for role, data in roles.items():
                if data['name'] == 'Garrett Morgan' and data['dol']:
                    sections = [section.strip() for section in data['dol'].split(',') if section.strip()]
                    garrett_section_count += len(sections)

            # Insert into engagements table
            sql = """
                INSERT INTO engagements (
                    idno, name, type, reporting_start, reporting_end, reporting_as_of,
                    irl_due_date, evidence_due_date, fieldwork_week, leadsheet_due,
                    draft_date, final_date, manager, senior, staff_1, staff_2,
                    senior_dol, staff_1_dol, staff_2_dol, number_sections
                ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
            """
            values = (
                e_idno, sanitize(row['name']), sanitize(row['type']), sanitize(row.get('reporting_start')),
                sanitize(row.get('reporting_end')), sanitize(row.get('reporting_as_of')),
                sanitize(row.get('irl_due_date')), sanitize(row.get('evidence_due_date')),
                sanitize(row.get('fieldwork_week')), sanitize(row.get('leadsheet_due')),
                sanitize(row.get('draft_date')), sanitize(row.get('final_date')),
                sanitize(row.get('manager')), sanitize(row.get('senior')),
                sanitize(row.get('staff_1')), sanitize(row.get('staff_2')),
                sanitize(row.get('senior_dol')), sanitize(row.get('staff_1_dol')), sanitize(row.get('staff_2_dol')),
                garrett_section_count
            )
            cursor.execute(sql, values)

            # Insert into assigned_sections for Garrett Morgan if any DOL is present
            for role, data in roles.items():
                if data['name'] == 'Garrett Morgan' and data['dol']:
                    sections = [section.strip() for section in data['dol'].split(',') if section.strip()]
                    for section in sections:
                        insert_stmt = """
                        INSERT INTO assigned_sections (engagement_idno, section, employee, status)
                        VALUES (%s, %s, %s, %s)
                        """
                        cursor.execute(insert_stmt, (e_idno, section, data['name'], 'Assigned'))

        conn.commit()
        return jsonify({'message': 'Data inserted successfully'}), 200

    except Exception as e:
        conn.rollback()
        return jsonify({'error': str(e)}), 500

    finally:
        cursor.close()
        conn.close()

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)

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

@app.route('/upload_data', methods=['POST'])
def upload_data():
    data = request.get_json()

    if not data:
        return jsonify({'error': 'No JSON payload provided'}), 400

    conn = get_db_connection()
    cursor = conn.cursor()

    try:
        for row in data:
            # Generate a unique ID (IDNO)
            e_idno = random.randint(1000000, 9999999)

            # Sanitize the input, converting empty strings to None
            def sanitize(value):
                return value if value != '' else None

            # Roles with corresponding DOL fields
            roles = {
                'manager': {'name': row['manager'], 'dol': None},
                'senior': {'name': row['senior'], 'dol': row['senior_dol']},
                'staff_1': {'name': row['staff_1'], 'dol': row['staff_1_dol']},
                'staff_2': {'name': row['staff_2'], 'dol': row['staff_2_dol']}
            }

            # Calculate number of sections for Garrett Morgan
            number_sections = 0
            for role, data in roles.items():
                if data['name'] == 'Garrett Morgan' and data['dol']:
                    sections = [section.strip() for section in data['dol'].split(',') if section.strip()]
                    number_sections += len(sections)

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
                e_idno, row['name'], row['type'], row.get('reporting_start'), row.get('reporting_end'),
                row.get('reporting_as_of'), row.get('irl_due_date'), row.get('evidence_due_date'),
                row.get('fieldwork_week'), row.get('leadsheet_due'), row.get('draft_date'),
                row.get('final_date'), row.get('manager'), row.get('senior'), row.get('staff_1'),
                row.get('staff_2'), row.get('senior_dol'), row.get('staff_1_dol'), row.get('staff_2_dol'),
                number_sections
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

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

    rows_inserted = []
    rows_failed = []

    try:
        for row in data:
            # Generate unique ID
            e_idno = random.randint(1000000, 9999999)
            status = 'Active'

            # Insert into engagements table
            sql = """
                INSERT INTO engagements (
                    idno, name, type, reporting_start, reporting_end, reporting_as_of,
                    irl_due_date, evidence_due_date, fieldwork_week, leadsheet_due,
                    draft_date, final_date, manager, senior, staff_1, staff_2,
                    senior_dol, staff_1_dol, staff_2_dol, status
                ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
            """
            values = (
                e_idno,
                row.get('name'), row.get('type'), row.get('reporting_start'),
                row.get('reporting_end'), row.get('reporting_as_of'), row.get('irl_due_date'),
                row.get('evidence_due_date'), row.get('fieldwork_week'), row.get('leadsheet_due'),
                row.get('draft_date'), row.get('final_date'), row.get('manager'),
                row.get('senior'), row.get('staff_1'), row.get('staff_2'),
                row.get('senior_dol'), row.get('staff_1_dol'), row.get('staff_2_dol'), status
            )

            cursor.execute(sql, values)

            # Insert into assigned_sections ONLY for Garrett Morgan
            for role in ['senior_dol', 'staff_1_dol', 'staff_2_dol']:
                employee_role = role.replace('_dol', '')
                assigned_employee = row.get(employee_role)

                if assigned_employee and assigned_employee.strip().lower() == 'garrett morgan' and row.get(role):
                    sections = [section.strip() for section in row[role].split(',') if section.strip()]
                    for section in sections:
                        insert_stmt = """
                        INSERT INTO assigned_sections (engagement_idno, section, employee, status)
                        VALUES (%s, %s, %s, %s)
                        """
                        cursor.execute(insert_stmt, (e_idno, section, 'Garrett Morgan', 'Assigned'))

            conn.commit()
            rows_inserted.append(row)

        return jsonify({
            'message': 'Data uploaded successfully',
            'rows_inserted': len(rows_inserted),
            'rows_failed': len(rows_failed),
            'failed_rows': rows_failed
        }), 200

    except mysql.connector.Error as e:
        conn.rollback()
        return jsonify({'error': str(e)}), 500

    finally:
        cursor.close()
        conn.close()

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)

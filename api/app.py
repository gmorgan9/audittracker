from flask import Flask, request, jsonify
import mysql.connector

app = Flask(__name__)

# MySQL connection
def get_db_connection():
    return mysql.connector.connect(
        host='your-db-host',
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
            sql = """
            INSERT INTO engagements (
                name, type, reporting_start, reporting_end, reporting_as_of,
                irl_due_date, evidence_due_date, fieldwork_week, leadsheet_due,
                draft_date, final_date, manager, senior, staff_1, staff_2,
                senior_dol, staff_1_dol, staff_2_dol
            ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
            """
            values = (
                row['name'], row['type'], row['reporting_start'], row['reporting_end'],
                row['reporting_as_of'], row['irl_due_date'], row['evidence_due_date'],
                row['fieldwork_week'], row['leadsheet_due'], row['draft_date'],
                row['final_date'], row['manager'], row['senior'], row['staff_1'],
                row['staff_2'], row['senior_dol'], row['staff_1_dol'], row['staff_2_dol']
            )
            cursor.execute(sql, values)

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

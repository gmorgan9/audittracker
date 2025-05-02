from flask import Flask, request, jsonify
import mysql.connector
import pandas as pd
from werkzeug.utils import secure_filename
import os

# Initialize Flask app
app = Flask(__name__)

# Configuring the upload folder
UPLOAD_FOLDER = 'uploads'
ALLOWED_EXTENSIONS = {'xls', 'xlsx'}

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

# Helper function to check file extension
def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

# MySQL connection
def get_db_connection():
    conn = mysql.connector.connect(
        host='localhost',
        user='dbuser',
        password='DBuser123!',
        database='audittracker'
    )
    return conn

# API endpoint to handle file upload and data insertion
@app.route('/upload_data', methods=['POST'])
def upload_data():
    # Check if a file is part of the request
    if 'file' not in request.files:
        return jsonify({'error': 'No file part'}), 400
    file = request.files['file']

    # If no file is selected or file extension is not allowed
    if file.filename == '' or not allowed_file(file.filename):
        return jsonify({'error': 'No selected file or invalid file format'}), 400

    # Save the file securely (assuming you want to save it as 'engagements.xlsx')
    filename = 'engagements.xlsx'  # We enforce the filename to be 'engagements.xlsx'
    file_path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
    file.save(file_path)

    # Read the Excel file using pandas
    try:
        df = pd.read_excel(file_path, engine='openpyxl')
    except Exception as e:
        return jsonify({'error': f'Error reading the file: {e}'}), 400

    # Connect to the database
    conn = get_db_connection()
    cursor = conn.cursor()

    # Iterate through the rows and insert each one into the 'engagements' table
    for index, row in df.iterrows():
        sql = """
        INSERT INTO engagements (
            name, type, reporting_start, reporting_end, reporting_as_of, 
            irl_due_date, evidence_due_date, fieldwork_week, leadsheet_due, 
            draft_date, final_date, manager, senior, staff_1, staff_2, 
            senior_dol, staff_1_dol, staff_2_dol
        ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
        """
        
        # Prepare the values from the row
        values = (
            row['name'], row['type'], row['reporting_start'], row['reporting_end'],
            row['reporting_as_of'], row['irl_due_date'], row['evidence_due_date'],
            row['fieldwork_week'], row['leadsheet_due'], row['draft_date'], 
            row['final_date'], row['manager'], row['senior'], row['staff_1'],
            row['staff_2'], row['senior_dol'], row['staff_1_dol'], row['staff_2_dol']
        )

        # Execute the SQL query
        cursor.execute(sql, values)

    # Commit and close the database connection
    conn.commit()
    cursor.close()
    conn.close()

    # Return a success message
    return jsonify({'message': 'Data uploaded successfully'}), 200

if __name__ == '__main__':
    # Run the Flask app
    app.run(debug=True, host='0.0.0.0', port=5000)

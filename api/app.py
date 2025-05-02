from flask import Flask, request, jsonify
import mysql.connector

# Initialize Flask app
app = Flask(__name__)

# MySQL connection function
def get_db_connection():
    conn = mysql.connector.connect(
        host='localhost',        # Change to your server IP
        user='dbuser',               # Your database user
        password='DBuser123!',       # Your database password
        database='audittracker'      # Your database name
    )
    return conn

# API endpoint to handle data insertion into MySQL
@app.route('/upload_data', methods=['POST'])
def upload_data():
    # Get the data from the request JSON
    data = request.get_json()

    # Check if the required data fields are present
    if not data or not data.get('name') or not data.get('position') or not data.get('type'):
        return jsonify({'error': 'Missing data fields (name, position, type)'}), 400

    # Extract data
    name = data['name']
    position = data['position']
    user_type = data['type']

    # Connect to the database
    conn = get_db_connection()
    cursor = conn.cursor()

    # Insert data into the MySQL table
    sql = "INSERT INTO users (name, position, type) VALUES (%s, %s, %s)"
    values = (name, position, user_type)
    cursor.execute(sql, values)

    # Commit the changes and close the connection
    conn.commit()
    cursor.close()
    conn.close()

    # Return a success message
    return jsonify({'message': 'Data uploaded successfully'}), 200

if __name__ == '__main__':
    # Run the Flask app
    app.run(debug=True, host='0.0.0.0', port=5000)

<?php
// update_status.php
include 'db_connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section_id = $_POST['section_id'];
    $status = $_POST['status'];

    // Sanitize inputs
    $section_id = (int)$section_id;
    $status = ($status === 'completed') ? 'completed' : 'assigned';

    // Update the section status in the database
    $stmt = $conn->prepare("UPDATE assigned_sections SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $section_id);

    if ($stmt->execute()) {
        echo 'success'; // Return success
    } else {
        echo 'error'; // Return error if the query failed
    }

    $stmt->close();
}
?>

<?php

// Include the necessary files
include_once '../../../path.php'; // Assuming this defines BASE_URL
include_once ROOT_PATH . '/app/database/connection.php';

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Construct the SQL query
    $d_sql = "DELETE FROM comments WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($conn, $d_sql)) {
        
    } else {
        // Handle errors if any
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // Handle the case when id is not set in the URL
    // echo "ID not provided.";
}
?>
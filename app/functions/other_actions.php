<?php

// UPDATE COMMENT
// Update comment
if (isset($_POST['update_comment'])) {
    // Get the form data
    $reference = $_POST['reference'];
    $comment_by = $_POST['comment_by'];
    $status = $_POST['status'];
    $comment = $_POST['comment'];

    // You will also need a unique identifier for the comment (e.g., comment_id)
    $comment_id = $_POST['comment_id']; // Make sure this is included as a hidden input in your form

    // Basic validation
    if (empty($reference) || empty($comment_by) || empty($status) || empty($comment)) {
        echo "All fields are required!";
        exit;
    }

    // Prepare the update query
    $sql = "UPDATE comments SET reference = ?, comment_by = ?, status = ?, comment = ? WHERE comment_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ssssi", $reference, $comment_by, $status, $comment, $comment_id);

    // Execute the query and handle the result
    if ($stmt->execute()) {
        header("Location: /"); // Change the redirect path as needed
        exit;
    } else {
        echo "Error updating comment: " . $stmt->error;
    }

    // Clean up
    $stmt->close();
    $conn->close();
}
// END UPDATE COMMENT

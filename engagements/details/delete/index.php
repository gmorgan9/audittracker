<?php

// DELETE COMMENT AND CHILD COMMENTS
if (isset($_GET['id'])) {
    // Get the parent comment ID and engagement ID
    $comment_id = $_GET['id'];
    $engagement_idno = $_GET['eidno'];

    // Validate input
    // if (empty($comment_id) || empty($engagement_idno)) {
    //     echo "Comment ID and Engagement ID are required!";
    //     exit;
    // }

    // Step 1: Delete child comments
    $sql_child = "DELETE FROM comments WHERE parent_comment_id = ?";
    $stmt_child = $conn->prepare($sql_child);
    $stmt_child->bind_param("s", $comment_id);

    if (!$stmt_child->execute()) {
        echo "Error deleting child comments: " . $stmt_child->error;
        exit;
    }
    $stmt_child->close();

    // Step 2: Delete the parent comment
    $sql_parent = "DELETE FROM comments WHERE id = ?";
    $stmt_parent = $conn->prepare($sql_parent);
    $stmt_parent->bind_param("s", $comment_id);

    if ($stmt_parent->execute()) {
        header("Location: " . BASE_URL . "/engagements/details/?id=" . $engagement_idno . "&deleted=true");
        exit;
    } else {
        echo "Error deleting parent comment: " . $stmt_parent->error;
    }

    $stmt_parent->close();
    $conn->close();
}
// END DELETE COMMENT AND CHILD COMMENTS

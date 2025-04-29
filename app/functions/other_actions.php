<?php

// UPDATE COMMENT
// Update comment
if (isset($_POST['update_comment'])) {
    // Get the form data
    $comment_id = $_POST['comment_id'];
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
    $sql = "UPDATE comments SET reference = ?, comment_by = ?, status = ?, comment = ? WHERE id = ?";
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

// Update Engagement

if (isset($_POST['update_engagement'])) {
    // Collect the form data
    $name = $_POST['name'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $reporting_start = $_POST['reporting_start'];
    $reporting_end = $_POST['reporting_end'];
    $reporting_as_of = $_POST['reporting_as_of'];
    $irl_due_date = $_POST['irl_due_date'];
    $evidence_due_date = $_POST['evidence_due_date'];
    $fieldwork_week = $_POST['fieldwork_week'];
    $leadsheet_due = $_POST['leadsheet_due'];
    $draft_date = $_POST['draft_date'];
    $final_date = $_POST['final_date'];
    $manager = $_POST['manager'];
    $senior = $_POST['senior'];
    $staff_1 = $_POST['staff_1'];
    $staff_2 = $_POST['staff_2'];
    $senior_dol = $_POST['senior_dol'];
    $staff_1_dol = $_POST['staff_1_dol'];
    $staff_2_dol = $_POST['staff_2_dol'];

    // Validate required fields (adjust as needed)
    if (empty($name) || empty($type) || empty($status)) {
        echo "Name, Type, and Status are required.";
        exit;
    }

    // Assume you have an $engagement_id for the WHERE clause
    $engagement_id = $_POST['engagement_id'];

    // SQL Update Query
    $sql = "UPDATE engagements SET 
        name = ?, type = ?, status = ?, 
        reporting_start = ?, reporting_end = ?, reporting_as_of = ?, 
        irl_due_date = ?, evidence_due_date = ?, fieldwork_week = ?, 
        leadsheet_due = ?, draft_date = ?, final_date = ?, 
        manager = ?, senior = ?, staff_1 = ?, staff_2 = ?, 
        senior_dol = ?, staff_1_dol = ?, staff_2_dol = ?
        WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssssi", 
        $name, $type, $status, 
        $reporting_start, $reporting_end, $reporting_as_of, 
        $irl_due_date, $evidence_due_date, $fieldwork_week, 
        $leadsheet_due, $draft_date, $final_date, 
        $manager, $senior, $staff_1, $staff_2, 
        $senior_dol, $staff_1_dol, $staff_2_dol, 
        $engagement_id
    );

    // Execute and handle result
    if ($stmt->execute()) {
        header("Location: /"); // adjust the redirect as needed
        exit;
    } else {
        echo "Error updating engagement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

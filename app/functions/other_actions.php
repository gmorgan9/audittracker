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

function nullIfEmpty($value) {
    return ($value === '' || $value === null) ? null : $value;
}

if (isset($_POST['update_engagement'])) {
    // Collect and sanitize form data
    $name = nullIfEmpty($_POST['name']);
    $type = nullIfEmpty($_POST['type']);
    $status = nullIfEmpty($_POST['status']);
    $reporting_start = nullIfEmpty($_POST['reporting_start']);
    $reporting_end = nullIfEmpty($_POST['reporting_end']);
    $reporting_as_of = nullIfEmpty($_POST['reporting_as_of']);
    $irl_due_date = nullIfEmpty($_POST['irl_due_date']);
    $evidence_due_date = nullIfEmpty($_POST['evidence_due_date']);
    $fieldwork_week = nullIfEmpty($_POST['fieldwork_week']);
    $leadsheet_due = nullIfEmpty($_POST['leadsheet_due']);
    $draft_date = nullIfEmpty($_POST['draft_date']);
    $final_date = nullIfEmpty($_POST['final_date']);
    $manager = nullIfEmpty($_POST['manager']);
    $senior = nullIfEmpty($_POST['senior']);
    $staff_1 = nullIfEmpty($_POST['staff_1']);
    $staff_2 = nullIfEmpty($_POST['staff_2']);
    $senior_dol = nullIfEmpty($_POST['senior_dol']);
    $staff_1_dol = nullIfEmpty($_POST['staff_1_dol']);
    $staff_2_dol = nullIfEmpty($_POST['staff_2_dol']);
    $engagement_id = nullIfEmpty($_POST['engagement_id']);
    $number_sections = nullIfEmpty($_POST['number_sections']);

    // Validate required fields
    if (empty($name) || empty($type) || empty($status)) {
        echo "Name, Type, and Status are required.";
        exit;
    }

    // Prepare and execute SQL update
    $sql = "UPDATE engagements SET 
        name = ?, type = ?, status = ?, 
        reporting_start = ?, reporting_end = ?, reporting_as_of = ?, 
        irl_due_date = ?, evidence_due_date = ?, fieldwork_week = ?, 
        leadsheet_due = ?, draft_date = ?, final_date = ?, 
        manager = ?, senior = ?, staff_1 = ?, staff_2 = ?, 
        senior_dol = ?, staff_1_dol = ?, staff_2_dol = ?, number_sections = ?
        WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssssi", 
        $name, $type, $status, 
        $reporting_start, $reporting_end, $reporting_as_of, 
        $irl_due_date, $evidence_due_date, $fieldwork_week, 
        $leadsheet_due, $draft_date, $final_date, 
        $manager, $senior, $staff_1, $staff_2, 
        $senior_dol, $staff_1_dol, $staff_2_dol, $number_sections,
        $engagement_id
    );

    if ($stmt->execute()) {
        header("Location: /");
        exit;
    } else {
        echo "Error updating engagement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

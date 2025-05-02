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


// UPDATE SECTION STATUS
// Update section status (assigned/completed)
if (isset($_POST['update_section'])) {
    // Get the form data
    $section_id = $_POST['section_id'];
    $status = $_POST['status']; // New status (assigned or completed)

    // Basic validation
    if (empty($section_id) || empty($status)) {
        echo "Section ID and status are required!";
        exit;
    }

    // Prepare the update query
    $sql = "UPDATE assigned_sections SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("si", $status, $section_id);

    // Execute the query and handle the result
    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
            exit;
    } else {
        echo "Error updating section status: " . $stmt->error;
    }

    // Clean up
    $stmt->close();
    $conn->close();
}
// END UPDATE SECTION STATUS






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
    $engagement_idno = nullIfEmpty($_POST['engagement_idno']);
    $assigned_sections = isset($_POST['assigned_sections']) ? $_POST['assigned_sections'] : [];

    // Validate required fields
    if (empty($name) || empty($type) || empty($status)) {
        echo "Name, Type, and Status are required.";
        exit;
    }

    // Normalize assigned_sections from the form
    $assigned_sections = array_map(function($s) {
        return strtoupper(trim($s));
    }, $assigned_sections);

    // Prepare and execute engagement update
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

    if ($stmt->execute()) {
        // ====== Maintain assigned_sections table ======
        $user = "Garrett Morgan";
        $status = "Assigned";
        $dol_sections = [];

        if ($senior === $user && !empty($senior_dol)) {
            $dol_sections = explode(',', $senior_dol);
        } elseif ($staff_1 === $user && !empty($staff_1_dol)) {
            $dol_sections = explode(',', $staff_1_dol);
        } elseif ($staff_2 === $user && !empty($staff_2_dol)) {
            $dol_sections = explode(',', $staff_2_dol);
        }

        // Normalize dol_sections to ensure matching
        $dol_sections = array_map(function($s) {
            return strtoupper(trim($s));
        }, $dol_sections);

        // Fetch and normalize current assignments from DB for the user
        $query = "SELECT section FROM assigned_sections WHERE engagement_idno = ? AND employee = ?";
        $stmt2 = $conn->prepare($query);
        $stmt2->bind_param("is", $engagement_idno, $user);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $current_sections = [];
        while ($row = $result->fetch_assoc()) {
            $current_sections[] = strtoupper(trim($row['section']));
        }
        $stmt2->close();

        // Check sections to delete (if they are assigned but not part of DOL)
        $sections_to_remove = array_diff($current_sections, $dol_sections);

        // Remove sections that are in the DB but not in DOL
        foreach ($sections_to_remove as $section) {
            $delete_stmt = $conn->prepare("DELETE FROM assigned_sections WHERE engagement_idno = ? AND section = ? AND employee = ?");
            $delete_stmt->bind_param("iss", $engagement_idno, $section, $user);
            $delete_stmt->execute();
            $delete_stmt->close();
        }

        // Add sections that are in the DOL but not assigned in the DB
        $sections_to_add = array_diff($dol_sections, $current_sections);
        foreach ($sections_to_add as $section) {
            $insert_stmt = $conn->prepare("INSERT INTO assigned_sections (engagement_idno, section, employee, status) VALUES (?, ?, ?, ?)");
            $insert_stmt->bind_param("isss", $engagement_idno, $section, $user, $status);
            $insert_stmt->execute();
            $insert_stmt->close();
        }

        header("Location: /");
        exit;
    } else {
        echo "Error updating engagement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

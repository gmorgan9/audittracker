<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// add Engagement
if (isset($_POST['add_engagement'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Generate a unique ID
    $e_idno = rand(1000000, 9999999);

    // Sanitize and validate input data
    $name = isset($_POST['name']) ? trim($_POST['name']) : ""; 
    $type = isset($_POST['type']) ? trim($_POST['type']) : "";
    $reporting_start = isset($_POST['reporting_start']) ? trim($_POST['reporting_start']) : "";
    $reporting_end = isset($_POST['reporting_end']) ? trim($_POST['reporting_end']) : "";
    $reporting_as_of = isset($_POST['reporting_as_of']) ? trim($_POST['reporting_as_of']) : "";
    $irl_due_date = isset($_POST['irl_due_date']) ? trim($_POST['irl_due_date']) : "";
    $evidence_due_date = isset($_POST['evidence_due_date']) ? trim($_POST['evidence_due_date']) : "";
    $fieldwork_week = isset($_POST['fieldwork_week']) ? trim($_POST['fieldwork_week']) : "";
    $leadsheet_due = isset($_POST['leadsheet_due']) ? trim($_POST['leadsheet_due']) : "";
    $draft_date = isset($_POST['draft_date']) ? trim($_POST['draft_date']) : "";
    $final_date = isset($_POST['final_date']) ? trim($_POST['final_date']) : "";
    $manager = isset($_POST['manager']) ? trim($_POST['manager']) : "";
    $senior = isset($_POST['senior']) ? trim($_POST['senior']) : "";
    $staff_1 = isset($_POST['staff_1']) ? trim($_POST['staff_1']) : "";
    $staff_2 = isset($_POST['staff_2']) ? trim($_POST['staff_2']) : "";
    $senior_dol = isset($_POST['senior_dol']) ? trim($_POST['senior_dol']) : "";
    $staff_1_dol = isset($_POST['staff_1_dol']) ? trim($_POST['staff_1_dol']) : "";
    $staff_2_dol = isset($_POST['staff_2_dol']) ? trim($_POST['staff_2_dol']) : "";
    $status = isset($_POST['status']) ? trim($_POST['status']) : "";

    // Count assigned sections for Garrett Morgan
    $garrett_section_count = 0;

    $roles = [
        'manager' => ['name' => $manager, 'dol' => null],
        'senior' => ['name' => $senior, 'dol' => $senior_dol],
        'staff_1' => ['name' => $staff_1, 'dol' => $staff_1_dol],
        'staff_2' => ['name' => $staff_2, 'dol' => $staff_2_dol],
    ];

    foreach ($roles as $role => $data) {
        if ($data['name'] === 'Garrett Morgan' && !empty($data['dol'])) {
            $sections = array_filter(array_map('trim', explode(',', $data['dol'])));
            $garrett_section_count += count($sections);
        }
    }

    // Prepare insert into engagements table
    $stmt = $conn->prepare(
        "INSERT INTO engagements (
            idno, 
            name, 
            type, 
            reporting_start, 
            reporting_end, 
            reporting_as_of, 
            irl_due_date, 
            evidence_due_date, 
            fieldwork_week, 
            leadsheet_due, 
            draft_date, 
            final_date, 
            manager, 
            senior, 
            staff_1, 
            staff_2, 
            senior_dol, 
            staff_1_dol, 
            staff_2_dol, 
            number_sections,
            status
        ) VALUES (
            ?, 
            NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), 
            NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), 
            NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), 
            NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), 
            NULLIF(?, ''), NULLIF(?, ''), ?, NULLIF(?, '')
        )"
    );

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssssssssssssssssss",
        $e_idno,
        $name,
        $type,
        $reporting_start,
        $reporting_end,
        $reporting_as_of,
        $irl_due_date,
        $evidence_due_date,
        $fieldwork_week,
        $leadsheet_due,
        $draft_date,
        $final_date,
        $manager,
        $senior,
        $staff_1,
        $staff_2,
        $senior_dol,
        $staff_1_dol,
        $staff_2_dol,
        $garrett_section_count,
        $status
    );

    if ($stmt->execute()) {
        // Insert into assigned_sections for Garrett Morgan
        foreach ($roles as $role => $data) {
            if ($data['name'] === 'Garrett Morgan' && !empty($data['dol'])) {
                $sections = array_filter(array_map('trim', explode(',', $data['dol'])));
                foreach ($sections as $section) {
                    $insert_stmt = $conn->prepare(
                        "INSERT INTO assigned_sections (engagement_idno, section, employee, status) 
                         VALUES (?, ?, ?, ?)"
                    );
                    if ($insert_stmt) {
                        $assigned_status = 'Assigned';
                        $insert_stmt->bind_param("ssss", $e_idno, $section, $data['name'], $assigned_status);
                        $insert_stmt->execute();
                        $insert_stmt->close();
                    }
                }
            }
        }

        // Redirect after everything is done
        header('Location: /');
        exit;
    } else {
        echo "Execute failed: " . $stmt->error;
    }

    $stmt->close();
}
// end Add Engagement




// add qa comment
    if (isset($_POST['add_comment'])) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Generate a unique ID
        $comment_idno = rand(1000000, 9999999);

        // Sanitize and validate input data
        $engagement_idno = isset($_POST['engagement_idno']) ? trim($_POST['engagement_idno']) : ""; 
        $comment_by = isset($_POST['comment_by']) ? trim($_POST['comment_by']) : "";
        $reference = isset($_POST['control']) ? trim($_POST['control']) : "";
        $comment = isset($_POST['qa_comment']) ? trim($_POST['qa_comment']) : "";
        $parent_comment_id = isset($_POST['parent_comment_id']) ? trim($_POST['parent_comment_id']) : "";
        $status = "open";

        // Prepare query
        $stmt = $conn->prepare(
            "INSERT INTO comments (idno, parent_comment_id, reference, comment, comment_by, engagement_idno, status)
            VALUES (?, NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''))"
        );

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param(
            "sssssss",
            $comment_idno,
            $parent_comment_id,
            $reference,
            $comment,
            $comment_by,
            $engagement_idno,
            $status
        );

        if ($stmt->execute()) {
            // header('Location: ' . BASE_URL . '/engagements/?engagement_id=' . $qa_engagement_id);
            // exit;
        } else {
            echo "Execute failed: " . $stmt->error;
        }

        $stmt->close();
    }
// end Add qa comment



?>
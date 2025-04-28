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
    
    // Default status (can modify this if you have dynamic status)
    // $status = 'Active'; 
    $status = isset($_POST['status']) ? trim($_POST['status']) : "";

    // Prepare query
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
            status
        ) VALUES (?, NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''))"
    );

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssssssssssssssssss",
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
        $status
    );

    if ($stmt->execute()) {
        header('Location: /');
        exit;
    } else {
        echo "Execute failed: " . $stmt->error;
    }

    $stmt->close();
}
// end Add Engagement



// add qa comment
    if (isset($_POST['add_qa_comment'])) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Generate a unique ID
        $qa_idno = rand(1000000, 9999999);

        // Sanitize and validate input data
        $qa_engagement_id = isset($_POST['qa_engagement_id']) ? trim($_POST['qa_engagement_id']) : ""; 
        $qa_client_name = isset($_POST['qa_client_name']) ? trim($_POST['qa_client_name']) : "";
        $control_ref = isset($_POST['control_ref']) ? trim($_POST['control_ref']) : "";
        $cell_reference = isset($_POST['cell_reference']) ? trim($_POST['cell_reference']) : "";
        $comment_by = isset($_POST['comment_by']) ? trim($_POST['comment_by']) : "";
        $control = isset($_POST['control']) ? trim($_POST['control']) : "";
        $qa_comment = isset($_POST['qa_comment']) ? trim($_POST['qa_comment']) : "";

        // Prepare query
        $stmt = $conn->prepare(
            "INSERT INTO qa_comments (idno, engagement_id, client_name, control_ref, cell_reference, comment_by, control, qa_comment)
            VALUES (?, NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''), NULLIF(?, ''))"
        );

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param(
            "ssssssss",
            $qa_idno,
            $qa_engagement_id,
            $qa_client_name,
            $control_ref,
            $cell_reference,
            $comment_by,
            $control,
            $qa_comment
        );

        if ($stmt->execute()) {
            header('Location: ' . BASE_URL . '/engagements/?engagement_id=' . $qa_engagement_id);
            exit;
        } else {
            echo "Execute failed: " . $stmt->error;
        }

        $stmt->close();
    }
// end Add qa comment



?>
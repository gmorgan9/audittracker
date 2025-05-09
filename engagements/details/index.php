<?php
date_default_timezone_set('America/Denver');
require_once "../../path.php";
require_once ROOT_PATH . "/app/database/connection.php";
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$files = glob(ROOT_PATH . "/app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/styles.css?v=<?php echo time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <title>Engagement Details</title>
</head>
<body>


    <section class="table_layout">

        <?php include(ROOT_PATH . "/app/includes/detail_sidebar.php"); ?>

        <!-- Header -->
            <div class="table_header d-flex align-items-center justify-content-end" style="height: 60px; background-color: rgb(236,241,247);">
                <div class="pe-3 d-flex align-items-center gap-2">
                    <div class="circle-with-text">
                        GM
                    </div>
                    <span>Garrett Morgan</span>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
            </div>
        <!-- end Header -->

        <!-- Table -->
            <div class="table_body ps-2 pt-4">

            <?php
            $id = $_GET['id'];
            $eng_sql = "SELECT * FROM engagements WHERE idno = $id";
            $eng_result = mysqli_query($conn, $eng_sql);
            if($eng_result) {
            $eng_num_rows = mysqli_num_rows($eng_result);
            if($eng_num_rows > 0) {
                while ($eng_row = mysqli_fetch_assoc($eng_result)) {
                    $eng_id                     = $eng_row['id'];
                    $eng_idno                   = $eng_row['idno'];
                    $eng_name                   = $eng_row['name'];
                    $eng_type                   = $eng_row['type'];
                    $eng_final_date             = $eng_row['final_date'];
                    $eng_reporting_start        = $eng_row['reporting_start'];
                    $eng_reporting_end          = $eng_row['reporting_end'];
                    $eng_reporting_as_of        = $eng_row['reporting_as_of'];
                    $eng_irl_due_date           = $eng_row['irl_due_date'];
                    $eng_evidence_due_date      = $eng_row['evidence_due_date'];
                    $eng_fieldwork_week         = $eng_row['fieldwork_week'];
                    $eng_leadsheet_due          = $eng_row['leadsheet_due'];
                    $eng_draft_date             = $eng_row['draft_date'];
                    $eng_manager                = $eng_row['manager'];
                    $eng_senior                 = $eng_row['senior'];
                    $eng_staff_1                = $eng_row['staff_1'];
                    $eng_staff_2                = $eng_row['staff_2'];
                    $eng_senior_dol             = $eng_row['senior_dol'];
                    $eng_staff_1_dol            = $eng_row['staff_1_dol'];
                    $eng_staff_2_dol            = $eng_row['staff_2_dol'];
                    // $eng_number_sections        = $eng_row['number_sections'];
                    $eng_status                 = $eng_row['status'];
                    $eng_created                = $eng_row['created'];
                    $f_eng_created              = !empty($eng_created) ? date("M j, Y", strtotime($eng_created)) : '';
                    $f_eng_final_date           = !empty($eng_final_date) ? date("M j, Y", strtotime($eng_final_date)) : '';
                    $f_eng_reporting_start      = !empty($eng_reporting_start) ? date("M j, Y", strtotime($eng_reporting_start)) : '';
                    $f_eng_reporting_end        = !empty($eng_reporting_end) ? date("M j, Y", strtotime($eng_reporting_end)) : '';
                    $f_eng_reporting_as_of      = !empty($eng_reporting_as_of) ? date("M j, Y", strtotime($eng_reporting_as_of)) : '';
                    $f_eng_irl_due_date         = !empty($eng_irl_due_date) ? date("M j, Y", strtotime($eng_irl_due_date)) : '';
                    $f_eng_evidence_due_date    = !empty($eng_evidence_due_date) ? date("M j, Y", strtotime($eng_evidence_due_date)) : '';
                    $f_eng_fieldwork_week       = !empty($eng_fieldwork_week) ? date("M j, Y", strtotime($eng_fieldwork_week)) : '';
                    $f_eng_leadsheet_due        = !empty($eng_leadsheet_due) ? date("M j, Y", strtotime($eng_leadsheet_due)) : '';
                    $f_eng_draft_date           = !empty($eng_draft_date) ? date("M j, Y", strtotime($eng_draft_date)) : '';


                }}}

                
            // }}
            ?>

            

            <span class="float-end pe-5 pt-4">
                <a href="#" data-bs-toggle="modal" data-bs-target="#engagement_update<?php echo $eng_id; ?>" class="badge text-bg-success text-decoration-none me-1">Edit</a>
                <!-- ENG Update Modal -->
                    <div class="modal fade" id="engagement_update<?php echo $eng_id; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Engagement</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                          <div class="modal-body">
                                            <div class="mb-3">
                                              <label for="name" class="form-label">Name</label>
                                              <input type="text" class="form-control" id="name" name="name" value="<?php echo $eng_name; ?>">
                                            </div>

                                            <div class="row">
                                              <div class="col-md-6 mb-3">
                                                <label for="type" class="form-label">Type</label>
                                                <input type="text" class="form-control" id="type" name="type" value="<?php echo $eng_type; ?>">
                                              </div>
                                              <div class="col-md-6 mb-3">
                                                  <label for="status" class="form-label">Status</label>
                                                  <select class="form-select" id="status" name="status" required>
                                                      <option value="Draft" <?php echo ($eng_status == 'Draft') ? 'selected' : ''; ?>>Draft</option>
                                                      <option value="Active" <?php echo ($eng_status == 'Active') ? 'selected' : ''; ?>>Active</option>
                                                      <option value="In Review" <?php echo ($eng_status == 'In Review') ? 'selected' : ''; ?>>In Review</option>
                                                      <option value="Completed" <?php echo ($eng_status == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                                  </select>
                                              </div>

                                            </div>

                                            <div class="row">
                                              <div class="col-md-4 mb-3">
                                                <label for="reporting_start" class="form-label">Reporting Start</label>
                                                <input type="date" class="form-control" id="reporting_start" name="reporting_start" value="<?php echo $eng_reporting_start; ?>">
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                <label for="reporting_end" class="form-label">Reporting End</label>
                                                <input type="date" class="form-control" id="reporting_end" name="reporting_end" value="<?php echo $eng_reporting_end; ?>">
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                <label for="reporting_as_of" class="form-label">Reporting As Of</label>
                                                <input type="date" class="form-control" id="reporting_as_of" name="reporting_as_of" value="<?php echo $eng_reporting_as_of; ?>">
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-4 mb-3">
                                                <label for="irl_due_date" class="form-label">IRL Due Date</label>
                                                <input type="date" class="form-control" id="irl_due_date" name="irl_due_date" value="<?php echo $eng_irl_due_date; ?>">
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                <label for="evidence_due_date" class="form-label">Evidence Due Date</label>
                                                <input type="date" class="form-control" id="evidence_due_date" name="evidence_due_date" value="<?php echo $eng_evidence_due_date; ?>">
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                <label for="fieldwork_week" class="form-label">Fieldwork Week</label>
                                                <input type="date" class="form-control" id="fieldwork_week" name="fieldwork_week" value="<?php echo $eng_fieldwork_week; ?>">
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-4 mb-3">
                                                <label for="leadsheet_due" class="form-label">Leadsheet Due</label>
                                                <input type="date" class="form-control" id="leadsheet_due" name="leadsheet_due" value="<?php echo $eng_leadsheet_due; ?>">
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                <label for="draft_date" class="form-label">Draft Date</label>
                                                <input type="date" class="form-control" id="draft_date" name="draft_date" value="<?php echo $eng_draft_date; ?>">
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                <label for="final_date" class="form-label">Final Date</label>
                                                <input type="date" class="form-control" id="final_date" name="final_date" value="<?php echo $eng_final_date; ?>">
                                              </div>
                                            </div>

                                            <div class="row">

                                            </div>

                                            <div class="row">
                                              <div class="col-md-3 mb-3">
                                                <label for="manager" class="form-label">Manager</label>
                                                <input type="text" class="form-control" id="manager" name="manager" value="<?php echo $eng_manager; ?>">
                                              </div>
                                              <div class="col-md-3 mb-3">
                                                <label for="senior" class="form-label">Senior</label>
                                                <input type="text" class="form-control" id="senior" name="senior" value="<?php echo $eng_senior; ?>">
                                              </div>
                                              <div class="col-md-3 mb-3">
                                                <label for="staff_1" class="form-label">Staff 1</label>
                                                <input type="text" class="form-control" id="staff_1" name="staff_1" value="<?php echo $eng_staff_1; ?>">
                                              </div>
                                              <div class="col-md-3 mb-3">
                                                <label for="staff_2" class="form-label">Staff 2</label>
                                                <input type="text" class="form-control" id="staff_2" name="staff_2" value="<?php echo $eng_staff_2; ?>">
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-3 mb-3">
                                                <label for="senior_dol" class="form-label">Senior DOL</label>
                                                <input type="text" class="form-control" id="senior_dol" name="senior_dol" value="<?php echo $eng_senior_dol; ?>">
                                              </div>
                                              <div class="col-md-3 mb-3">
                                                <label for="staff_1_dol" class="form-label">Staff 1 DOL</label>
                                                <input type="text" class="form-control" id="staff_1_dol" name="staff_1_dol" value="<?php echo $eng_staff_1_dol; ?>">
                                              </div>
                                              <div class="col-md-3 mb-3">
                                                <label for="staff_2_dol" class="form-label">Staff 2 DOL</label>
                                                <input type="text" class="form-control" id="staff_2_dol" name="staff_2_dol" value="<?php echo $eng_staff_2_dol; ?>">
                                              </div>
                                              <!-- <div class="col-md-3 mb-3">
                                                <label for="number_sections" class="form-label">Number of Sections</label>
                                                <input type="text" class="form-control" id="number_sections" name="number_sections" value="<?php //echo $eng_number_sections; ?>">
                                              </div> -->
                                            </div>
                                          </div>

                                          <input type="hidden" name="engagement_id" value="<?php echo $eng_id; ?>">
                                          <input type="hidden" name="engagement_idno" value="<?php echo $eng_idno; ?>">


                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="update_engagement" class="btn btn-primary">Update</button>
                                          </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                <!-- end Modal -->
            </span>
            <h3 class="d-flex align-items-center pb-2 ps-2">
                <span class="badge" style="background-color: rgb(224,242,238); color: rgb(118, 135, 131); font-size: 12px;"><?php echo $eng_status; ?></span>
                &nbsp; <?php echo $eng_name; ?> - <?php echo $eng_type; ?>
            </h3>
            

            <?php if (empty($f_eng_reporting_start) && empty($f_eng_reporting_end)): ?>
                <span class="text-secondary ps-2" style="font-size: 12px;">
                    <strong>Reporting Period:</strong> As of <?php echo $f_eng_reporting_as_of; ?>
                </span>
            <?php else: ?>
                <span class="text-secondary ps-2" style="font-size: 12px;">
                    <strong>Reporting Period:</strong> <?php echo $f_eng_reporting_start; ?> through <?php echo $f_eng_reporting_end; ?>
                </span>
            <?php endif; ?>


            

            <hr style="border: 2px solid; width: 98%;">

            <section class="details_layout">
                <div class="details ps-2 pe-5 border-end">
                    <h5 class="pb-3">
                        Engagement Details
                    </h5>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">IRL Due Date</span>
                        <span class="">
                            <?php echo $f_eng_irl_due_date; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Evidence Due Date</span>
                        <span class="">
                            <?php echo $f_eng_evidence_due_date; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Fieldwork Week</span>
                        <span class="">
                            <?php echo $f_eng_fieldwork_week; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Leadsheet Due</span>
                        <span class="">
                            <?php echo $f_eng_leadsheet_due; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Draft Date</span>
                        <span class="">
                            <?php echo $f_eng_draft_date; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Final date</span>
                        <span class="">
                            <?php echo $f_eng_final_date; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Manager</span>
                        <span class="">
                            <?php echo $eng_manager; ?>
                        </span>
                      </li>
                      <!-- Senior -->
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <span class="fw-semibold">Senior</span>
                          <span class="text-end">
                            <?php echo ($eng_senior === 'Garrett Morgan')
                              ? '<a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#garrettModal">' . $eng_senior . '</a>'
                              : $eng_senior; ?><br>
                            <?php
                            if ($eng_senior === 'Garrett Morgan') {
                                $assigned_list = [];
                                $stmt = $conn->prepare("SELECT section, status FROM assigned_sections WHERE engagement_idno = ? AND employee = ?");
                                $stmt->bind_param("is", $eng_idno, $eng_senior);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) {
                                    $section = strtoupper(trim($row['section']));
                                    $status = strtolower(trim($row['status']));
                                    $color_class = ($status === 'assigned') ? 'text-warning' : (($status === 'completed') ? 'text-success' : 'text-secondary');
                                    $assigned_list[] = "<span class='$color_class' style='font-size: 12px;'>$section</span>";
                                }
                                $stmt->close();
                                $count = count($assigned_list);
                                foreach ($assigned_list as $i => $item) {
                                    echo $item;
                                    if ($i < $count - 1) echo "<span class='text-secondary' style='font-size: 12px;'>, </span>";
                                }
                            } else {
                                echo "<span class='text-secondary' style='font-size: 12px;'>$eng_senior_dol</span>";
                            }
                            ?>
                          </span>
                        </li>
                          
                        <!-- Staff -->
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <span class="fw-semibold">Staff</span>
                          <span class="text-end">
                            <?php echo ($eng_staff_1 === 'Garrett Morgan')
                              ? '<a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#garrettModal">' . $eng_staff_1 . '</a>'
                              : $eng_staff_1; ?><br>
                            <?php
                            if ($eng_staff_1 === 'Garrett Morgan') {
                                $assigned_list = [];
                                $stmt = $conn->prepare("SELECT section, status FROM assigned_sections WHERE engagement_idno = ? AND employee = ?");
                                $stmt->bind_param("is", $eng_idno, $eng_staff_1);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) {
                                    $section = strtoupper(trim($row['section']));
                                    $status = strtolower(trim($row['status']));
                                    $color_class = ($status === 'assigned') ? 'text-warning' : (($status === 'completed') ? 'text-success' : 'text-secondary');
                                    $assigned_list[] = "<span class='$color_class' style='font-size: 12px;'>$section</span>";
                                }
                                $stmt->close();
                                $count = count($assigned_list);
                                foreach ($assigned_list as $i => $item) {
                                    echo $item;
                                    if ($i < $count - 1) echo "<span class='text-secondary' style='font-size: 12px;'>, </span>";
                                }
                            } else {
                                echo "<span class='text-secondary' style='font-size: 12px;'>$eng_staff_1_dol</span>";
                            }
                            ?>
                          </span>
                        </li>
                          
                        <!-- Additional Staff -->
                        <?php if (!empty($eng_staff_2)) : ?>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Additional Staff</span>
                            <span class="text-end">
                              <?php echo ($eng_staff_2 === 'Garrett Morgan')
                                ? '<a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#garrettModal">' . $eng_staff_2 . '</a>'
                                : $eng_staff_2; ?><br>
                              <?php
                              if ($eng_staff_2 === 'Garrett Morgan') {
                                  $assigned_list = [];
                                  $stmt = $conn->prepare("SELECT section, status FROM assigned_sections WHERE engagement_idno = ? AND employee = ?");
                                  $stmt->bind_param("is", $eng_idno, $eng_staff_2);
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                                  while ($row = $result->fetch_assoc()) {
                                      $section = strtoupper(trim($row['section']));
                                      $status = strtolower(trim($row['status']));
                                      $color_class = ($status === 'assigned') ? 'text-warning' : (($status === 'completed') ? 'text-success' : 'text-secondary');
                                      $assigned_list[] = "<span class='$color_class' style='font-size: 12px;'>$section</span>";
                                  }
                                  $stmt->close();
                                  $count = count($assigned_list);
                                  foreach ($assigned_list as $i => $item) {
                                      echo $item;
                                      if ($i < $count - 1) echo "<span class='text-secondary' style='font-size: 12px;'>, </span>";
                                  }
                              } else {
                                  echo "<span class='text-secondary' style='font-size: 12px;'>$eng_staff_2_dol</span>";
                              }
                              ?>
                            </span>
                          </li>
                        <?php endif; ?>
                    </ul>


                    <div class="modal fade" id="garrettModal" tabindex="-1" aria-labelledby="garrettModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="garrettModalLabel">Assigned Sections: Garrett Morgan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="list-group" id="assigned-sections-list">
                              <?php
                              $stmt = $conn->prepare("SELECT section, status, id FROM assigned_sections WHERE engagement_idno = ? AND employee = ?");
                              $gm = 'Garrett Morgan';
                              $stmt->bind_param("is", $eng_idno, $gm);
                              $stmt->execute();
                              $result = $stmt->get_result();
                              ?>
                              <?php while ($row = $result->fetch_assoc()):
                                  $section = strtoupper(trim($row['section']));
                                  $status = strtolower(trim($row['status']));
                                  $section_id = $row['id']; // Section ID to update the status
                                  $color_class = ($status === 'assigned') ? 'text-warning' : (($status === 'completed') ? 'text-success' : 'text-secondary');
                                  $button_class = ($status === 'assigned') ? 'btn-success' : 'btn-outline-secondary';
                                  $button_text = ($status === 'assigned') ? 'Mark as Completed' : 'Unmark as Completed';
                              ?>
                                <!-- Form for each section -->
                                <form method="POST">
                                  <div class="d-flex justify-content-between align-items-center mb-2 list-group-item">
                                    <span class="<?= $color_class ?> fw-semibold"><?= htmlspecialchars($section) ?></span>
                                    <input type="hidden" name="section_id" value="<?= $section_id ?>">
                                    <input type="hidden" name="status" value="<?= ($status === 'assigned') ? 'completed' : 'assigned' ?>">
                                    <button type="submit" name="update_section" class="btn <?= $button_class ?> btn-sm">
                                      <?= $button_text ?>
                                    </button>
                                  </div>
                                </form>
                              <?php endwhile; ?>
                              <?php $stmt->close(); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>






                </div>

                <div class="comments">
                    <div class="table_content ms-5" style="width: 90%;">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">Status</th>
                              <th scope="col">Reference</th>
                              <th scope="col">Comment By</th>
                              <th scope="col">Created On</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>

                          <?php
                        // Pagination variables
                        $limit = 10; 
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;

                        $comment_sql = "SELECT * FROM comments WHERE parent_comment_id IS NULL AND engagement_idno='$id' ORDER BY created DESC LIMIT $limit OFFSET $offset";
                        $comment_result = mysqli_query($conn, $comment_sql);
                        if($comment_result) {
                            $comment_num_rows = mysqli_num_rows($comment_result);
                            if($comment_num_rows > 0) {
                                while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                                    $comment_id                     = $comment_row['id'];
                                    $comment_idno                   = $comment_row['idno'];
                                    $comment_parent_comment_id      = $comment_row['parent_comment_id'];
                                    $comment_reference              = $comment_row['reference'];
                                    $comment_comment_by             = $comment_row['comment_by'];
                                    $comment_status                 = $comment_row['status'];
                                    $comment_engagement_idno        = $comment_row['engagement_idno'];
                                    $comment_created                = !empty($comment_row['created']) ? date("M j, Y", strtotime($comment_row['created'])) : '';
                        ?>
                            <tr class="align-middle" style="cursor: pointer;" >
                                <td data-bs-toggle="modal" data-bs-target="#comment_details_<?php echo $comment_id; ?>">
                                    <span class="badge text-capitalize" style="background-color: rgb(232,232,232); color: rgb(130, 130, 130);">
                                        <?php echo $comment_status; ?>
                                    </span>
                                </td>
                                <td data-bs-toggle="modal" data-bs-target="#comment_details_<?php echo $comment_id; ?>">
                                    <?php echo $comment_reference; ?>
                                    <br>
                                    <span class="text-secondary" style="font-size: 10px;"><i class="bi bi-chat-square"></i> 
                                        <?php
                                        $comment_count_count = "SELECT COUNT('1') FROM comments WHERE parent_comment_id='$comment_id' AND status = 'Open' AND engagement_idno = '$id'";
                                        $comment_count_result = mysqli_query($conn, $comment_count_count);
                                        $comment_count_rowtotal = mysqli_fetch_array($comment_count_result);
                                        echo $comment_count_rowtotal[0];
                                        ?>
                                    </span>
                                </td>
                                <td data-bs-toggle="modal" data-bs-target="#comment_details_<?php echo $comment_id; ?>">
                                    <?php echo $comment_comment_by; ?>
                                </td>
                                <td data-bs-toggle="modal" data-bs-target="#comment_details_<?php echo $comment_id; ?>">
                                    <?php echo $comment_created; ?>
                                </td>
                                <td>
                                    <!-- Keep the edit/delete modal separate -->
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#comment_update<?php echo $comment_id; ?>" class="badge text-bg-success text-decoration-none me-1">Edit</a>
                                    <a href="<?php BASE_URL; ?>/engagements/details/delete/?id=<?php echo $comment_id; ?>&eidno=<?php echo $comment_engagement_idno; ?>" class="badge text-bg-danger text-decoration-none">Delete</a>

                                    <!--Update Modal -->
                                        <?php
                                        $comm_details_sql = "SELECT * FROM comments WHERE id = $comment_id";
                                        $comm_details_result = mysqli_query($conn, $comm_details_sql);
                                        if($comm_details_result) {
                                        $comm_details_num_rows = mysqli_num_rows($comm_details_result);
                                        if($comm_details_num_rows > 0) {
                                            while ($comm_details_row = mysqli_fetch_assoc($comm_details_result)) {
                                                $comm_details_id                     = $comm_details_row['id'];
                                                $comm_details_idno                   = $comm_details_row['idno'];
                                                $comm_details_parent_comment_id      = $comm_details_row['parent_comment_id'];
                                                $comm_details_reference              = $comm_details_row['reference'];
                                                $comm_details_comment                = $comm_details_row['comment'];
                                                $comm_details_comment_by             = $comm_details_row['comment_by'];
                                                $comm_details_status                 = $comm_details_row['status'];
                                                $comm_details_created                = !empty($comm_details_row['created']) ? date("M j, Y", strtotime($comm_details_row['created'])) : '';
                                            
                                            
                                            }}}
                                        ?>
        
                                        <div class="modal fade" id="comment_update<?php echo $comm_details_id; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Comment</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- <div class="modal-body"> -->
                                                <form action="" method="POST">
                                                  <div class="modal-body">
                                                    <div class="mb-3">
                                                      <label for="reference" class="form-label">Reference</label>
                                                      <input type="text" class="form-control" id="reference" name="reference" value="<?php echo $comm_details_reference; ?>">
                                                    </div>
                                                            
                                                    <div class="row">
                                                      <div class="col-md-6 mb-3">
                                                        <label for="type" class="form-label">Comment By</label>
                                                        <input type="text" class="form-control" id="comment_by" name="comment_by" value="<?php echo $comm_details_comment_by; ?>">
                                                      </div>
                                                      <div class="col-md-6 mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" id="status" name="status" required>
                                                          <option value="Open" <?php echo ($comm_details_status == 'Open') ? 'selected' : ''; ?>>Open</option>
                                                          <option value="Closed" <?php echo ($comm_details_status == 'Closed') ? 'selected' : ''; ?>>Closed</option>
                                                        </select>
                                        
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="comment " class="form-label">Comment</label>
                                                        <textarea class="form-control" id="comment " name="comment" rows="5"><?php echo $comm_details_comment ; ?></textarea>
                                                      </div>
                                        
                                                      <input type="hidden" name="comment_id" value="<?php echo $comm_details_id; ?>">
                                                            
                                                    
                                                            
                                            
                                                            
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update_comment" class="btn btn-primary">Update</button>
                                                  </div>
                                                </form>
                                        
                                                    
                                                <!-- </div> -->
                                            </div>
                                          </div>
                                        </div>
                                    <!-- end Modal -->
                                    
                                </td>
                            </tr>

                            

                            <!-- Modal -->
                                <?php
                                $comm_details_sql = "SELECT * FROM comments WHERE id = $comment_id";
                                $comm_details_result = mysqli_query($conn, $comm_details_sql);
                                if($comm_details_result) {
                                $comm_details_num_rows = mysqli_num_rows($comm_details_result);
                                if($comm_details_num_rows > 0) {
                                    while ($comm_details_row = mysqli_fetch_assoc($comm_details_result)) {
                                        $comm_details_id                     = $comm_details_row['id'];
                                        $comm_details_idno                   = $comm_details_row['idno'];
                                        $comm_details_parent_comment_id      = $comm_details_row['parent_comment_id'];
                                        $comm_details_reference              = $comm_details_row['reference'];
                                        $comm_details_comment                = $comm_details_row['comment'];
                                        $comm_details_comment_by             = $comm_details_row['comment_by'];
                                        $comm_details_status                 = $comm_details_row['status'];
                                        $comm_details_created                = !empty($comm_details_row['created']) ? date("M j, Y", strtotime($comm_details_row['created'])) : '';
                                    
                                    
                                    }}}
                                ?>

                                <?php if (!isset($comm_details_id)) {
                                    echo "<!-- Modal not rendered because \$comm_details_id is undefined -->";
                                } ?>
                                <div class="modal fade" id="comment_details_<?php echo $comment_id; ?>" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Comment Details</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="pb-3">
                                                Original Comment
                                            </h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Comment by</span>
                                                    <span class="">
                                                        <?php echo $comm_details_comment_by;?>
                                                    </span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Created</span>
                                                    <span class="">
                                                        <?php echo $comm_details_created; ?>
                                                    </span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Comment</span>
                                                    <span style="max-width: 500px;">
                                                        <?php echo $comm_details_comment; ?>
                                                    </span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span class="fw-semibold">Actions</span>

                                                </li>
                                            </ul>
                                            <hr>
                                            <h5 class="pb-3">
                                                Follow-up Comments
                                            </h5>
                                            <?php
                                            $p_comm_details_sql = "SELECT * FROM comments WHERE parent_comment_id = '$comm_details_id'";
                                            $p_comm_details_result = mysqli_query($conn, $p_comm_details_sql);
                                            $p_comm_details_num_rows = mysqli_num_rows($p_comm_details_result);
                                            ?>
                                            
                                            <?php if($p_comm_details_result && $p_comm_details_num_rows > 0): ?>
                                                <ul class="list-group list-group-flush">
                                                    <?php while ($p_comm_details_row = mysqli_fetch_assoc($p_comm_details_result)): 
                                                        $p_comm_details_comment_by = $p_comm_details_row['comment_by'];
                                                        $p_comm_details_comment = $p_comm_details_row['comment'];
                                                        $p_comm_details_created = !empty($p_comm_details_row['created']) 
                                                            ? date("M j, Y", strtotime($p_comm_details_row['created'])) 
                                                            : '';
                                                    ?>
                                                    <li class="list-group-item">
                                                        <span class="text-secondary fw-semibold" style="font-size: 12px;">
                                                            <?php echo htmlspecialchars($p_comm_details_comment_by); ?> • <?php echo $p_comm_details_created; ?>
                                                        </span><br>
                                                        <?php echo nl2br(htmlspecialchars($p_comm_details_comment)); ?>
                                                    </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php else: ?>
                                                <div class="alert alert-secondary" role="alert">
                                                    No follow-up comments yet!
                                                </div>
                                            <?php endif; ?>

                                            
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            <!-- end Modal -->

                            

                            

                            

                            <?php }}} ?>
                            <?php if (isset($_GET['deleted']) && $_GET['deleted'] === 'true'): ?>
                              <div class="alert alert-success">Comment successfully deleted.</div>
                            <?php endif; ?>
                            

                          </tbody>
                        </table>


                    </div>
                </div>

            </section>


          <!-- ADD COMMENT Modal -->
            <div class="modal fade" id="add_comment" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add_engagement_label" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add_engagement_label">Add New QA Comment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="reference" class="form-label">Reference</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Comment By</label>
                            <input type="text" class="form-control" id="comment_by" name="comment_by">
                          </div>
                        </div>
                        

                        <?php
                        // Assuming you already have a database connection in $conn
                        // And the current engagement_idno is available in $engagement_idno
                                                                    
                        $sql = "SELECT id, reference FROM comments WHERE engagement_idno = ? AND parent_comment_id IS NULL ORDER BY id ASC";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, 's', $eng_idno);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        ?>
                        
                        <div class="row">
                          <div class="mb-3">
                            <label for="parent_comment_id" class="form-label">Parent Comment</label>
                            <select class="form-select" id="parent_comment_id" name="parent_comment_id">
                              <option value="">None (Top-level comment)</option>
                              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <option value="<?php echo htmlspecialchars($row['id']); ?>">
                                  <?php echo htmlspecialchars(substr($row['reference'], 0, 50)); ?>
                                </option>
                              <?php endwhile; ?>
                            </select>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="comment " class="form-label">Comment</label>
                          <textarea class="form-control" id="comment " name="comment" rows="5"></textarea>
                        </div>

                        <input type="hidden" class="form-control" id="engagement_idno" name="engagement_idno" value="<?php echo $eng_idno; ?>">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_comment" class="btn btn-primary">Add</button>
                      </div>
                    </form>


                </div>
              </div>
            </div>
        <!-- end Modal -->


                

            </div>  
        <!-- end Table -->
         

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
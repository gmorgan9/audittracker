<?php
date_default_timezone_set('America/Denver');
require_once "../../app/database/connection.php"; // Ensure this is correct
require_once "../../path.php";
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$files = glob("../../app/functions/*.php");
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

        <?php include(ROOT_PATH . "/app/includes/table_sidebar.php"); ?>

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
                    $eng_final_date             = !empty($eng_row['final_date']) ? date("M j, Y", strtotime($eng_row['final_date'])) : '';
                    $eng_reporting_start        = !empty($eng_row['reporting_start']) ? date("M j, Y", strtotime($eng_row['reporting_start'])) : '';
                    $eng_reporting_end          = !empty($eng_row['reporting_end']) ? date("M j, Y", strtotime($eng_row['reporting_end'])) : '';
                    $eng_reporting_as_of        = !empty($eng_row['reporting_as_of']) ? date("M j, Y", strtotime($eng_row['reporting_as_of'])) : '';
                    $eng_irl_due_date           = !empty($eng_row['irl_due_date']) ? date("M j, Y", strtotime($eng_row['irl_due_date'])) : '';
                    $eng_evidence_due_date      = !empty($eng_row['evidence_due_date']) ? date("M j, Y", strtotime($eng_row['evidence_due_date'])) : '';
                    $eng_fieldwork_week         = !empty($eng_row['fieldwork_week']) ? date("M j, Y", strtotime($eng_row['fieldwork_week'])) : '';
                    $eng_leadsheet_due          = !empty($eng_row['leadsheet_due']) ? date("M j, Y", strtotime($eng_row['leadsheet_due'])) : '';
                    $eng_draft_date             = !empty($eng_row['draft_date']) ? date("M j, Y", strtotime($eng_row['draft_date'])) : '';
                    $eng_manager                = $eng_row['manager'];
                    $eng_senior                 = $eng_row['senior'];
                    $eng_staff_1                = $eng_row['staff_1'];
                    $eng_staff_2                = $eng_row['staff_2'];
                    $eng_senior_dol             = $eng_row['senior_dol'];
                    $eng_staff_1_dol            = $eng_row['staff_1_dol'];
                    $eng_staff_2_dol            = $eng_row['staff_2_dol'];
                    $eng_number_sections        = $eng_row['number_sections'];
                    $eng_status                 = $eng_row['status'];
                    $eng_created                = !empty($eng_row['created']) ? date("M j, Y", strtotime($eng_row['created'])) : '';


                }}}
            // }}
            ?>

            

            <span class="float-end pe-5 pt-4">
                <a href="#" data-bs-toggle="modal" data-bs-target="#engagement_update<?php echo $eng_id; ?>" class="badge text-bg-success text-decoration-none me-1">Edit</a>
            </span>
            <h3 class="d-flex align-items-center pb-2 ps-2">
                <span class="badge" style="background-color: rgb(224,242,238); color: rgb(118, 135, 131); font-size: 12px;"><?php echo $eng_status; ?></span>
                &nbsp; <?php echo $eng_name; ?> - <?php echo $eng_type; ?>
            </h3>
            

            <span class="text-secondary ps-2" style="font-size: 12px;"><strong>Reporting Period:</strong> <?php echo $eng_reporting_start; ?> through <?php echo $eng_reporting_end; ?></span>

            <!--Update Modal -->
                <div class="modal fade" id="comment_update<?php //echo $comm_details_id; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Comment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="reference" class="form-label">Reference</label>
                              <input type="text" class="form-control" id="reference" name="reference" value="<?php //echo $comm_details_reference; ?>">
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-3">
                                <label for="type" class="form-label">Comment By</label>
                                <input type="text" class="form-control" id="comment_by" name="comment_by" value="<?php //echo $comm_details_comment_by; ?>">
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                  <option value="Open" <?php //echo ($comm_details_status == 'Open') ? 'selected' : ''; ?>>Open</option>
                                  <option value="Closed" <?php //echo ($comm_details_status == 'Closed') ? 'selected' : ''; ?>>Closed</option>
                                </select>
                              </div>
                            </div>

                            <div class="mb-3">
                                <label for="comment " class="form-label">Comment</label>
                                <textarea class="form-control" id="comment " name="comment" rows="5"><?php //echo $comm_details_comment ; ?></textarea>
                              </div>
                              <input type="hidden" name="comment_id" value="<?php //echo $comm_details_id; ?>">





                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update_comment" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
            <!-- end Modal -->

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
                            <?php echo $eng_irl_due_date; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Evidence Due Date</span>
                        <span class="">
                            <?php echo $eng_evidence_due_date; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Fieldwork Week</span>
                        <span class="">
                            <?php echo $eng_fieldwork_week; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Leadsheet Due</span>
                        <span class="">
                            <?php echo $eng_leadsheet_due; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Draft Date</span>
                        <span class="">
                            <?php echo $eng_draft_date; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Final date</span>
                        <span class="">
                            <?php echo $eng_final_date; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Manager</span>
                        <span class="">
                            <?php echo $eng_manager; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Senior</span>
                        <span class="">
                            <?php echo $eng_senior; ?><br>
                            <span class="text-secondary" style="font-size: 12px;"><?php echo $eng_senior_dol; ?></span>
                        </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Staff</span>
                        <span class="">
                            <?php echo $eng_staff_1; ?><br>
                            <span class="text-secondary" style="font-size: 12px;"><?php echo $eng_staff_1_dol; ?></span>
                        </span>
                      </li>
                      <?php if (!empty($eng_staff_2)) : ?>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Additional Staff</span>
                            <span><?php echo $eng_staff_2; ?></span><br>
                            <span class="text-secondary" style="font-size: 12px;"><?php echo $eng_staff_2_dol; ?></span>
                          </li>
                       <?php endif; ?>
                    </ul>
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
                                    $comment_type                   = $comment_row['type'];
                                    $comment_parent_comment_id      = $comment_row['parent_comment_id'];
                                    $comment_reference              = $comment_row['reference'];
                                    $comment_comment_by             = $comment_row['comment_by'];
                                    $comment_status                 = $comment_row['status'];
                                    $comment_created                = !empty($comment_row['created']) ? date("M j, Y", strtotime($comment_row['created'])) : '';
                        ?>
                            <tr class="align-middle" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#comment_details_<?php echo $comment_id; ?>">
                                <td>
                                    <span class="badge" style="background-color: rgb(232,232,232); color: rgb(130, 130, 130);">
                                        <?php echo $comment_status; ?>
                                    </span>
                                </td>
                                <td>
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
                                <td>
                                    <?php echo $comment_comment_by; ?>
                                </td>
                                <td>
                                    <?php echo $comment_created; ?>
                                </td>
                                <td>
                                    <!-- Keep the edit/delete modal separate -->
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#comment_update<?php echo $comment_id; ?>" class="badge text-bg-success text-decoration-none me-1">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#comment_delete<?php echo $comment_id; ?>" class="badge text-bg-danger text-decoration-none">Delete</a>
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
                                        $comm_details_type                   = $comm_details_row['type'];
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
                                        $comm_details_type                   = $comm_details_row['type'];
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


                            

                            <?php }}} ?>

                          </tbody>
                        </table>

                    </div>
                </div>

            </section>


                

            </div>  
        <!-- end Table -->

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
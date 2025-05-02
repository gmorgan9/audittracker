<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php"; // Ensure this is correct
require_once "path.php";
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$files = glob("app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styles.css?v=<?php echo time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <title>Home</title>
</head>
<body>


    <section class="layout">

    <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>

        <!-- Header -->
            <div class="header d-flex align-items-center justify-content-end" style="height: 60px; background-color: rgb(236,241,247);">
                <div class="pe-3 d-flex align-items-center gap-2">
                    <div class="circle-with-text">
                        GM
                    </div>
                    <span>Garrett Morgan</span>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
            </div>
        <!-- end Header -->

        <!-- Left side -->
            <div class="body_1">

                <h3 class="ps-3 mt-2">
                    Good Afternoon, Garrett! 
                </h3>

                <h6 class="ps-3 mt-3">
                    Status Overview
                </h6>

                <h5 class="ps-3 mt-4">
                    Current and Upcoming Engagements
                </h5>
                <div class="current_engagements">

                    <div class="row ms-4 mt-4">
                        <div class="card me-4 mb-4" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">
                                        <?php
                                        $sql="SELECT count('1') FROM engagements WHERE status='Active'";
                                        $result=mysqli_query($conn,$sql);
                                        $rowtotal=mysqli_fetch_array($result); 
                                        echo "$rowtotal[0] active";
                                        ?>
                                    </h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">at the moment</p>
                          </div>
                        </div>
                        <div class="card me-4 mb-4" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">
                                      <?php
                                        $review_count_sql="SELECT count('1') FROM engagements WHERE status='In Review'";
                                        $review_count_result=mysqli_query($conn,$review_count_sql);
                                        $review_count_rowtotal=mysqli_fetch_array($review_count_result); 
                                        echo "$review_count_rowtotal[0] in review";
                                        ?>
                                    </h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">at the moment</p>
                            </div>
                        </div>
                        <div class="card me-4" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">
                                      <?php
                                        $due_count_sql = "SELECT COUNT('1') FROM engagements WHERE final_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
                                        $due_count_result=mysqli_query($conn,$due_count_sql);
                                        $due_count_rowtotal=mysqli_fetch_array($due_count_result); 
                                        echo "$due_count_rowtotal[0] due";
                                        ?>
                                    </h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">in the next 7 days</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">
                                      <?php
                                        $overdue_count_sql = "SELECT COUNT('1') FROM engagements WHERE final_date < CURDATE()";
                                        $overdue_count_result = mysqli_query($conn, $overdue_count_sql);
                                        $overdue_count_rowtotal = mysqli_fetch_array($overdue_count_result);
                                        echo "$overdue_count_rowtotal[0] overdue";
                                      ?>
                                       
                                      <i class="bi bi-dash-square-fill" style="color: rgb(173,174,183) !important;"></i>
                                    </h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">at the moment</p>
                            </div>
                        </div>

                    </div>

                </div>

                <h5 class="ps-3 mt-4">
                    Recent Activity
                </h5>
                <div class="recent_activity">

                <div class="row ms-4 mt-4">
                        <div class="card me-4 mb-4" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">2 created</h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">in the next 7 days</p>
                          </div>
                        </div>
                        <div class="card me-4 mb-4" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">2 submitted</h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">in the next 7 days</p>
                            </div>
                        </div>
                        <div class="card me-4" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">2 returned</h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">in the next 7 days</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <!-- <p class="card-text me-2">00</p> -->
                                    <h5 class="card-title mb-2">7 completed <i class="bi bi-dash-square-fill" style="color: rgb(173,174,183) !important;"></i></h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">in the next 7 days</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        <!-- end Left side -->

        <!-- Right side -->
            <div class="body_2">
                <div class="spacer" style="height: 100px;"></div>

                <h5 class="ps-3 pb-3">
                    Active Engagements
                </h5>
                <div class="card" style="width: 40rem; height: 31.5rem;">
                    <div class="float-end pe-2 pt-1">
                        <div class="d-flex justify-content-end gap-4">
                          <div class="d-flex align-items-center gap-1 text-secondary" style="font-size: 12px;">
                            <div style="width: 10px; height: 10px; background-color: rgb(224,242,238); border-radius: 50%;"></div>
                            <span>Open</span>
                          </div>
                          <!-- <div class="d-flex align-items-center gap-1 text-secondary" style="font-size: 12px;">
                            <div style="width: 10px; height: 10px; background-color: rgb(232,232,232); border-radius: 50%;"></div>
                            <span>In Review</span>
                          </div> -->
                          <div class="d-flex align-items-center gap-1 text-secondary" style="font-size: 12px;">
                            <div style="width: 10px; height: 10px; background-color: rgb(236,232,213); border-radius: 50%;"></div>
                            <span>Closed</span>
                          </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <ul class="list-group list-group-flush">

                    <?php
                    // Pagination variables
                    $limit = 10; 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;
                    
                    $sql = "SELECT * FROM engagements WHERE status='Active' ORDER BY final_date DESC LIMIT $limit OFFSET $offset";
                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        $num_rows = mysqli_num_rows($result);
                        if($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id                     = $row['id'];
                                $idno                   = $row['idno'];
                                $name                   = $row['name'];
                                $type                   = $row['type'];
                                $reporting_start        = $row['reporting_start'];
                                $reporting_end          = $row['reporting_end'];
                                $final_date             = $row['final_date'];

                  
                ?>

                        
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-bold mb-0 me-3"><?php echo $name; ?> &nbsp;<span class="text-secondary" style="font-size: 10px;">(<?php echo $type; ?>)</span></p>
                                    <div class="status_content">
                                        <span class="badge" style="background-color: rgb(224,242,238); color: rgb(118, 135, 131); font-size: 12px; width: 80px;">
                                            <?php
                                            $sql2 = "SELECT COUNT('1') FROM comments WHERE status = 'Open' AND engagement_idno = '$idno'";
                                            $comment_result = mysqli_query($conn, $sql2);
                                            $comment_rowtotal = mysqli_fetch_array($comment_result);
                                            echo $comment_rowtotal[0];
                                            ?>
                                        </span>
                                        <!-- <span class="badge" style="background-color: rgb(232,232,232); color: rgb(130, 130, 130); font-size: 12px; width: 80px;">
                                            <?php
                                            // $sql3 = "SELECT COUNT('1') FROM comments WHERE status = 'In Review' AND engagement_idno = '$idno'";
                                            // $comment_result2 = mysqli_query($conn, $sql3);
                                            // $comment_rowtotal2 = mysqli_fetch_array($comment_result2);
                                            // echo $comment_rowtotal2[0];
                                            ?>
                                        </span> -->
                                        <span class="badge" style="background-color: rgb(236,232,213); color: rgb(154, 145, 109); font-size: 12px; width: 80px;">
                                            <?php
                                            $sql4 = "SELECT COUNT('1') FROM comments WHERE status = 'Closed' AND engagement_idno = '$idno'";
                                            $comment_result3 = mysqli_query($conn, $sql4);
                                            $comment_rowtotal3 = mysqli_fetch_array($comment_result3);
                                            echo $comment_rowtotal3[0];
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </li>


                <?php }}} ?>
                        
                    </div>
                </div>


            </div>
        <!-- end Right side -->


        <!-- Modal -->
            <div class="modal fade" id="add_engagement" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add_engagement_label" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add_engagement_label">Add New Engagement</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST">
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control" id="type" name="type">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                              <option value="Draft">Draft</option>
                              <option value="Active">Active</option>
                              <option value="In Review">In Review</option>
                              <option value="Completed">Compelted</option>
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label for="reporting_start" class="form-label">Reporting Start</label>
                            <input type="date" class="form-control" id="reporting_start" name="reporting_start">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="reporting_end" class="form-label">Reporting End</label>
                            <input type="date" class="form-control" id="reporting_end" name="reporting_end">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="reporting_as_of" class="form-label">Reporting As Of</label>
                            <input type="date" class="form-control" id="reporting_as_of" name="reporting_as_of">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label for="irl_due_date" class="form-label">IRL Due Date</label>
                            <input type="date" class="form-control" id="irl_due_date" name="irl_due_date">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="evidence_due_date" class="form-label">Evidence Due Date</label>
                            <input type="date" class="form-control" id="evidence_due_date" name="evidence_due_date">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="fieldwork_week" class="form-label">Fieldwork Week</label>
                            <input type="date" class="form-control" id="fieldwork_week" name="fieldwork_week">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label for="leadsheet_due" class="form-label">Leadsheet Due</label>
                            <input type="date" class="form-control" id="leadsheet_due" name="leadsheet_due">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="draft_date" class="form-label">Draft Date</label>
                            <input type="date" class="form-control" id="draft_date" name="draft_date">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="final_date" class="form-label">Final Date</label>
                            <input type="date" class="form-control" id="final_date" name="final_date">
                          </div>
                        </div>

                        <div class="row">
                          
                        </div>

                        <div class="row">
                          <div class="col-md-3 mb-3">
                            <label for="manager" class="form-label">Manager</label>
                            <input type="text" class="form-control" id="manager" name="manager">
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="senior" class="form-label">Senior</label>
                            <input type="text" class="form-control" id="senior" name="senior">
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="staff_1" class="form-label">Staff 1</label>
                            <input type="text" class="form-control" id="staff_1" name="staff_1">
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="staff_2" class="form-label">Staff 2</label>
                            <input type="text" class="form-control" id="staff_2" name="staff_2">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3 mb-3">
                            <label for="senior_dol" class="form-label">Senior DOL</label>
                            <input type="text" class="form-control" id="senior_dol" name="senior_dol">
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="staff_1_dol" class="form-label">Staff 1 DOL</label>
                            <input type="text" class="form-control" id="staff_1_dol" name="staff_1_dol">
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="staff_2_dol" class="form-label">Staff 2 DOL</label>
                            <input type="text" class="form-control" id="staff_2_dol" name="staff_2_dol">
                          </div>
                          <!-- <div class="col-md-3 mb-3">
                            <label for="number_sections" class="form-label">Number of Sections</label>
                            <input type="text" class="form-control" id="number_sections" name="number_sections">
                          </div> -->
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_engagement" class="btn btn-primary">Add</button>
                      </div>
                    </form>


                </div>
              </div>
            </div>
        <!-- end Modal -->

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
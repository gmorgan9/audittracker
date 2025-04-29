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


      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
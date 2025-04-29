<?php
date_default_timezone_set('America/Denver');
require_once "../../app/database/connection.php"; // Ensure this is correct
// require_once "../path.php";
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

        <!-- Sidebar -->
            <div class="table_sidebar ps-2">
                <h1>
                    Logo Here
                </h1>

                <div class="pt-4"></div>

                <button type="button" class="btn" style="background-color: rgb(55, 67, 118); color: white;">
                    Add New QA Comment
                </button>

                <div class="pt-4"></div>

                <ul class="list-unstyled ps-4">
                    <li class="">
                        <a href="/" class="text-decoration-none text-black fw-bold"><i class="bi bi-columns-gap" style="-webkit-text-stroke: 1px;color: rgb(55, 67, 118);"></i>
                        &nbsp;&nbsp;Dashboard</a>
                    </li>

                    <hr style="color: gray !important; width: 75% !important; text-align: center !important;">

                    <li class="pb-3">
                        <a href="" class="text-decoration-none text-black fw-bold"><i class="bi bi-folder" style="-webkit-text-stroke: 1px;color: rgb(55, 67, 118);"></i>&nbsp;&nbsp;Engagements</a>
                    </li>
                    <ul class="list-unstyled">
                        <li class="ps-4 pb-3">
                            <a href="" class="text-decoration-none text-black"><i class="bi bi-vector-pen"></i>&nbsp;&nbsp;Draft</a>
                        </li>
                        <li class="ps-4 pb-3">
                            <a href="engagements/active/" class="text-decoration-none text-black"><i class="bi bi-check-circle"></i>&nbsp;&nbsp;Active</a>
                        </li>
                        <li class="ps-4 pb-3">
                            <a href="" class="text-decoration-none text-black"><i class="bi bi-eye"></i>&nbsp;&nbsp;In Review</a>
                        </li>
                        <li class="ps-4">
                            <a href="" class="text-decoration-none text-black"><i class="bi bi-archive"></i>&nbsp;&nbsp;Completed</a>
                        </li>
                    </ul>

                    <hr style="color: gray !important; width: 75% !important; text-align: center !important;">

                    <li class="pb-3">
                        <a href="" class="text-decoration-none text-black fw-bold"><i class="bi bi-diagram-3" style="-webkit-text-stroke: 1px;color: rgb(55, 67, 118);"></i>&nbsp;&nbsp;Organization</a>
                    </li>
                    <ul class="list-unstyled">
                        <li class="ps-4 pb-3">
                            <a href="" class="text-decoration-none text-black"><i class="bi bi-briefcase"></i>&nbsp;&nbsp;Clients</a>
                        </li>
                        <li class="ps-4 pb-3">
                            <a href="" class="text-decoration-none text-black"><i class="bi bi-person-gear"></i>&nbsp;&nbsp;Users</a>
                        </li>
                        <li class="ps-4">
                            <a href="" class="text-decoration-none text-black"><i class="bi bi-gear"></i>&nbsp;&nbsp;Settings</a>
                        </li>
                    </ul>

                </ul>

            </div>
        <!-- end Sidebar -->

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
                    $eng_number_sections        = $eng_row['number_sections'];
                    $eng_irl_due_date           = $eng_row['irl_due_date'];
                    $eng_status                 = $eng_row['status'];
                    $eng_created                = $eng_row['created'];


                }}}
            // }}
            ?>


            <h3 class="d-flex align-items-center pb-2 ps-2">
                <span class="badge" style="background-color: rgb(224,242,238); color: rgb(118, 135, 131); font-size: 12px;"><?php echo $eng_status; ?></span>
                &nbsp; <?php echo $eng_name; ?> - <?php echo $eng_type; ?>
            </h3>

            <span class="text-secondary ps-2" style="font-size: 12px;"><strong>Reporting Period:</strong> <?php echo $eng_reporting_start; ?> through <?php echo $eng_reporting_end; ?></span>

            <hr style="border: 2px solid; width: 98%;">

            <section class="details_layout">
                <div class="details ps-2">
                    <h5 class="">
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
                        A second list item
                        <span class="badge text-bg-primary rounded-pill">2</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        A third list item
                        <span class="badge text-bg-primary rounded-pill">1</span>
                      </li>
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
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="align-middle" style="cursor: pointer;">
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none text-dark d-block">
                                        <span class="badge" style="background-color: rgb(232,232,232); color: rgb(130, 130, 130);">Draft</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none text-dark d-block">
                                        CC8.1-B
                                        <br>
                                        <span class="text-secondary" style="font-size: 10px;"><i class="bi bi-chat-square"></i> 0</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none text-dark d-block">
                                        Joseph Thorin
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none text-dark d-block">
                                        Apr 12, 2025
                                    </a>
                                </td>
                            </tr>

                            <tr class="align-middle">
                                <td><span class="badge" style="background-color: rgb(224,242,238); color: rgb(118, 135, 131);">Completed</span></td>
                                <td>
                                    CC6.2-A
                                    <br>
                                    <span class="text-secondary" style="font-size: 10px;"><i class="bi bi-chat-square"></i> 2</span>
                                </td>
                                <td>Joseph Thorin</td>
                                <td>Apr 12, 2025</td>
                            </tr>

                          </tbody>
                        </table>

                    </div>
                </div>

            </section>


                

            </div>  
        <!-- end Table -->
        
        <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                  </div>
                </div>
              </div>
            </div>
        <!-- end Modal -->

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
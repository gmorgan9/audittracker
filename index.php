<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php"; // Ensure this is correct
// require_once "../path.php";
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

        <!-- Sidebar -->
            <div class="sidebar ps-2">
                <h1>
                    Logo Here
                </h1>

                <div class="pt-4"></div>

                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#add_engagement" style="background-color: rgb(55, 67, 118); color: white;">
                    Add New Engagement
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
                                    <h5 class="card-title mb-2">6 active</h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">at the moment</p>
                          </div>
                        </div>
                        <div class="card me-4 mb-4" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">3 in review</h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">at the moment</p>
                            </div>
                        </div>
                        <div class="card me-4" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <h5 class="card-title mb-2">0 due</h5>
                                </div>
                                <p class="card-subtitle text-secondary" style="font-size: 12px !important;">in the next 7 days</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem; height: 6rem;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex">
                                    <!-- <p class="card-text me-2">00</p> -->
                                    <h5 class="card-title mb-2">0 Overdue <i class="bi bi-dash-square-fill" style="color: rgb(173,174,183) !important;"></i></h5>
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
                    <div class="card-body">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-bold mb-0 me-3">LivePerson 2025 &nbsp;<span class="text-secondary" style="font-size: 10px;">(SOC 2 Type 2)</span></p>
                                    <div class="progress" style="width: 50%;" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%">25%</div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-bold mb-0 me-3">QuoteRush 2025 &nbsp;<span class="text-secondary" style="font-size: 10px;">(SOC 2 Type 2)</span></p>
                                    <div class="progress" style="width: 50%;" role="progressbar" aria-label="Example with label" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 32%">32%</div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-bold mb-0 me-3">Cedar Financial 2025 &nbsp;<span class="text-secondary" style="font-size: 10px;">(SOC 2 Type 2)</span></p>
                                    <div class="progress" style="width: 50%;" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%; background-color: orange;">25%</div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-bold mb-0 me-3">Foxit 2025 &nbsp;<span class="text-secondary" style="font-size: 10px;">(SOC 2 Type 2)</span></p>
                                    <div class="progress" style="width: 50%;" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%">25%</div>
                                    </div>
                                </div>
                            </li>
                        </ul>



                    </div>
                </div>


            </div>
        <!-- end Right side -->


        <!-- Modal -->
            <div class="modal fade" id="add_engagement" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add_engagement_label" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
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

                        <div class="mb-3">
                          <label for="type" class="form-label">Type</label>
                          <input type="text" class="form-control" id="type" name="type">
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="reporting_start" class="form-label">Reporting Start</label>
                            <input type="date" class="form-control" id="reporting_start" name="reporting_start">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="reporting_end" class="form-label">Reporting End</label>
                            <input type="date" class="form-control" id="reporting_end" name="reporting_end">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="reporting_as_of" class="form-label">Reporting As Of</label>
                            <input type="date" class="form-control" id="reporting_as_of" name="reporting_as_of">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="irl_due_date" class="form-label">IRL Due Date</label>
                            <input type="date" class="form-control" id="irl_due_date" name="irl_due_date">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="evidence_due_date" class="form-label">Evidence Due Date</label>
                            <input type="date" class="form-control" id="evidence_due_date" name="evidence_due_date">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="fieldwork_week" class="form-label">Fieldwork Week</label>
                            <input type="date" class="form-control" id="fieldwork_week" name="fieldwork_week">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="leadsheet_due" class="form-label">Leadsheet Due</label>
                            <input type="date" class="form-control" id="leadsheet_due" name="leadsheet_due">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="draft_date" class="form-label">Draft Date</label>
                            <input type="date" class="form-control" id="draft_date" name="draft_date">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="final_date" class="form-label">Final Date</label>
                            <input type="date" class="form-control" id="final_date" name="final_date">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                              <option>Choose...</option>
                              <option value="Draft">Draft</option>
                              <option value="Active">Active</option>
                              <option value="In Review">In Review</option>
                              <option value="Completed">Compelted</option>
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label for="manager" class="form-label">Manager</label>
                            <input type="text" class="form-control" id="manager" name="manager">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="senior" class="form-label">Senior</label>
                            <input type="text" class="form-control" id="senior" name="senior">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="staff_1" class="form-label">Staff 1</label>
                            <input type="text" class="form-control" id="staff_1" name="staff_1">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="staff_2" class="form-label">Staff 2</label>
                            <input type="text" class="form-control" id="staff_2" name="staff_2">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label for="senior_dol" class="form-label">Senior DOL</label>
                            <input type="text" class="form-control" id="senior_dol" name="senior_dol">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="staff_1_dol" class="form-label">Staff 1 DOL</label>
                            <input type="text" class="form-control" id="staff_1_dol" name="staff_1_dol">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="staff_2_dol" class="form-label">Staff 2 DOL</label>
                            <input type="text" class="form-control" id="staff_2_dol" name="staff_2_dol">
                          </div>
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
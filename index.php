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

        <div class="sidebar ps-2">
            <h1>
                Logo Here
            </h1>

            <div class="pt-4"></div>

            <button type="button" class="btn btn-secondary">
                Add New Engagement +
            </button>

            <div class="pt-4"></div>

            <ul class="list-unstyled ps-4">
                <li class="">
                    <a href="" class="text-decoration-none text-black fw-bold"><i class="bi bi-columns-gap text-primary" style="-webkit-text-stroke: 1px;"></i>
                    &nbsp;&nbsp;Dashboard</a>
                </li>
                
                <hr style="color: gray !important; width: 75% !important; text-align: center !important;">
    
                <li class="pb-3">
                    <a href="" class="text-decoration-none text-black fw-bold"><i class="bi bi-folder text-primary" style="-webkit-text-stroke: 1px;"></i>&nbsp;&nbsp;Engagements</a>
                </li>
                <ul class="list-unstyled">
                    <li class="ps-4 pb-3">
                        <a href="" class="text-decoration-none text-black"><i class="bi bi-vector-pen"></i>&nbsp;&nbsp;Draft</a>
                    </li>
                    <li class="ps-4 pb-3">
                        <a href="" class="text-decoration-none text-black"><i class="bi bi-check-circle"></i>&nbsp;&nbsp;Active</a>
                    </li>
                    <li class="ps-4">
                        <a href="" class="text-decoration-none text-black"><i class="bi bi-archive"></i>&nbsp;&nbsp;Archived</a>
                    </li>
                </ul>

                <hr style="color: gray !important; width: 75% !important; text-align: center !important;">

                <li class="pb-3">
                    <a href="" class="text-decoration-none text-black fw-bold"><i class="bi bi-diagram-3 text-primary" style="-webkit-text-stroke: 1px;"></i>&nbsp;&nbsp;Organization</a>
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


        <div class="header d-flex align-items-center justify-content-end" style="height: 60px; background-color: rgb(236,241,247);">
            <div class="pe-3 d-flex align-items-center gap-2">
                <div class="circle-with-text">
                    GM
                </div>
                <span>Garrett Morgan</span>
                <i class="bi bi-caret-down-fill"></i>
            </div>
        </div>


        <div class="body_1">
            
            <h3 class="ps-3 mt-4">
                Current and Upcoming Engagements
            </h3>
            <div class="current_engagements">

                <div class="row ms-4 mt-4">
                    <div class="card me-4" style="width: 12rem;">
                      <div class="card-body">
                        <p class="card-text">01</p>
                        <h5 class="card-title">Not Started</h5>
                      </div>
                    </div>
                    <div class="card me-4" style="width: 12rem;">
                      <div class="card-body">
                        <p class="card-text">12</p>
                        <h5 class="card-title">Active</h5>
                      </div>
                    </div>
                    <div class="card me-4" style="width: 12rem;">
                      <div class="card-body">
                        <p class="card-text">02</p>
                        <h5 class="card-title">In Review</h5>
                      </div>
                    </div>
                    <div class="card justify-content-center" style="width: 12rem;">
                      <div class="card-body">
                        <p class="card-text">00</p>
                        <h5 class="card-title">Overdue</h5>
                        <p class="card-subtitle text-secondary" style="font-size: 12px !important;">at the moment</p>
                      </div>
                    </div>
                </div>

            </div>

            <h3 class="ps-3 mt-4">
                Recent Activity
            </h3>
            <div class="recent_activity">

                <div class="row ms-4 mt-4">
                    <div class="card me-4" style="width: 12rem;">
                      <div class="card-body">
                        <p class="card-text">01</p>
                        <h5 class="card-title">Created</h5>
                      </div>
                    </div>
                    <div class="card me-4" style="width: 12rem;">
                      <div class="card-body">
                        <p class="card-text">12</p>
                        <h5 class="card-title">Submitted</h5>
                      </div>
                    </div>
                    <div class="card" style="width: 12rem;">
                      <div class="card-body">
                        <p class="card-text">03</p>
                        <h5 class="card-title">Completed</h5>
                      </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="body_2">
        <div class="engagement">
            <div class="content d-flex flex-direction-row">
                <span>ACME, Inc</span>
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: 25%"></div>
                </div>
            </div>
        </div>
    </div>

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
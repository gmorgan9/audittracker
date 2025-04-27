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
                                <h5 class="card-title mb-2">6 in review</h5>
                            </div>
                            <p class="card-subtitle text-secondary" style="font-size: 12px !important;">at the moment</p>
                      </div>
                    </div>
                    <div class="card me-4 mb-4" style="width: 18rem; height: 6rem;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex">
                                <h5 class="card-title mb-2">3 are active</h5>
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


        <div class="body_2">
            <div class="spacer" style="height: 150px;"></div>

            <div class="card" style="width: 40rem; height: 32rem;">
                <div class="card-body">
                    <div class="">
                        <h6 class="card-title mb-2">Active Engagements</h6>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="fw-bold mb-0 me-3">LivePerson &nbsp;<span class="text-secondary" style="font-size: 10px;">(SOC 2 Type 2)</span></p>
                                <div class="progress" style="width: 50%;" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 25%">25%</div>
                                </div>
                            </div>
                        </li>
                      <li class="list-group-item">A second item</li>
                      <li class="list-group-item">A third item</li>
                      <li class="list-group-item">A fourth item</li>
                      <li class="list-group-item">And a fifth one</li>
                    </ul>

                    

                </div>
            </div>

            
        </div>


    </div>

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
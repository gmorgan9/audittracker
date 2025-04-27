<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styles.css?v=<?php echo time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

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
            
            <div class="current_engagements">

                <div class="row">
                    <div class="card" style="width: 10rem;">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                      </div>
                    </div>
                    <div class="gap-2"></div>
                    <div class="card" style="width: 10rem;">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                      </div>
                    </div>
                    <div class="card" style="width: 10rem;">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                      </div>
                    </div>
                </div>

            </div>

            <div class="recent_activity">

            </div>

        </div>
        <div class="body_2">
            2nd column
        </div>

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
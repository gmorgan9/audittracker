<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/styles.css?v=<?php echo time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <title>Home</title>
</head>
<body>


    <section class="table_layout">

        <!-- Sidebar -->
            <div class="table_sidebar ps-2">
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
                        <a href="/" class="text-decoration-none text-black fw-bold"><i class="bi bi-columns-gap text-primary" style="-webkit-text-stroke: 1px;"></i>
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
                        <li class="ps-4 pb-3">
                            <a href="" class="text-decoration-none text-black"><i class="bi bi-eye"></i>&nbsp;&nbsp;In Review</a>
                        </li>
                        <li class="ps-4">
                            <a href="" class="text-decoration-none text-black"><i class="bi bi-archive"></i>&nbsp;&nbsp;Completed</a>
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

                <h5 class="pb-2 ps-2">
                <span class="badge" style="background-color: rgb(224,242,238); color: rgb(118, 135, 131);">Active</span> &nbsp; LivePerson - SOC 2 Type 2 2025
                </h5>

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
                        <tr class="align-middle">
                            <td><span class="badge" style="background-color: rgb(232,232,232); color: rgb(130, 130, 130);">Draft</span></td>
                            <td>
                                CC8.1-B
                                <br>
                                <span class="text-secondary" style="font-size: 10px;"><i class="bi bi-chat-square"></i> 0</span>
                            </td>
                            <td>Joseph Thorin</td>
                            <td>Apr 12, 2025</td>
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
        <!-- end Table -->
        

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
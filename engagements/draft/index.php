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


    <title>Draft Engagements</title>
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

                <h3 class="pb-2 ps-2">
                    Draft Engagements
                </h3>

                <div class="table_content ms-5" style="width: 90%;">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Comments</th>
                          <th scope="col">Sections</th>
                          <th scope="col">Due Date</th>
                          <th scope="col">Status</th>
                          <th scope="col">Created On</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Pagination variables
                        $limit = 10; 
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;

                        $sql = "SELECT * FROM engagements WHERE status='Draft' ORDER BY created DESC LIMIT $limit OFFSET $offset";
                        $result = mysqli_query($conn, $sql);
                        if($result) {
                            $num_rows = mysqli_num_rows($result);
                            if($num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id                     = $row['id'];
                                    $idno                   = $row['idno'];
                                    $name                   = $row['name'];
                                    $type                   = $row['type'];
                                    $final_date             = $row['final_date'];
                                    $reporting_start        = $row['reporting_start'];
                                    $reporting_end          = $row['reporting_end'];
                                    $reporting_as_of        = $row['reporting_as_of'];
                                    $irl_due_date           = $row['irl_due_date'];
                                    $evidence_due_date      = $row['evidence_due_date'];
                                    $fieldwork_week         = $row['fieldwork_week'];
                                    $leadsheet_due          = $row['leadsheet_due'];
                                    $draft_date             = $row['draft_date'];
                                    $manager                = $row['manager'];
                                    $senior                 = $row['senior'];
                                    $staff_1                = $row['staff_1'];
                                    $staff_2                = $row['staff_2'];
                                    $senior_dol             = $row['senior_dol'];
                                    $staff_1_dol            = $row['staff_1_dol'];
                                    $staff_2_dol            = $row['staff_2_dol'];
                                    // $number_sections        = $row['number_sections'];
                                    $status                 = $row['status'];
                                    $created                = $row['created'];
                                    $f_created              = !empty($created) ? date("M j, Y", strtotime($created)) : '';
                                    $f_final_date           = !empty($final_date) ? date("M j, Y", strtotime($final_date)) : '';
                                    $f_reporting_start      = !empty($reporting_start) ? date("M j, Y", strtotime($reporting_start)) : '';
                                    $f_reporting_end        = !empty($reporting_end) ? date("M j, Y", strtotime($reporting_end)) : '';
                                    $f_reporting_as_of      = !empty($reporting_as_of) ? date("M j, Y", strtotime($reporting_as_of)) : '';
                                    $f_irl_due_date         = !empty($irl_due_date) ? date("M j, Y", strtotime($irl_due_date)) : '';
                                    $f_evidence_due_date    = !empty($evidence_due_date) ? date("M j, Y", strtotime($evidence_due_date)) : '';
                                    $f_fieldwork_week       = !empty($fieldwork_week) ? date("M j, Y", strtotime($fieldwork_week)) : '';
                                    $f_leadsheet_due        = !empty($leadsheet_due) ? date("M j, Y", strtotime($leadsheet_due)) : '';
                                    $f_draft_date           = !empty($draft_date) ? date("M j, Y", strtotime($draft_date)) : '';
                        ?>
                        
                        <tr class="align-middle" style="cursor: pointer;">
                            <th scope="row">
                                <a href="../details/?id=<?php echo $idno; ?>" class="text-decoration-none text-dark d-block">
                                    <?php echo $name; ?> - <?php echo $type; ?>
                                    <br>
                                    <?php if (empty($f_reporting_start) && empty($f_reporting_end)): ?>
                                        <span class="text-secondary ps-2" style="font-size: 12px;">
                                            As of <?php echo $f_reporting_as_of; ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="text-secondary ps-2" style="font-size: 12px;">
                                            <?php echo $f_reporting_start; ?> through <?php echo $f_reporting_end; ?>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            </th>
                            <td>
                                <a href="../details/?id=<?php echo $idno; ?>" class="text-decoration-none text-dark d-block">
                                    <span class="badge" style="background-color: rgb(232,232,232); color: rgb(130, 130, 130); width: 80px;">
                                        <?php
                                        $comment_count = "SELECT COUNT('1') FROM comments WHERE status = 'Open' AND engagement_idno = '$idno'";
                                        $comment_result = mysqli_query($conn, $comment_count);
                                        $comment_rowtotal = mysqli_fetch_array($comment_result);
                                        echo $comment_rowtotal[0];
                                        ?>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a href="../details/?id=<?php echo $idno; ?>" class="text-decoration-none text-dark d-block">
                                    <span class="badge" style="background-color: rgb(244,244,254); color: rgb(89, 90, 108); width: 80px;">
                                        <?php
                                        $sections_count = "SELECT COUNT('1') FROM assigned_sections WHERE engagement_idno = '$idno'";
                                        $sections_result = mysqli_query($conn, $sections_count);
                                        $sections_rowtotal = mysqli_fetch_array($sections_result);
                                        echo $sections_rowtotal[0];
                                        ?>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a href="../details/?id=<?php echo $idno; ?>" class="text-decoration-none text-dark d-block">
                                    <?php echo $f_final_date; ?>
                                </a>
                            </td>
                            <td>
                                <a href="../details/?id=<?php echo $idno; ?>" class="text-decoration-none text-dark d-block">
                                    <span class="badge" style="background-color: rgb(224,242,238); color: rgb(118, 135, 131);">
                                        <?php echo $status; ?>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a href="../details/?id=<?php echo $idno; ?>" class="text-decoration-none text-dark d-block">
                                    <?php echo $f_created; ?>
                                </a>
                            </td>
                        </tr>
                        <?php }}} ?>

                        
                      </tbody>
                    </table>

                </div>
                

            </div>  
        <!-- end Table -->
        

      </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
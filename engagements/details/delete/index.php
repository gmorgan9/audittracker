<?php
include_once '../../../path.php';
include_once ROOT_PATH . '/app/database/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idno = $_GET['eidno'];

    $stmt = mysqli_prepare($conn, "DELETE FROM comments WHERE idno = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: " . BASE_URL . "/engagements/details/?id=" . $idno . "&deleted=true");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "ID not provided.";
}
?>

<?php
include_once '../../../path.php';
include_once ROOT_PATH . '/app/database/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id']; // The parent comment ID
    $idno = $_GET['eidno']; // The engagement_idno for redirect

    // Step 1: Delete child comments
    $stmt1 = mysqli_prepare($conn, "DELETE FROM comments WHERE parent_comment_id = ?");
    mysqli_stmt_bind_param($stmt1, 'i', $id);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);

    // Step 2: Delete the parent comment
    $stmt2 = mysqli_prepare($conn, "DELETE FROM comments WHERE id = ?");
    mysqli_stmt_bind_param($stmt2, 'i', $id);

    if (mysqli_stmt_execute($stmt2)) {
        header("Location: " . BASE_URL . "/engagements/details/?id=" . $idno . "&deleted=true");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt2);
} else {
    echo "ID not provided.";
}
?>

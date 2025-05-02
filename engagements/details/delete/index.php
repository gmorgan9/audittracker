<?php
include_once '../../../path.php';
include_once ROOT_PATH . '/app/database/connection.php';

if (isset($_GET['id']) && isset($_GET['eidno'])) {
    $id = $_GET['id'];       // This is the parent comment ID to delete
    $idno = $_GET['eidno'];  // This is the engagement ID for redirect

    // Delete child comments first
    $childStmt = mysqli_prepare($conn, "DELETE FROM comments WHERE parent_comment_id = ?");
    mysqli_stmt_bind_param($childStmt, 'i', $id);
    mysqli_stmt_execute($childStmt);
    mysqli_stmt_close($childStmt);

    // Then delete the parent comment
    $parentStmt = mysqli_prepare($conn, "DELETE FROM comments WHERE id = ?");
    mysqli_stmt_bind_param($parentStmt, 'i', $id);

    if (mysqli_stmt_execute($parentStmt)) {
        mysqli_stmt_close($parentStmt);
        header("Location: " . BASE_URL . "/engagements/details/?id=" . $idno . "&deleted=true");
        exit;
    } else {
        echo "Error deleting parent comment: " . mysqli_error($conn);
    }
} else {
    echo "ID or engagement ID not provided.";
}
?>

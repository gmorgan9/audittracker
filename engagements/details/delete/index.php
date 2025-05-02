<?php
include_once '../../../path.php';
include_once ROOT_PATH . '/app/database/connection.php';

if (isset($_GET['id']) && isset($_GET['eidno'])) {
    $id = $_GET['id'];       // ID of the parent comment
    $idno = $_GET['eidno'];  // engagement_idno

    // Delete child comments first
    $child_stmt = mysqli_prepare($conn, "DELETE FROM comments WHERE parent_comment_id = ?");
    mysqli_stmt_bind_param($child_stmt, 'i', $id);
    mysqli_stmt_execute($child_stmt);
    mysqli_stmt_close($child_stmt);

    // Then delete the parent comment
    $parent_stmt = mysqli_prepare($conn, "DELETE FROM comments WHERE id = ?");
    mysqli_stmt_bind_param($parent_stmt, 'i', $id);

    if (mysqli_stmt_execute($parent_stmt)) {
        header("Location: " . BASE_URL . "/engagements/details/?id=" . $idno . "&deleted=true");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($parent_stmt);
} else {
    echo "ID not provided.";
}
?>

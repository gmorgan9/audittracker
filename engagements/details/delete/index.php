<?php
include_once '../../../path.php';
include_once ROOT_PATH . '/app/database/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idno = $_GET['eidno'];

    // Step 1: Delete child comments
    $stmt1 = mysqli_prepare($conn, "DELETE FROM comments WHERE parent_comment_id = ?");
    mysqli_stmt_bind_param($stmt1, 'i', $id); // Changed to 's'
    if (!mysqli_stmt_execute($stmt1)) {
        echo "Error deleting child comments: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt1);

    // Step 2: Delete the parent comment
    $stmt2 = mysqli_prepare($conn, "DELETE FROM comments WHERE id = ?");
    mysqli_stmt_bind_param($stmt2, 'i', $id); // Changed to 's'
    if (mysqli_stmt_execute($stmt2)) {
        header("Location: " . BASE_URL . "/engagements/details/?id=" . $idno . "&deleted=true");
        exit;
    } else {
        echo "Error deleting parent comment: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt2);
} else {
    echo "ID not provided.";
}
?>

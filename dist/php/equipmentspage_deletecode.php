<?php
include 'session.php';
if (isset($_GET['EQ_ID'])) {
    $EQ_ID = $_GET['EQ_ID'];
    $sql = "DELETE FROM equipment WHERE EQ_ID = '$EQ_ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:equipmentspage.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

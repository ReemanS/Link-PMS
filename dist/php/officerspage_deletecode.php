<?php
include 'session.php';

if (isset($_GET['OFF_ID'])) {
    try {
        $OFF_ID = $_GET['OFF_ID'];
        $sql = "DELETE FROM officer WHERE OFF_ID = '$OFF_ID'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        header("location: officerspage.php");
    } catch (Exception $e) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

<?php
include 'session.php';
if (isset($_POST['MEM_ID'])) {
    $MEM_ID = $_POST['MEM_ID'];
    $sql = "DELETE FROM member WHERE MEM_ID = '$MEM_ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
header("location:memberspage.php");
?>

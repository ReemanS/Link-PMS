<?php
include 'session.php';
$INQ_ID = $_GET['inquiryid'];
$OFF_ID = $_GET['newofficerid'];
$sql = "UPDATE inquiry SET OFF_ID = '$OFF_ID' WHERE INQ_ID = '$INQ_ID'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:inquirypage.php");

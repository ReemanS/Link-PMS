<?php
include 'session.php';
$INQ_ID = $_GET["inquiryid"];
$sql = "UPDATE inquiry SET OFF_ID = NULL WHERE INQ_ID = '$INQ_ID'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:inquirypage.php?sel_inquiry=$INQ_ID");

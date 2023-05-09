<?php
include 'session.php';
$INQ_ID = $_GET["inquiryid"];
$sql = "DELETE FROM inquiry WHERE INQ_ID = '$INQ_ID'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:inquirypage.php");

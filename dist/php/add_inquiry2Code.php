<?php
include 'session.php';
$CLIENT_ID = $_GET["clientid"];

if (isset($_POST['inquirydetails'])) {
  $INQ_DETAILS = $_POST['inquirydetails'];
  $sql = "INSERT INTO inquiry (INQ_Details, CLIENT_ID) VALUES ('$INQ_DETAILS', '$CLIENT_ID')";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("location:inquirypage.php");
}

<?php
include 'session.php';
include 'officerspage.php';
$OFF_ID = $_GET["OFF_ID"];
$sql = "UPDATE officer SET OFF_ID = NULL WHERE OFF_ID = '$OFF_ID'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:officerspage.php");

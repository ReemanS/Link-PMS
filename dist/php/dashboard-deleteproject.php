<?php
include 'session.php';
$PROJ_ID = $_GET['projid'];

$sql1 = "SELECT * FROM member WHERE PROJ_ID = '$PROJ_ID'";
$result1 = mysqli_query($conn, $sql1);
$resultCheck1 = mysqli_num_rows($result1);

for ($i = 0; $i < $resultCheck1; $i++) {
  $row = mysqli_fetch_array($result1);
  $memberIdEval = $row['MEM_ID'];
  if (in_array($memberIdEval, $row)) {
    $sql = "UPDATE member SET PROJ_ID = NULL WHERE MEM_ID = '$memberIdEval'";
    $result = mysqli_query($conn, $sql);
  }
}

$sql2 = "DELETE FROM project WHERE PROJ_ID = '$PROJ_ID'";
$result2 = mysqli_query($conn, $sql2);
mysqli_close($conn);
header("location:dashboardpage.php");

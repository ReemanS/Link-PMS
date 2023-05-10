<?php
include "session.php";
$TRANS_ID = $_GET['transid'];

$sql = "DELETE FROM transaction WHERE TRANS_ID = '$TRANS_ID'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:transactionspage.php");

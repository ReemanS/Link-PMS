<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "linkexe_pms";

$conn = mysqli_connect($serverName, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*
// Client Name
$nameQuery = "SELECT CLIENT_FNAME, CLIENT_LNAME FROM client WHERE CLIENT_ID = '$row[CLIENT_ID]'";
$nameResult = mysqli_query($conn, $nameQuery);
$name = mysqli_fetch_assoc($nameResult);
$clientName = $name['CLIENT_FNAME'] . " " . $name['CLIENT_LNAME'];
// Inquiry Details (first 30 characters)
$details = $row['INQ_Details'];
$details = substr($details, 0, 30);
$details = $details . "...";
*/
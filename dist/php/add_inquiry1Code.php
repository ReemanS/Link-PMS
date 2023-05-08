<?php
include 'session.php';
if (isset($_POST["add-client"])) {
  $CLIENT_GIVENNAME = $_POST["givenname"];
  $CLIENT_SURNAME = $_POST["surname"];
  $CLIENT_ADDRESS = $_POST["address"];
  $CLIENT_EMAIL = $_POST["email"];
  $CLIENT_CONTACTNO = $_POST["contact"];

  $sql = "INSERT INTO client (CLIENT_GivenName, CLIENT_Surname, CLIENT_Address, CLIENT_EmailAddress, CLIENT_ContactNo) VALUES ('$CLIENT_GIVENNAME', '$CLIENT_SURNAME', '$CLIENT_ADDRESS', '$CLIENT_EMAIL', '$CLIENT_CONTACTNO')";
  $result = mysqli_query($conn, $sql);
  $getClientIdQuery = "SELECT CLIENT_ID FROM client WHERE CLIENT_GivenName = '$CLIENT_GIVENNAME' AND CLIENT_Surname = '$CLIENT_SURNAME' AND CLIENT_Address = '$CLIENT_ADDRESS' AND CLIENT_EmailAddress = '$CLIENT_EMAIL' AND CLIENT_ContactNo = '$CLIENT_CONTACTNO'";
  $getClientId = mysqli_query($conn, $getClientIdQuery);
  $row = mysqli_fetch_assoc($getClientId);
  $CLIENT_ID = $row["CLIENT_ID"];
  mysqli_close($conn);
  header("location:add_inquiry2.php?clientid=$CLIENT_ID");
}

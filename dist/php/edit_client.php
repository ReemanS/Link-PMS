<?php
include 'session.php';
$CLIENT_ID = $_GET["clientid"];
$sql = "SELECT * FROM client WHERE CLIENT_ID = '$CLIENT_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$CLIENT_GIVENNAME = $row["CLIENT_GivenName"];
$CLIENT_SURNAME = $row["CLIENT_Surname"];
$CLIENT_ADDRESS = $row["CLIENT_Address"];
$CLIENT_EMAIL = $row["CLIENT_EmailAddress"];
$CLIENT_CONTACTNO = $row["CLIENT_ContactNo"];

if (isset($_POST['save-client'])) {
  $CLIENT_GIVENNAME = $_POST["givenname"];
  $CLIENT_SURNAME = $_POST["surname"];
  $CLIENT_ADDRESS = $_POST["address"];
  $CLIENT_EMAIL = $_POST["email"];
  $CLIENT_CONTACTNO = $_POST["contact"];

  $sql = "UPDATE client SET CLIENT_GivenName = '$CLIENT_GIVENNAME', CLIENT_Surname = '$CLIENT_SURNAME', CLIENT_Address = '$CLIENT_ADDRESS', CLIENT_EmailAddress = '$CLIENT_EMAIL', CLIENT_ContactNo = '$CLIENT_CONTACTNO' WHERE CLIENT_ID = '$CLIENT_ID'";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("location:inquirypage.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap Styles-->
  <link rel="stylesheet" href="../style/main.min.css" />
  <link rel="stylesheet" href="../../node_modules\bootstrap-icons\font\bootstrap-icons.min.css" />
  <!-- Google Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,300,0,-25" />
  <title>New Inquiry</title>
</head>

<body>
  <main class="d-flex flex-nowrap">
    <aside class="col-2 border p-2 h-100 min-vh-100 d-flex flex-column">
      <div id="site-header" class="d-flex align-items-center">
        <img src="../assets/logo-black.png" alt="logo" height="50" width="50" />
        <h4 class="m-2">LINK.exe</h4>
      </div>
      <hr />
      <ul id="nav-contents" class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="inquirypage.php" class="nav-link py-3 rounded-4 d-flex active">
            <span class="material-symbols-outlined mx-1"> inbox </span>
            Inquiries
          </a>
        </li>
        <li class="nav-item">
          <a href="transactionspage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
            <span class="material-symbols-outlined mx-1"> receipt_long </span>
            Transactions
          </a>
        </li>
        <li class="nav-item">
          <a href="dashboardpage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
            <span class="material-symbols-outlined mx-1"> dashboard </span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a href="officerspage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
            <span class="material-symbols-outlined mx-1">
              supervised_user_circle
            </span>
            Officers
          </a>
        </li>
        <li class="nav-item">
          <a href="memberspage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
            <span class="material-symbols-outlined mx-1"> groups </span>
            Members
          </a>
        </li>
      </ul>
      <hr />
      <div id="site-user" class="d-flex align-items-center">
        <img src="../assets/zuc.jpg" alt="link officer" class="img-thumbnail rounded-5 me-2" width="60" height="60" />
        <div id="site-user-info">
          <h6 class="m-0 fw-bold">Mark Zuckerburg</h6>
          <small>LINK.exe officer</small>
        </div>
      </div>
    </aside>

    <section class="col-10 p-2 bg-secondary-subtle">
      <div class="d-flex align-items-center mb-2">
        <h4 class="d-flex align-items-center fw-bold">
          <span class="material-symbols-outlined"> edit </span>
          &VeryThinSpace; Edit Client Information
        </h4>
      </div>

      <!-- Edit client -->
      <div class="d-flex flex-nowrap">
        <section class="col-6 container p-3 bg-white border rounded">
          <h5 class="fw-bold">Re-enter client details</h5>
          <form method="post">
            <div class="mb-3">
              <label for="" class="form-label">Given Name</label>
              <input type="text" name="givenname" id=" " class="form-control" value="<?php echo $CLIENT_GIVENNAME ?>" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Surname</label>
              <input type="text" name="surname" id=" " class="form-control" value="<?php echo $CLIENT_SURNAME ?>" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Address</label>
              <input type="text" name="address" id=" " class="form-control" value="<?php echo $CLIENT_ADDRESS ?>" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" name="email" id=" " class="form-control" value="<?php echo $CLIENT_EMAIL ?>" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Contact Number</label>
              <input type="tel" name="contact" id=" " class="form-control" value="<?php echo $CLIENT_CONTACTNO ?>" />
            </div>
            <div class="mt-4 d-flex justify-content-center">
              <button name="save-client" class="btn btn-lg btn-primary d-flex align-items-center">
                Save
              </button>
            </div>
          </form>
        </section>
      </div>
    </section>
  </main>
  <!-- Bootstrap & Popper scripts -->
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>
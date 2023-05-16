<?php
include 'session.php';
$MEM_ID = $_GET["memberid"];
$sql = "SELECT * FROM member WHERE MEM_ID = '$MEM_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$MEM_GIVENNAME = $row["MEM_GivenName"];
$MEM_SURNAME = $row["MEM_Surname"];
$MEM_EMAILADD = $row["MEM_EmailAdd"];
$MEM_DOB = $row["MEM_DOB"];

if (isset($_POST['save-member'])) {
  $MEM_GIVENNAME = $_POST["MEM_GivenName"];
  $MEM_SURNAME = $_POST["MEM_Surname"];
  $MEM_EMAILADD = $_POST["MEM_EmailAdd"];
  $MEM_DOB = $_POST["MEM_DOB"];

  $sql = "UPDATE member SET MEM_GivenName = '$MEM_GIVENNAME', MEM_Surname = '$MEM_SURNAME', MEM_EmailAdd = '$MEM_EMAILADD', MEM_DOB = '$MEM_DOB' WHERE MEM_ID = '$MEM_ID'";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("location:memberspage.php");
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
  <title>Officers</title>
</head>

<body>
  <main class="d-flex flex-nowrap">
    <aside class="col-2 border p-2 h-100 min-vh-100 d-flex flex-column fixed-top">
      <div id="site-header" class="d-flex align-items-center">
        <link rel="preload" href="../assets/logo-black.png" as="image" />
        <img src="../assets/logo-black.png" alt="logo" height="50" width="50" />
        <h4 class="m-2">LINK.exe</h4>
      </div>
      <hr />
      <ul id="nav-contents" class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="dashboardpage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
            <span class="material-symbols-outlined mx-1"> dashboard </span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a href="inquirypage.php" class="inactive-hover-items nav-link py-3 rounded-4 d-flex">
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
          <a href="officerspage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
            <span class="material-symbols-outlined mx-1">
              supervised_user_circle
            </span>
            Officers
          </a>
        </li>
        <li class="nav-item">
          <a href="memberspage.php" class="nav-link py-3 d-flex rounded-4 active">
            <span class="material-symbols-outlined mx-1"> groups </span>
            Members
          </a>
        </li>

        <li class="nav-item">
          <a href="equipmentspage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
            <span class="material-symbols-outlined mx-1">videocam</span>
            Equipments
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
    <aside class="col-2"></aside>

    <!-- Officers Dashboard -->
    <div class="d-flex flex-column col-10">
      <div class="d-flex justify-content-between">
        <section class="col-12 border p-2">
          <div>
            <div>
              <h5 class="d-flex justify-content-between align-items-center fw-bold">
                <div class="d-flex">
                  <span class="material-symbols-outlined mx-1">
                    edit
                  </span>
                  Edit Member
                </div>
              </h5>
            </div>
        </section>
      </div>


      <div class="d-flex flex-nowrap">
        <section class="col-6 container p-3 bg-white border rounded">
          <h5 class="fw-bold">Re-enter officer details</h5>
          <form method="post">
            <div class="mb-3">
              <label for="" class="form-label">Given Name</label>
              <input type="text" name="MEM_GivenName" id=" " class="form-control" value="<?php echo $MEM_GIVENNAME ?>" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Surname</label>
              <input type="text" name="MEM_Surname" id=" " class="form-control" value="<?php echo $MEM_SURNAME ?>" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email Address</label>
              <input type="email" name="MEM_EmailAdd" id=" " class="form-control" value="<?php echo $MEM_EMAILADD ?>" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Date of Birth</label>
              <input type="date" name="MEM_DOB" id=" " class="form-control" value="<?php echo $MEM_DOB ?>" />
            </div>
            <div class="mt-4 d-flex justify-content-center">
              <button name="save-member" class="btn btn-lg btn-primary d-flex align-items-center">
                Save
              </button>
            </div>
          </form>
        </section>
      </div>
  </main>


  <!-- Bootstrap & Popper scripts -->
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
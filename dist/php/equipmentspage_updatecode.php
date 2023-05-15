
<?php
include 'session.php';
$EQ_ID = $_GET["equipmentid"];
$sql = "SELECT * FROM equipment WHERE EQ_ID = '$EQ_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$EQ_ID = $row["EQ_ID"];
$EQ_NAME = $row["EQ_Name"];
$EQ_TYPE = $row["EQ_Type"];
$EQ_LASTUSEDDATE = $row["EQ_LastUsedDate"];
$EQ_OWNER = $row["EQ_Owner"];

if (isset($_POST['save-equipment'])) {
  $EQ_NAME = $_POST["EQ_Name"];
  $EQ_TYPE = $_POST["EQ_Type"];
  $EQ_LASTUSEDDATE = $_POST["EQ_LastUsedDate"];
  $EQ_OWNER = $_POST["EQ_Owner"];

  $sql = "UPDATE equipment SET EQ_Name = '$EQ_NAME', EQ_Type = '$EQ_TYPE', EQ_LastUsedDate = '$EQ_LASTUSEDDATE', EQ_Owner = '$EQ_OWNER' WHERE EQ_ID = '$EQ_ID'";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("location:equipmentspage.php");
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
          <a href="memberspage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
            <span class="material-symbols-outlined mx-1"> groups </span>
            Members
          </a>
        </li>

        <li class="nav-item">
          <a href="equipmentspage.php" class="nav-link py-3 d-flex rounded-4 active">
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
    <div class= "d-flex flex-column col-10">
    <div class= "d-flex justify-content-between">
    <section class="col-12 border p-2">
      <div>
        <div>
          <h5 class="d-flex justify-content-between align-items-center fw-bold">
            <div class="d-flex">
            <span class="material-symbols-outlined mx-1">
              supervised_user_circle
            </span>
              Officers
            </div>
          </h5>
        </div>
    </section>
     </div>


<div class="d-flex flex-nowrap">
                <section class="col-6 container p-3 bg-white border rounded">
                    <h5 class="fw-bold">Re-enter eqipment details</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Equipment Name</label>
                            <input type="text" name="EQ_Name" id=" " class="form-control"
                                value="<?php echo $EQ_NAME ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Type</label>
                            <input type="text" name="EQ_Type" id=" " class="form-control"
                                value="<?php echo $EQ_TYPE ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Last used date</label>
                            <input type="date" name="EQ_LastUsedDate" id=" " class="form-control"
                                value="<?php echo $EQ_LASTUSEDDATE ?>" />
                        </div>
                        <label for="" class="form-label">Owner</label>
                            <input type="text" name="EQ_Owner" id=" " class="form-control"
                                value="<?php echo $EQ_OWNER ?>" />
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <button name="save-equipment" class="btn btn-lg btn-primary d-flex align-items-center">
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
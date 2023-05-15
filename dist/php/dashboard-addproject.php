<?php
include "session.php";
$TRANS_ID = $_GET['transid'];

if (isset($_POST['addproject-btn'])) {
  $PROJ_NAME = $_POST['pname'];
  $PROJ_DESC = $_POST['pdesc'];
  $PROJ_LOCATION = $_POST['ploc'];
  $PROJ_STARTDATE = $_POST['pstartdate'];
  $PROJ_ENDDATE = $_POST['penddate'];
  $PROJ_STATUS = $_POST['pstatus'];

  $sql = "INSERT INTO project (PROJ_Name, PROJ_Description, PROJ_Location, PROJ_StartDate, PROJ_EndDate, PROJ_Status, TRANS_ID) VALUES ('$PROJ_NAME', '$PROJ_DESC', '$PROJ_LOCATION', '$PROJ_STARTDATE', '$PROJ_ENDDATE', '$PROJ_STATUS', '$TRANS_ID')";
  $result = mysqli_query($conn, $sql);

  $PROJ_ID = mysqli_insert_id($conn);

  if (isset($_POST['members'])) {
    $members = $_POST['members'];
    foreach ($members as $memberId) {
      $sql = "UPDATE member SET PROJ_ID = '$PROJ_ID' WHERE MEM_ID = '$memberId'";
      $result = mysqli_query($conn, $sql);
    }
  }

  header("Location: dashboardpage.php");
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
  <title>Launch project</title>
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
          <a href="dashboardpage.php" class="nav-link py-3 d-flex rounded-4 active">
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

    <section class="col-10 p-2 bg-secondary-subtle">
      <div class="d-flex align-items-center mb-2">
        <h4 class="d-flex align-items-center fw-bold">
          <span class="material-symbols-outlined"> add_circle </span>
          &VeryThinSpace; Launch New Project
        </h4>
      </div>
      <form method="post">
        <div class="d-flex flex-nowrap justify-content-evenly">
          <section class="col-6 p-2 bg-white border rounded">
            <h5 class="fw-bold">Enter project details</h5>

            <div class="mb-3">
              <label for="" class="form-label">Project Name</label>
              <input type="text" name="pname" id=" " class="form-control" autocomplete="off" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Project Description</label>
              <textarea name="pdesc" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Project Location</label>
              <input type="text" name="ploc" id=" " class="form-control" autocomplete="off" />
            </div>
            <!-- project start date and end date -->
            <div class="row">
              <div class="col-6">
                <div class="mb-3">
                  <label for="" class="form-label">Start Date</label>
                  <input type="date" name="pstartdate" id=" " class="form-control" />
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="" class="form-label">End Date</label>
                  <input type="date" name="penddate" id=" " class="form-control" />
                </div>
              </div>
            </div>
            <!-- project status and transaction id -->
            <div class="row">
              <div class="col-6">
                <div>
                  <label for="" class="form-label">Project Status</label>
                  <select name="pstatus" id="" class="form-select">
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="" class="form-label">Transaction ID</label>
                  <input type="text" name="" id=" " class="form-control" value="<?php echo $TRANS_ID ?>" disabled />
                </div>
              </div>
            </div>
            <div class="mt-2 d-flex justify-content-center">
              <button name="addproject-btn" class="btn btn-primary btn-lg d-flex align-items-center">
                Generate
              </button>
            </div>
          </section>
          <section class="col-3 me-5 bg-white border rounded p-2">
            <h5 class="fw-bold">Select Members</h5>
            <?php
            $sql = "SELECT * FROM member ORDER BY MEM_ID ASC";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            ?>
            <div class="list-group overflow-y-auto" style="max-height: 60vh">
              <!-- Client list standard -->
              <?php
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $MEM_ID = $row['MEM_ID'];
                  $MEM_FULLNAME = $row['MEM_GivenName'] . ' ' . $row['MEM_Surname'];
              ?>
                  <div class="btn-group btn-outline-primary" role="group">
                    <input type="checkbox" class="btn-check" id="mem<?php echo $row['MEM_ID'] ?>" autocomplete="off" name="members[]" value="<?php echo $row['MEM_ID'] ?>" <?php if ($row['PROJ_ID'] != NULL) echo 'disabled' ?>>
                    <label class="btn btn-outline-primary text-start" for="mem<?php echo $row['MEM_ID'] ?>">
                      <?php echo $MEM_FULLNAME ?>
                    </label>
                  </div>
              <?php
                }
              } else {
                echo '<p class="text-center">No members found</p>';
              }
              ?>
            </div>
          </section>
        </div>
      </form>
    </section>
  </main>
  <!-- Bootstrap & Popper scripts -->
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>
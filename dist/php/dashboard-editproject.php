<?php
include "session.php";
$PROJ_ID = $_GET['projid'];
$getProjectSql = "SELECT * FROM project WHERE PROJ_ID = '$PROJ_ID'";
$getProjectResult = mysqli_query($conn, $getProjectSql);
$getProjectRow = mysqli_fetch_assoc($getProjectResult);

$sqlMembers = "SELECT * FROM member ORDER BY MEM_ID ASC";
$resultMember = mysqli_query($conn, $sqlMembers);
$resultCheck = mysqli_num_rows($resultMember);

if (isset($_POST['saveproject-btn'])) {
  $PROJ_NAME = $_POST['pname'];
  $PROJ_DESC = $_POST['pdesc'];
  $PROJ_LOCATION = $_POST['ploc'];
  $PROJ_STARTDATE = $_POST['pstartdate'];
  $PROJ_ENDDATE = $_POST['penddate'];
  $PROJ_STATUS = $_POST['pstatus'];

  $sql = "UPDATE project SET PROJ_Name = '$PROJ_NAME', PROJ_Description = '$PROJ_DESC', PROJ_Location = '$PROJ_LOCATION', PROJ_StartDate = '$PROJ_STARTDATE', PROJ_EndDate = '$PROJ_ENDDATE', PROJ_Status = '$PROJ_STATUS' WHERE PROJ_ID = '$PROJ_ID'";
  $result = mysqli_query($conn, $sql);

  if (isset($_POST['members'])) {
    $members = $_POST['members'];

    for ($i = 0; $i < $resultCheck; $i++) {
      $row = mysqli_fetch_array($resultMember);
      $memberIdEval = $row['MEM_ID'];

      if (!in_array($memberIdEval, $members)) {
        $sql = "UPDATE member SET PROJ_ID = NULL WHERE MEM_ID = '$memberIdEval'";
        $result = mysqli_query($conn, $sql);
      }
    }

    foreach ($members as $memberId) {
      $sql = "UPDATE member SET PROJ_ID = '$PROJ_ID' WHERE MEM_ID = '$memberId'";
      $result = mysqli_query($conn, $sql);
    }
  }

  header("Location: dashboardpage.php?projid=$PROJ_ID");
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,300,0,-25" />
    <title>Edit project details</title>
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
                <img src="../assets/zuc.jpg" alt="link officer" class="img-thumbnail rounded-5 me-2" width="60"
                    height="60" />
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
                    <span class="material-symbols-outlined"> edit </span>
                    &VeryThinSpace; Edit Project
                </h4>
            </div>
            <form method="post">
                <div class="d-flex flex-nowrap justify-content-evenly">
                    <section class="col-6 p-2 bg-white border rounded">
                        <h5 class="fw-bold">Re-enter project details</h5>

                        <div class="mb-3">
                            <label for="" class="form-label">Project Name</label>
                            <input type="text" name="pname" id=" " class="form-control" autocomplete="off"
                                value="<?php echo $getProjectRow['PROJ_Name'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Project Description</label>
                            <textarea name="pdesc" id="" cols="30" rows="5"
                                class="form-control"><?php echo $getProjectRow['PROJ_Description'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Project Location</label>
                            <input type="text" name="ploc" id=" " class="form-control" autocomplete="off"
                                value="<?php echo $getProjectRow['PROJ_Location'] ?>" />
                        </div>
                        <!-- project start date and end date -->
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="date" name="pstartdate" id=" " class="form-control"
                                        value="<?php echo $getProjectRow['PROJ_StartDate'] ?>" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">End Date</label>
                                    <input type="date" name="penddate" id=" " class="form-control"
                                        value="<?php echo $getProjectRow['PROJ_EndDate'] ?>" />
                                </div>
                            </div>
                        </div>
                        <!-- project status and transaction id -->
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="" class="form-label">Project Status</label>
                                    <select name="pstatus" id="" class="form-select">
                                        <option value="Ongoing"
                                            <?php if ($getProjectRow['PROJ_Status'] == 'Ongoing') echo "selected='selected'" ?>>
                                            Ongoing</option>
                                        <option value="Completed"
                                            <?php if ($getProjectRow['PROJ_Status'] == 'Completed') echo "selected='selected'" ?>>
                                            Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Transaction ID</label>
                                    <input type="text" name="" id=" " class="form-control"
                                        value="<?php echo $getProjectRow['TRANS_ID'] ?>" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 d-flex justify-content-center">
                            <button name="saveproject-btn" class="btn btn-primary btn-lg d-flex align-items-center">
                                Save Changes
                            </button>
                        </div>
                    </section>
                    <section class="col-3 me-5 bg-white border rounded p-2">
                        <h5 class="fw-bold">Re-select Members</h5>
                        <div class="list-group overflow-y-auto" style="max-height: 60vh">
                            <!-- Client list standard -->
                            <?php
              if ($resultCheck > 0) {
                while ($rowMember = mysqli_fetch_assoc($resultMember)) {
                  $MEM_ID = $rowMember['MEM_ID'];
                  $MEM_FULLNAME = $rowMember['MEM_GivenName'] . ' ' . $rowMember['MEM_Surname'];
              ?>
                            <div class="btn-group btn-outline-primary" role="group">
                                <input type="checkbox" class="btn-check" id="mem<?php echo $rowMember['MEM_ID'] ?>"
                                    autocomplete="off" name="members[]" value="<?php echo $rowMember['MEM_ID'] ?>"
                                    <?php if ($rowMember['PROJ_ID'] == $PROJ_ID) echo 'checked="checked"';
                                                                                                                                                                                        else if (($rowMember['PROJ_ID'] != $PROJ_ID) && ($rowMember['PROJ_ID'] != NULL)) echo 'disabled' ?>>
                                <label class="btn btn-outline-primary text-start"
                                    for="mem<?php echo $rowMember['MEM_ID'] ?>">
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
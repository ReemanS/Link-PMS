<?php
include "session.php";
function filterTransactions($query)
{
  include "session.php";
  $filterResult = mysqli_query($conn, $query);
  return $filterResult;
}
if (isset($_POST['searchtrans-btn'])) {
  $SEARCHVAL = $_POST['searchtrans-sb'];
  $query = "SELECT * FROM transaction WHERE TRANS_Name LIKE '%$SEARCHVAL%'";
  $filterResult = filterTransactions($query);
} else {
  $query = "SELECT * FROM transaction ORDER BY TRANS_ID ASC";
  $filterResult = filterTransactions($query);
}

$SEL_TRANS = isset($_GET['sel_trans']) ? $_GET['sel_trans'] : '';
$sqlSel = "SELECT * FROM transaction WHERE TRANS_ID = '$SEL_TRANS'";
$resultSel = mysqli_query($conn, $sqlSel);
$rowSel = mysqli_fetch_assoc($resultSel);

if (isset($_GET['sel_trans'])) {
  $sqlSelClient = "SELECT CLIENT_GivenName, CLIENT_Surname FROM client WHERE CLIENT_ID = '$rowSel[CLIENT_ID]'";
  $resultSelClient = mysqli_query($conn, $sqlSelClient);
  $rowSelClient = mysqli_fetch_assoc($resultSelClient);
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
          <a href="officerspage.php" class="nav-link py-3 d-flex rounded-4 active">
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
          <span class="material-symbols-outlined">videocam</span>
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
    <section class="col-10 border p-2">
      <div>
        <div>
          <h5 class="d-flex justify-content-between align-items-center fw-bold">
            <div class="d-flex">
            <span class="material-symbols-outlined mx-1">
              supervised_user_circle
            </span>
              Officers
            </div>
            <a href="add_officers.php" class="btn btn-primary d-flex">
                            <span class="material-symbols-outlined"> add </span>
                            Add Officers
                        </a>
          </h5>
        </div>
    </section>
  </main>

  <div class="height d-flex justify-content-center align-items-center">
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center ">
            <div class="mt-2">
                <h2>Narisz Khyll<br>Benalber</h2>
                <div class="mt-3">
                    <h4>Secretary</h4>
                </div>
            </div>
            <div class="image">
                <img src="../assets/logo-black.png" width="150">
            </div>
        </div>
    </div>
</div>





<div class="border my-2 p-1 rounded">
                    <!-- client information -->
                    <?php
                    $selectedInquiryClientID = $selectedInquiryRow['CLIENT_ID'];
                    $selectedInquiryClientQuery = "SELECT * FROM client WHERE CLIENT_ID = '$selectedInquiryClientID'";
                    $selectedInquiryClientResult = mysqli_query($conn, $selectedInquiryClientQuery);
                    $selectedInquiryClientRow = mysqli_fetch_assoc($selectedInquiryClientResult);
                    ?>
                    <h5 class="d-flex align-items-center justify-content-between">
                        <div class="d-flex">
                            <span class="material-symbols-outlined mx-1"> person </span>
                            Client Information
                        </div>
                        <div class="d-flex">
                            <a class="btn rounded-pill btn-sm btn-info d-flex mx-1"
                                href="edit_client.php?clientid=<?php echo $selectedInquiryClientID ?>">
                                <span class="material-symbols-outlined"> edit </span>
                            </a>
                        </div>
                    </h5>
                    <table class="table table-striped">
                        <tr>
                            <td><span class="fw-bold">Officer ID</span></td>
                            <td><span class="text-muted"><?php echo $selectedOfficerID ?></span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Officer Name</span></td>
                            <td><span
                                    class="text-muted"><?php echo $getOfficerId['CLIENT_GivenName'], ' ', $selectedInquiryClientRow['CLIENT_Surname'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Officer Surname</span></td>
                            <td><span
                                    class="text-muted"><?php echo $selectedInquiryClientRow['CLIENT_Address'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Officer Birthday</span></td>
                            <td><span
                                    class="text-muted"><?php echo $selectedInquiryClientRow['CLIENT_EmailAddress'] ?></span>
                            </td>
                        </tr>
                    </table>
                </div>




  <!-- Bootstrap & Popper scripts -->
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
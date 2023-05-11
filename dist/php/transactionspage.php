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
  <title>Transactions</title>
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
          <a href="transactionspage.php" class="nav-link py-3 d-flex rounded-4 active">
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

    <!-- Transaction Dashboard -->
    <section class="col-7 border p-2">
      <div>
        <div>
          <h5 class="d-flex justify-content-between align-items-center fw-bold">
            <div class="d-flex">
              <span class="material-symbols-outlined mx-1 mb-1"> list </span>
              Transaction List
            </div>
            <div class="fw-light fs-6 text-muted d-flex align-items-center">
              <span class="material-symbols-outlined fs-5 me-1">
                emoji_objects
              </span>
              You may only create transactions from active inquiries.
            </div>
          </h5>
        </div>

        <div class="input-group">
          <input type="text" class="form-control" name="searchtrans-sb" placeholder="Search for a transaction..." />
          <button name="searchtrans-btn" class="btn btn-outline-primary d-flex">
            <span class="material-symbols-outlined"> search </span>
          </button>
        </div>

        <div class="overflow-auto" style="max-height: 85vh">
          <ul class="list-unstyled row row-cols-3 g-0">
            <!-- LIST ITEM STANDARD -->
            <?php
            if (mysqli_num_rows($filterResult) > 0) {
              while ($row = mysqli_fetch_array($filterResult)) {
                $TRANS_ID = $row['TRANS_ID'];
            ?>
                <div class="col">
                  <li class="bg-gradient rounded-3 p-2 m-2 <?php echo $row['TRANS_ID'] == $SEL_TRANS ? 'bg-primary text-white active' : 'bg-secondary inactive-hover-items' ?>">
                    <div class="d-flex align-items-center justify-content-between">
                      <a class="btn m-0 <?php echo $row['TRANS_ID'] == $SEL_TRANS ? 'text-white' : '' ?>" href="transactionspage.php?sel_trans=<?php echo $TRANS_ID ?>">
                        <h5 class="m-0"><?php echo $row['TRANS_Name'] ?></h5>
                      </a>
                      <div class="dropend">
                        <button class="btn btn-sm dropdown-toggle <?php echo $row['TRANS_ID'] == $SEL_TRANS ? 'text-white' : '' ?>" data-bs-toggle="dropdown"></button>
                        <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item" href="transaction-edittrans.php?transid=<?php echo $row['TRANS_ID'] ?>">Edit</a>
                          </li>
                          <li>
                            <a class="dropdown-item text-danger" href="transaction-deletetrans.php?transid=<?php echo $row['TRANS_ID'] ?>">Delete</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <hr class="m-1" />
                    <div class="d-flex align-items-center">
                      <span class="material-symbols-outlined fs-5 me-1">
                        analytics
                      </span>
                      <span class="small">Transaction #<?php echo $row['TRANS_ID'] ?></span>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="material-symbols-outlined fs-5 me-1">
                        confirmation_number
                      </span>
                      <span class="small"><?php echo $row['TRANS_InvoiceNo'] ?></span>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="material-symbols-outlined fs-5 me-1">
                        event
                      </span>
                      <span class="small"><?php echo $row['TRANS_Date'] ?></span>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="material-symbols-outlined fs-5 me-1">
                        payments
                      </span>
                      <span class="small"><?php echo $row['TRANS_MOP'] ?></span>
                    </div>
                  </li>
                </div>
              <?php
              }
            } else { ?>
              <p class="fw-bold text-center">No transactions found.</p>
            <?php
            }
            ?>
            <!-- LIST ITEM STANDARD END-->
          </ul>
        </div>
      </div>
    </section>

    <!-- Transaction Content -->
    <section class="col-3 border p-2 px-3 bg-light <?php echo isset($_GET['sel_trans']) ? '' : 'd-none'; ?>">
      <h5 class="d-flex justify-content-between align-items-center fw-bold">
        <div class="d-flex">
          <span class="material-symbols-outlined mx-1 mb-1">
            arrow_right_alt
          </span>
          Selected Transaction
        </div>
      </h5>
      <a class="btn btn-info btn-lg d-flex align-items-center justify-content-center w-100 mb-2" href="dashboard-addproject.php?transid=<?php echo $SEL_TRANS ?>">
        <span class="material-symbols-outlined me-1">
          add_chart
        </span>
        Launch Project
      </a>
      <section class="overflow-y-auto" style="max-height: 90vh">
        <div class="border my-2 p-1 rounded">
          <!-- Transaction information -->
          <h5 class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
              <span class="material-symbols-outlined mx-1"> info </span>
              Transaction Information
            </div>
          </h5>

          <table class="table table-striped">
            <tr>
              <td><span class="fw-bold">Transaction ID</span></td>
              <td><span class="text-muted"><?php echo $rowSel['TRANS_ID'] ?></span></td>
            </tr>
            <tr>
              <td><span class="fw-bold">Transaction Name</span></td>
              <td>
                <span class="text-muted"><?php echo $rowSel['TRANS_Name'] ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="fw-bold">Invoice Number</span>
              </td>
              <td>
                <span class="text-muted"><?php echo $rowSel['TRANS_InvoiceNo'] ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="fw-bold">Transaction Description</span>
              </td>
              <td>
                <span class="text-muted">
                  <?php echo $rowSel['TRANS_Desc'] ?>
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="fw-bold">Transaction Date</span>
              </td>
              <td>
                <span class="text-muted"><?php echo $rowSel['TRANS_Date'] ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="fw-bold">Mode of Payment</span>
              </td>
              <td>
                <span class="text-muted"><?php echo $rowSel['TRANS_MOP'] ?></span>
              </td>
            </tr>
          </table>
        </div>

        <div class="border my-2 p-1 rounded">
          <!-- inquiry information -->
          <h5 class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
              <span class="material-symbols-outlined mx-1"> person </span>
              Inquiry Information
            </div>
          </h5>
          <table class="table table-striped">
            <tr>
              <td><span class="fw-bold">Client Name</span></td>
              <td><span class="text-muted"><?php echo $rowSelClient['CLIENT_GivenName'] . " " . $rowSelClient['CLIENT_Surname'] ?></span>
              </td>
            </tr>
            <tr>
              <td><span class="fw-bold">Inquiry ID</span></td>
              <td><span class="text-muted"><?php echo $rowSel['INQ_ID'] ?></span></td>
            </tr>
          </table>
        </div>
      </section>
    </section>
  </main>

  <!-- Bootstrap & Popper scripts -->
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
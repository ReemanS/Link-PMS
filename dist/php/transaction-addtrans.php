<?php
include "session.php";
$INQ_ID = $_GET['inquiryid'];

$sql = "SELECT * FROM inquiry WHERE INQ_ID = '$INQ_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$CLIENT_ID = $row['CLIENT_ID'];
$sql2 = "SELECT * FROM client WHERE CLIENT_ID = '$CLIENT_ID'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$CLIENT_NAME = $row2['CLIENT_GivenName'] . " " . $row2['CLIENT_Surname'];

if (isset($_POST['newtransaction-btn'])) {
  $TRANS_NAME = $_POST['tname'];
  $TRANS_DESC = $_POST['tdesc'];
  $TRANS_INVOICE = $_POST['invoicenum'];
  $TRANS_DATE = $_POST['tdate'];
  $TRANS_MOP = $_POST['tmop'];

  $sql = "INSERT INTO transaction (TRANS_Name, TRANS_Desc, TRANS_Date, TRANS_InvoiceNo, TRANS_MOP, CLIENT_ID, INQ_ID) VALUES ('$TRANS_NAME', '$TRANS_DESC', '$TRANS_DATE', '$TRANS_INVOICE', '$TRANS_MOP', '$CLIENT_ID', '$INQ_ID')";
  $result = mysqli_query($conn, $sql);
  header("Location: transactionspage.php");
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
    <title>Create Transaction</title>
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
                    <span class="material-symbols-outlined"> add_circle </span>
                    &VeryThinSpace; Generate Transaction
                </h4>
            </div>
            <div class="d-flex flex-nowrap">
                <section class="col-9 container p-2 bg-white border rounded">
                    <h5 class="fw-bold">Enter transaction details</h5>
                    <form method="post">
                        <div class="d-flex">
                            <div class="col-7 px-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">Transaction Name</label>
                                    <input type="text" name="tname" id=" " class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Transaction Description</label>
                                    <textarea name="tdesc" id="" cols="20" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-5 px-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">Invoice Number</label>
                                    <input type="text" name="invoicenum" id=" " class="form-control" />
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                Transaction Date
                                            </label>
                                            <input type="date" name="tdate" id=" " class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mode of Payment</label>
                                            <select name="tmop" id="" class="form-select">
                                                <option value="Cash">Cash</option>
                                                <option value="Debit/Credit">Debit/Credit</option>
                                                <option value="Cheque">Cheque</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Inquiry ID</label>
                                            <input type="text" name="" id=" " class="form-control"
                                                value="<?php echo $INQ_ID ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Client Name</label>
                                            <input type="text" name="" id=" " class="form-control"
                                                value="<?php echo $CLIENT_NAME ?>" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 d-flex justify-content-center">
                            <button name="newtransaction-btn" class="btn btn-primary btn-lg">Generate</button>
                        </div>
                    </form>
                </section>
            </div>
            <div style="height: 240px"></div>
        </section>
    </main>
    <!-- Bootstrap & Popper scripts -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>
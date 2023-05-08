<?php include "session.php" ?>

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
    <title>Inquiries</title>
</head>

<body>
    <main class="d-flex flex-nowrap">
        <aside class="col-2 border p-2 h-100 min-vh-100 d-flex flex-column">
            <div id="site-header" class="d-flex align-items-center">
                <link rel="preload" href="../assets/logo-black.png" as="image">
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
                <img src="../assets/zuc.jpg" alt="link officer" class="img-thumbnail rounded-5 me-2" width="60"
                    height="60" />
                <div id="site-user-info">
                    <h6 class="m-0 fw-bold">Mark Zuckerburg</h6>
                    <small>LINK.exe officer</small>
                </div>
            </div>
        </aside>

        <!-- Inquiry Dashboard -->
        <section id="dashboard" class="col-7 border p-2">
            <div id="inquiries-list">
                <div>
                    <h5 class="d-flex justify-content-between align-items-center fw-bold">
                        <div class="d-flex">
                            <span class="material-symbols-outlined mx-1 mb-1"> list </span>
                            Inquiry List
                        </div>
                        <a href="add_inquiry1.php" class="btn btn-primary d-flex">
                            <span class="material-symbols-outlined"> add </span>
                            Add inquiry
                        </a>
                    </h5>
                </div>

                <?php
                function filterItems($query)
                {
                    include "session.php";
                    $filterResult = mysqli_query($conn, $query);
                    return $filterResult;
                }
                if (isset($_POST['inquiry-search-btn'])) {
                    $SEARCHVAL = $_POST['inquiry-searchbar'];
                    $query = "SELECT * FROM inquiry WHERE INQ_Details LIKE '%$SEARCHVAL%'";
                    $filterResult = filterItems($query);
                } else {
                    $query = "SELECT * FROM inquiry ORDER BY INQ_ID ASC";
                    $filterResult = filterItems($query);
                }
                ?>

                <!-- Search inquiry -->
                <form class="input-group" method="post">
                    <input type="text" class="form-control" name="inquiry-searchbar"
                        placeholder="Search for an inquiry..." />
                    <button name="inquiry-search-btn" class="btn btn-outline-primary d-flex">
                        <span class="material-symbols-outlined"> search </span>
                    </button>
                </form>

                <div class="overflow-auto" style="max-height: 85vh">
                    <ul class="list-unstyled">
                        <?php
                        if (mysqli_num_rows($filterResult) > 0) {
                            while ($row = mysqli_fetch_assoc($filterResult)) {
                                // Client Name
                                $nameQuery = "SELECT CLIENT_GivenName, CLIENT_Surname FROM client WHERE CLIENT_ID = '$row[CLIENT_ID]'";
                                $nameResult = mysqli_query($conn, $nameQuery);
                                $name = mysqli_fetch_assoc($nameResult);
                                $clientName = $name['CLIENT_GivenName'] . " " . $name['CLIENT_Surname'];
                                // Inquiry Details (first 30 characters)
                                $details = $row['INQ_Details'];
                                $details = substr($details, 0, 100);
                                $details = $details . "...";

                                $selectedInquiry = isset($_GET['sel_inquiry']) ? $_GET['sel_inquiry'] : ''; // extension of code found below
                        ?>
                        <!-- LIST ITEM STANDARD -->
                        <li
                            class="p-2 my-1 border rounded <?php echo ($row['INQ_ID'] == $selectedInquiry ? "bg-primary" : 'inactive-hover-items') ?>">
                            <a href="inquirypage.php?sel_inquiry=<?php echo $row['INQ_ID'] ?>"
                                class="d-flex text-decoration-none">
                                <div class="d-flex flex-row">
                                    <div>
                                        <img src="../assets/ClientAvatar.webp" alt="avatar"
                                            class="d-flex align-self-center me-3" width="60" />
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span
                                            class="fw-bold <?php echo ($row['INQ_ID'] == $selectedInquiry ? "text-white" : '') ?>"><?php echo $clientName ?></span>
                                        <span
                                            class="small <?php echo ($row['INQ_ID'] == $selectedInquiry ? "text-white" : 'text-muted ') ?>"><?php echo $details ?></span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <?php }
                        } else { ?>
                        <p class="fw-bold text-center">No inquiries found.</p>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Inquiry Content -->
        <section id="inquiry-content"
            class="col-3 border p-2 px-3 bg-light <?php echo isset($_GET['sel_inquiry']) ? '' : 'd-none'; ?>">
            <h5 class="d-flex justify-content-between align-items-center fw-bold">
                <div class="d-flex">
                    <span class="material-symbols-outlined mx-1 mb-1">
                        arrow_right_alt
                    </span>
                    Selected Inquiry
                </div>
            </h5>
            <div class="overflow-y-auto" style="max-height: 90vh">
                <div class="border my-2 p-1 rounded">
                    <!-- Inquiry information -->
                    <?php
                    $selectedInquiryQuery = "SELECT * FROM inquiry WHERE INQ_ID = '$selectedInquiry'";
                    $selectedInquiryResult = mysqli_query($conn, $selectedInquiryQuery);
                    $selectedInquiryRow = mysqli_fetch_assoc($selectedInquiryResult);
                    ?>
                    <h5 class="d-flex align-items-center justify-content-between">
                        <div class="d-flex">
                            <span class="material-symbols-outlined mx-1"> info </span>
                            Inquiry Information
                        </div>
                        <div class="d-flex">
                            <a class="btn rounded-pill btn-sm btn-info d-flex mx-1"
                                href="edit_inquiry.php?inquiryid=<?php echo $selectedInquiry ?>">
                                <span class="material-symbols-outlined"> edit </span>
                            </a>
                            <a class="btn rounded-pill btn-sm btn-danger d-flex mx-1"
                                href="delete_inquiry.php?inquiryid=<?php echo $selectedInquiry ?>">
                                <span class="material-symbols-outlined"> delete </span>
                            </a>
                        </div>
                    </h5>
                    <table class="table table-striped">
                        <tr>
                            <td><span class="fw-bold">Inquiry ID</span></td>
                            <td><span class="text-muted"><?php echo $selectedInquiryRow['INQ_ID'] ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fw-bold">Inquiry Details</span>
                            </td>
                            <td>
                                <span class="text-muted"><?php echo $selectedInquiryRow['INQ_Details'] ?></span>
                            </td>
                            <br />
                        </tr>
                    </table>
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
                            <td><span class="fw-bold">Client ID</span></td>
                            <td><span class="text-muted"><?php echo $selectedInquiryClientID ?></span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Client Name</span></td>
                            <td><span
                                    class="text-muted"><?php echo $selectedInquiryClientRow['CLIENT_GivenName'], ' ', $selectedInquiryClientRow['CLIENT_Surname'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Client Address</span></td>
                            <td><span
                                    class="text-muted"><?php echo $selectedInquiryClientRow['CLIENT_Address'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Client Email</span></td>
                            <td><span
                                    class="text-muted"><?php echo $selectedInquiryClientRow['CLIENT_EmailAddress'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Client Phone</span></td>
                            <td><span
                                    class="text-muted"><?php echo $selectedInquiryClientRow['CLIENT_ContactNo'] ?></span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="border my-2 p-1 rounded">
                    <!-- Officer information-->
                    <!-- If empty, place muted text that says no officer assigned yet -->
                    <?php
                    // assigned officer
                    $selectedInquiryOfficerID = $selectedInquiryRow['OFF_ID'];
                    $selectedInquiryOfficerQuery = "SELECT * FROM officer WHERE OFF_ID = '$selectedInquiryOfficerID'";
                    $selectedInquiryOfficerResult = mysqli_query($conn, $selectedInquiryOfficerQuery);
                    $selectedInquiryOfficerRow = mysqli_fetch_assoc($selectedInquiryOfficerResult);

                    ?>
                    <h5 class="d-flex align-items-center justify-content-between ">
                        <div class="d-flex">
                            <span class="material-symbols-outlined">
                                supervisor_account
                            </span>
                            &VeryThinSpace; Assigned Officer
                        </div>
                        <div class="d-flex">
                            <a class="btn rounded-pill btn-sm btn-info d-flex mx-1"
                                href="edit_officer.php?inquiryid=<?php echo $selectedInquiry ?>">
                                <span class="material-symbols-outlined"> edit </span>
                            </a>
                            <a class="btn rounded-pill btn-sm btn-danger d-flex mx-1"
                                href="delete_officerCode.php?inquiryid=<?php echo $selectedInquiry ?>">
                                <span class="material-symbols-outlined"> delete </span>
                            </a>
                        </div>
                    </h5>
                    <table class="table table-striped <?php echo $selectedInquiryOfficerID != NULL ? '' : 'd-none' ?>">
                        <tr>
                            <td>
                                <span class="fw-bold">Officer ID</span>
                            </td>
                            <td><span class="text-muted"><?php echo $selectedInquiryOfficerRow['OFF_ID'] ?></span>
                                <br />
                            </td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Officer Name</span></td>
                            <td><span
                                    class="text-muted"><?php echo $selectedInquiryOfficerRow['OFF_GivenName'], ' ', $selectedInquiryOfficerRow['OFF_Surname'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Officer Email</span></td>
                            <td><span class="text-muted"><?php echo $selectedInquiryOfficerRow['OFF_EmailAdd'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">Officer Birthday</span></td>
                            <td><span class="text-muted"><?php echo ($selectedInquiryOfficerRow['OFF_DOB']) ?></span>
                            </td>
                        </tr>
                    </table>
                    <!-- no assigned officer -->
                    <p class="text-muted text-center <?php echo $selectedInquiryOfficerID != NULL ? 'd-none' : '' ?>">
                        This inquiry has no assigned officer yet.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Bootstrap & Popper scripts -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>
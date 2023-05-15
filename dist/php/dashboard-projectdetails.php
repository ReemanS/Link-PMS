<?php
include "session.php";
$PROJ_ID = $_GET['projid'];

$sql = "SELECT * FROM project WHERE PROJ_ID = '$PROJ_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT * FROM member WHERE PROJ_ID = '$PROJ_ID'";
$result2 = mysqli_query($conn, $sql2);
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
    <title>Project Details</title>
</head>

<body class="bg-secondary-subtle">
    <main class="d-flex flex-nowrap">
        <aside class="col-2 border p-2 h-100 min-vh-100 d-flex flex-column fixed-top bg-white">
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
        <section class="col-10 p-2">
            <div class="d-flex flex-nowrap mt-5">
                <section class="col-6 container p-2 bg-white border rounded mt-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold"><?php echo $row['PROJ_Name'] ?></h4>
                        <a class="btn btn-outline-danger btn-close" href="dashboardpage.php"></a>
                    </div>

                    <div class="p-1">
                        <div class="row row-cols-2 g-0">
                            <div class="col-7 me-1">
                                <div class="mb-3">
                                    <p class="fw-bold mb-0">Project Description</p>
                                    <span><?php echo $row['PROJ_Description'] ?></span>
                                </div>
                                <div class="mb-3">
                                    <p class="fw-bold mb-0">Project Location</p>
                                    <span><?php echo $row['PROJ_Location'] ?></span>
                                </div>
                                <div class="d-flex">
                                    <div class="mb-3 me-4">
                                        <p class="fw-bold mb-0">Start Date</p>
                                        <span><?php echo $row['PROJ_StartDate'] ?></span>
                                    </div>
                                    <div class="mb-3">
                                        <p class="fw-bold mb-0">End Date</p>
                                        <span><?php echo $row['PROJ_EndDate'] ?></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <p class="fw-bold mb-0">Project Status</p>
                                    <span><?php echo $row['PROJ_Status'] ?></span>
                                </div>
                                <div class="mb-3">
                                    <p class="fw-bold mb-0">Transaction ID</p>
                                    <span><?php echo $row['TRANS_ID'] ?></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <p class="fw-bold mb-0">Members</p>
                                <ul>
                                    <?php while ($row2 = mysqli_fetch_array($result2)) { ?>
                                    <li class="mb-1"><?php echo $row2['MEM_GivenName'] . ' ' . $row2['MEM_Surname'] ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </section>
    </main>
    <!-- Bootstrap & Popper scripts -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>
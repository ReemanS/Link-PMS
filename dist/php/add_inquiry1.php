<?php include 'add_inquiry1Code.php' ?>

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
                    <span class="material-symbols-outlined"> add_circle </span>
                    &VeryThinSpace; Create New Inquiry
                </h4>
            </div>
            <!-- Add new client -->
            <div class="d-flex flex-nowrap">
                <section class="col-6 container p-2 bg-white border rounded">
                    <h5 class="fw-bold">Enter client details</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Given Name</label>
                            <input type="text" name="givenname" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Surname</label>
                            <input type="text" name="surname" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contact Number</label>
                            <input type="tel" name="contact" id=" " class="form-control" />
                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                            <button name="add-client" class="btn btn-primary d-flex align-items-center">
                                Next
                                <span class="material-symbols-outlined"> navigate_next </span>
                            </button>
                        </div>
                    </form>
                </section>
                <section class="col-2 d-flex align-items-center justify-content-center">
                    <span class="display-6">OR</span>
                </section>
                <section class="col-4 container p-2 bg-white border rounded">
                    <!-- Select from list of clients, each item is a li with anchor tag -->
                    <h5 class="fw-bold">Select from existing clients</h5>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Search for a client..." />
                        <button class="btn btn-outline-primary d-flex" type="button">
                            <span class="material-symbols-outlined"> search </span>
                        </button>
                    </div>
                    <?php
                    $sql = "SELECT CLIENT_ID, CLIENT_GivenName, CLIENT_Surname FROM client";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    ?>

                    <div class="list-group overflow-y-auto" style="max-height: 60vh">
                        <!-- Client list standard -->
                        <?php
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $CLIENT_ID = $row['CLIENT_ID'];
                                echo '<a href="add_inquiry2.php?clientid=' . $CLIENT_ID . '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <span>' . $row['CLIENT_GivenName'] . ' ' . $row['CLIENT_Surname'] . '</span>
                                <span class="material-symbols-outlined text-primary">
                                    navigate_next
                                </span>
                            </a>';
                            }
                        } else {
                            echo '<p class="text-center">No clients found</p>';
                        }
                        ?>
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
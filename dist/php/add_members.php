<?php
             include 'session.php';
             if (isset($_POST["add-member"])) {
             $MEM_ID = $_POST["MEM_ID"];
             $MEM_GivenName = $_POST["MEM_GivenName"];
             $MEM_Surname = $_POST["MEM_Surname"];
             $MEM_EmailAdd = $_POST["MEM_EmailAdd"];
             $MEM_DOB = $_POST["MEM_DOB"];
             
             $sql = "INSERT INTO member (MEM_ID, MEM_GivenName, MEM_Surname, MEM_EmailAdd, MEM_DOB) VALUES ('$MEM_ID', '$MEM_GivenName', '$MEM_Surname', '$MEM_EmailAdd', '$MEM_DOB')";
             $result = mysqli_query($conn, $sql);
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,300,0,-25" />
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
                    <a href="dashboardpage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
                        <span class="material-symbols-outlined mx-1"> dashboard </span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="inquirypage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
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
                    <a href="officerspage.php" class="ninactive-hover-items nav-link py-3 d-flex rounded-4">
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
                <img src="../assets/zuc.jpg" alt="link officer" class="img-thumbnail rounded-5 me-2" width="60"
                    height="60" />
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
                    &VeryThinSpace; Add members
                </h4>
            </div>
            
            <!-- Add new officer -->
            <div class="d-flex flex-nowrap">
                <section class="col-6 container p-2 bg-white border rounded">
                    <h5 class="fw-bold">Enter member details</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Member Given Name</label>
                            <input type="text" name="MEM_GivenName" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Member Surname</label>
                            <input type="text" name="MEM_Surname" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Member Email</label>
                            <input type="text" name="MEM_EmailAdd" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Member Birthday</label>
                            <input type="date" name="MEM_DOB" id=" " class="form-control" />
                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                            <button name="add-member" class="btn btn-primary d-flex align-items-center">
                                Save
                                <span class="material-symbols-outlined"> navigate_next </span>
                            </button>
                        </div>
                    </form>
                </section>
    </main>
    <!-- Bootstrap & Popper scripts -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>
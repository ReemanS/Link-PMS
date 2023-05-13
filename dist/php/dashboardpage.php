<?php
include "session.php";
$sql = "SELECT * FROM project ORDER BY PROJ_ID ASC";
function filterProjects($query)
{
  include "session.php";
  $filterResult = mysqli_query($conn, $query);
  return $filterResult;
}

if (isset($_POST['filterall-btn'])) {
  $sql = "SELECT * FROM project ORDER BY PROJ_ID ASC";
  $result = filterProjects($sql);
} else if (isset($_POST['ongoing-btn'])) {
  $sql = "SELECT * FROM project WHERE PROJ_STATUS = 'Ongoing' ORDER BY PROJ_ID ASC";
  $result = filterProjects($sql);
} else if (isset($_POST['completed-btn'])) {
  $sql = "SELECT * FROM project WHERE PROJ_STATUS = 'Completed' ORDER BY PROJ_ID ASC";
  $result = filterProjects($sql);
} else {
  $result = mysqli_query($conn, $sql);
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
    <!-- Animate.css -->
    <link rel="stylesheet" href="../../node_modules/animate.css/animate.min.css" />
    <title>Dashboard</title>
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
            <span class="material-symbols-outlined mx-1"> groups </span>
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

        <section class="col-10 p-2 bg-hero mw-100">
            <div class="mx-5 my-1">
                <h1 class="text-bg-primary fw-bold bg-opacity-50 p-2 rounded animate__animated animate__fadeIn"
                    style="width: 34%">
                    Hello there, Mark!
                </h1>
                <div class="my-5">&nbsp;</div>
                <div class="d-flex">
                    <!-- Left column -->
                    <div class="bg-light p-3 d-flex flex-column rounded-4 col-9 me-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="text-primary fw-bold d-flex align-items-center">
                                <span class="material-symbols-outlined fs-3"> list_alt </span>
                                &VeryThinSpace; Projects Summary
                            </h2>
                            <div class="me-2 fs-4">May 9, 2023</div>
                        </div>
                        <hr />
                        <div class="d-flex flex-row align-items-center">
                            <span class="text-body-emphasis me-1">Display: </span>
                            <form method="post">
                                <button name="filterall-btn" class="btn btn-outline-primary btn-sm me-1 rounded-pill">
                                    All
                                </button>
                                <button name="ongoing-btn" class="btn btn-info btn-sm me-1 rounded-pill">
                                    Ongoing
                                </button>
                                <button name="completed-btn" class="btn btn-success btn-sm me-1 rounded-pill">
                                    Completed
                                </button>
                            </form>
                        </div>
                        <!-- Projects Cards -->
                        <div class="mt-3 row row-cols-3 g-0">
                            <!-- Card standard start -->
                            <?php
              while ($row = mysqli_fetch_assoc($result)) {
                $sql2 = "SELECT * FROM member WHERE PROJ_ID = " . $row['PROJ_ID'];
                $memberCount = mysqli_num_rows(mysqli_query($conn, $sql2));
              ?>
                            <div class="col">
                                <article class="card m-1 rounded-5">
                                    <div class="card-header bg-primary rounded-top-5 d-flex align-items-center">
                                        <a class="col-10 fs-5 text-white fw-bold text-decoration-none" href="#">
                                            <?php echo $row['PROJ_Name'] ?>
                                        </a>
                                        <div class="col-2 text-center">
                                            <div class="dropend">
                                                <button class="btn text-primary text-white dropdown-toggle"
                                                    data-bs-toggle="dropdown"></button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="dashboard-projectdetails.php?projid=<?php echo $row['PROJ_ID'] ?>">More
                                                            details</a>
                                                    </li>
                                                    <hr />
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="dashboard-editproject.php?projid=<?php echo $row['PROJ_ID'] ?>">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger"
                                                            href="dashboard-deleteproject.php?projid=<?php echo $row['PROJ_ID'] ?>">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body overflow-y-auto" style="max-height: 150px">
                                        <span class="d-flex align-items-center">
                                            <span class="material-symbols-outlined me-1">
                                                calendar_month
                                            </span>
                                            <?php echo $row['PROJ_StartDate'] ?> - <?php echo $row['PROJ_EndDate'] ?>
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <span class="material-symbols-outlined me-1">
                                                pin_drop
                                            </span>
                                            <?php echo $row['PROJ_Location'] ?>
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <span class="material-symbols-outlined me-1">
                                                people
                                            </span>
                                            <?php echo $memberCount ?> members
                                        </span>
                                        <span
                                            class="badge rounded-pill <?php echo ($row['PROJ_Status'] == "Ongoing") ? 'bg-info' : 'bg-success'; ?>">
                                            <?php echo $row['PROJ_Status'] ?>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <?php
              }
              ?>
                            <!-- Card standard end -->
                        </div>
                    </div>
                    <!-- Right column (placeholder)-->
                    <div class="bg-light p-3 d-flex flex-column rounded-4 col-3">
                        <h4 class="d-flex align-items-center">
                            <span class="material-symbols-outlined me-1">
                                calendar_today
                            </span>
                            Schedule
                        </h4>
                        <div class="bg-white rounded-pill d-flex justify-content-between p-1 border">
                            <span class="material-symbols-outlined bg-primary rounded-pill text-white">
                                chevron_left
                            </span>
                            <div>May, 2023</div>
                            <span class="material-symbols-outlined bg-primary rounded-pill text-white">
                                chevron_right
                            </span>
                        </div>

                        <div class="bg-white rounded-4 d-flex justify-content-between p-1 border">
                            <span
                                class="material-symbols-outlined border border-primary rounded-pill text-primary d-flex align-items-center">
                                chevron_left
                            </span>
                            <div class="d-flex justify-content-evenly">
                                <div class="d-block text-center mx-2">
                                    <span>Sat</span>
                                    <h5>01</h5>
                                </div>
                                <div class="d-block text-center mx-2 bg-primary text-white px-2 rounded-2">
                                    <span>Sun</span>
                                    <h5>02</h5>
                                </div>
                                <div class="d-block text-center mx-2">
                                    <span>Mon</span>
                                    <h5>03</h5>
                                </div>
                            </div>
                            <span
                                class="material-symbols-outlined border border-primary rounded-pill text-primary d-flex align-items-center">
                                chevron_right
                            </span>
                        </div>

                        <div class="mt-3">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-start-4" placeholder="Search by name" />
                                <button class="btn btn-sm btn-outline-primary rounded-end-4" type="button">
                                    <span class="material-symbols-outlined"> search </span>
                                </button>
                            </div>
                        </div>
                        <hr />
                        <!-- placeholder 2 nav tabs -->
                        <ul class="nav nav-underline align-self-center mb-2">
                            <li class="nav-item">
                                <a class="nav-link active text-primary" href="#">Meetings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Holidays</a>
                            </li>
                        </ul>

                        <div class="bg-primary bg-gradient text-white p-2 rounded-3 mb-2" style="height: 90px">
                            <h6>Meeting with University Student Council</h6>
                            <span class="d-flex align-items-center">
                                <span class="material-symbols-outlined me-1">
                                    calendar_today
                                </span>
                                5/5/2023
                            </span>
                        </div>
                        <div class="bg-primary bg-gradient text-white p-2 rounded-3 mb-2" style="height: 90px">
                            <h6>Meeting with Client regarding event</h6>
                            <span class="d-flex align-items-center">
                                <span class="material-symbols-outlined me-1">
                                    calendar_today
                                </span>
                                7/5/2023
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Bootstrap & Popper scripts -->
    <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
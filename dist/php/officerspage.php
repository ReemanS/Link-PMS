<?php
if(isset($_POST['search']))
{
$s = $_POST['valueToSearch'];
$query = "SELECT * FROM officer WHERE OFF_ID LIKE '%$s%'";
$search_result = filterTable($query);
}
else {
$query = "SELECT * FROM `officer` ORDER BY OFF_ID DESC";
$search_result = filterTable($query);
}
function filterTable($query)
{
include 'session.php';
$filter_Result = mysqli_query($conn, $query);
return $filter_Result;
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
    <div class= "d-flex flex-column col-10">
    <div class= "d-flex justify-content-between">
    <section class="col-12 border p-2">
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
                            Add Officer
                        </a>
          </h5>
        </div>
    </section>
     </div>

  <div class="card-body">
    <div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Officer ID</th>
            <th>Officer Name</th>
            <th>Officer Surname</th>
            <th>Officer Email</th>
            <th>Officer Birthday</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'session.php';
          $display = "SELECT * FROM officer";
          $data = $conn->query($display);
          while($row = mysqli_fetch_array($search_result))
          {
          ?>
          <tr>
            <td><?php echo $row['OFF_ID']?></td>
            <td><?php echo $row['OFF_GivenName']?></td>
            <td><?php echo $row['OFF_Surname']?></td>
            <td><?php echo $row['OFF_EmailAdd']?></td>
            <td><?php echo $row['OFF_DOB']?></td>
            <td><div class="d-flex">
                            <a class="btn rounded-pill btn-sm btn-info d-flex mx-1"
                                href="edit_officer.php?inquiryid=<?php echo $selectedInquiry ?>">
                                <span class="material-symbols-outlined"> edit </span>
                            </a>
                            <a class="btn rounded-pill btn-sm btn-danger d-flex mx-1"
                                href="officerspage_deletecode.php?">
                                <span class="material-symbols-outlined"> delete </span>
                            </a>
                        </div></td>
          </tr>
          <?php
          }?>
        </tbody>
      </table>
    </div>
  </div>
        </div>
  </main>

  
  <!-- Bootstrap & Popper scripts -->
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
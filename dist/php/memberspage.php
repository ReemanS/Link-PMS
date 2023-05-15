
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
  <title>Members</title>
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
          <a href="officerspage.php" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
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
        <img src="../assets/zuc.jpg" alt="link officer" class="img-thumbnail rounded-5 me-2" width="60" height="60" />
        <div id="site-user-info">
          <h6 class="m-0 fw-bold">Mark Zuckerburg</h6>
          <small>LINK.exe officer</small>
        </div>
      </div>
    </aside>
    <aside class="col-2"></aside>

    <!-- Members Dashboard -->
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
            <a href="add_members.php" class="btn btn-primary d-flex">
                            <span class="material-symbols-outlined"> add </span>
                            Add Member
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
          <th>Member ID</th>
          <th>Member Given Name</th>
          <th>Member Surname</th>
          <th>Member Email</th>
          <th>Member Birthday</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'session.php';
        $display = "SELECT * FROM member";
        $data = $conn->query($display);
        while($row = mysqli_fetch_array($data))
        {
        ?>
        <tr>
          <td><?php echo $row['MEM_ID']?></td>
          <td><?php echo $row['MEM_GivenName']?></td>
          <td><?php echo $row['MEM_Surname']?></td>
          <td><?php echo $row['MEM_EmailAdd']?></td>
          <td><?php echo $row['MEM_DOB']?></td>
          <td>
            <div class="d-flex">
            <a class="btn rounded-pill btn-sm btn-info d-flex mx-1"
                                href="memberspage_updatecode.php?memberid=<?php echo $row['MEM_ID'] ?>">
                                <span class="material-symbols-outlined"> edit </span>
                            </a>
              <form action="memberspage_deletecode.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                <input type="hidden" name="MEM_ID" value="<?php echo $row['MEM_ID'] ?>">
                <button type="submit" class="btn rounded-pill btn-sm btn-danger d-flex mx-1">
                  <span class="material-symbols-outlined"> delete </span>
                </button>
              </form>
            </div>
          </td>
        </tr>
        <?php
        }?>
      </tbody>
    </table>
  </div>
  </main>

  <!-- Bootstrap & Popper scripts -->
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
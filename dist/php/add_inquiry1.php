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
                    <a href="inquirypage.html" class="nav-link py-3 rounded-4 d-flex active">
                        <span class="material-symbols-outlined mx-1"> inbox </span>
                        Inquiries
                    </a>
                </li>
                <li class="nav-item">
                    <a href="transactionspage.html" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
                        <span class="material-symbols-outlined mx-1"> receipt_long </span>
                        Transactions
                    </a>
                </li>
                <li class="nav-item">
                    <a href="dashboardpage.html" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
                        <span class="material-symbols-outlined mx-1"> dashboard </span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="officerspage.html" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
                        <span class="material-symbols-outlined mx-1">
                            supervised_user_circle
                        </span>
                        Officers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="memberspage.html" class="inactive-hover-items nav-link py-3 d-flex rounded-4">
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
            <div class="d-flex flex-nowrap">
                <section class="col-6 container p-2 bg-white border rounded">
                    <h5 class="fw-bold">Enter client details</h5>
                    <form action="">
                        <div class="mb-3">
                            <label for="" class="form-label">Given Name</label>
                            <input type="text" name="" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Surname Name</label>
                            <input type="text" name="" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="email" name="" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="" id=" " class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contact Number</label>
                            <input type="tel" name="" id=" " class="form-control" />
                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary d-flex align-items-center">
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
                    <div class="list-group overflow-y-auto" style="max-height: 60vh">
                        <!-- Client list standard -->
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>John Doe</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Dohn Joe</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Mr. Bean</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Mike Michael</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Ralph Recto</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Mr. Bean</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Mike Michael</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Ralph Recto</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Mr. Bean</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Mike Michael</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>Ralph Recto</span>
                            <span class="material-symbols-outlined text-primary">
                                navigate_next
                            </span>
                        </a>
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
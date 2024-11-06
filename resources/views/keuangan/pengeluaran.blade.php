<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/dashboard">Inventory</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('pesanan') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-shop"></i></div>
                            Pesanan
                        </a>
                        <a class="nav-link" href="{{ route('menu') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plate-wheat"></i></div>
                            Menu
                        </a>
                        <a class="nav-link" href="{{ route('stock') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Stok
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-wallet"></i></div>
                            Keuangan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('pemasukan') }}">Pemasukkan</a>
                                <a class="nav-link" href="{{ route('pengeluaran') }}">Pengeluaran</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo htmlspecialchars($_SESSION['email']);
                    } else {
                        echo 'Guest';
                    }
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pengeluaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Pencatatan Pengeluaran</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                Tambah Menu
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2 November 2024</td>
                                        <td>8</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus,
                                            eaque?</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2 November 2024</td>
                                        <td>8</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus,
                                            eaque?</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>2 November 2024</td>
                                        <td>8</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus,
                                            eaque?</td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Edit Menu</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <!-- Modal Body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="">
                                                        <input type="text" name="nama_menu" value=""
                                                            placeholder="Nama Menu" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="deskripsi" value=""
                                                            placeholder="Deskripsi" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="stok" value=""
                                                            placeholder="Stok" class="form-control" required>
                                                        <br>
                                                        <button type="submit" class="btn btn-primary"
                                                            name="update">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Hapus Stok</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <!-- Modal Body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus?
                                                        <input type="hidden" name="id" value="">
                                                        <br><br>
                                                        <button type="submit" class="btn btn-danger"
                                                            name="delete">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>
</body>
<!-- Add Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="jumlah_pengeluaran" placeholder="Jumlah Pengeluaran"
                        class="form-control" required>
                    <br>
                    <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="keluar">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>

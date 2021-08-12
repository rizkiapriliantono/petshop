<?php
session_start();
//koneksi1 database
include '../koneksi1.php';

if (!isset($_SESSION['adm'])){
    echo"<script>location='login_adm.php'</script>";
    header('location=login_adm.php');
    exit();
}
?>
<?php

// mengambil data barang
$data_pelanggan = mysqli_query($koneksi1,"SELECT * FROM pelanggan");
 
// menghitung data barang
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);

//mengambil data produk
$data_produk = mysqli_query($koneksi1,"SELECT * FROM produk");
 
// menghitung data barang
$jumlah_produk = mysqli_num_rows($data_produk);

//mengambil data pembelian
$data_pembelian = mysqli_query($koneksi1,"SELECT * FROM pembelian");
 
// menghitung data barang
$jumlah_pembelian = mysqli_num_rows($data_pembelian);

//mengambil data transaksi sukses
$data_pembelian_sukses = mysqli_query($koneksi1,"SELECT * FROM pembelian WHERE status_pembelian='SUCCESS'");
 
// menghitung data transaksi sukses
$jumlah_pembelian_sukses = mysqli_num_rows($data_pembelian_sukses);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include('sidebar/sidebar.php');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <?php include('topbar.php');?>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Produk Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="produk.php"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Produk</div></a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_produk?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pembelian Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="pembelian.php"><div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                               Pembelian</div></a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pembelian?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transaksi Sukses Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="laporan_pembelian.php"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Transaksi Sukses</div></a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pembelian_sukses?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pelanggan Info Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="pelanggan.php"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pelanggan</div></a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
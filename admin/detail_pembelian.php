<?php include('../koneksi1.php')?>
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
<?php 
    $ambil = $koneksi1->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>
    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include('sidebar/sidebar_pembelian.php');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <?php include('topbar.php');?>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaksi </h1>
</div>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?= $detail['id_pembelian'] ?></td>
            </tr>
            <tr>
                <th>Nama Pembeli</th>
                <td><?php echo $detail['nama_pelanggan']; ?></td>
            </tr>
            <tr>
            <tr>
                <th>Total Transaksi</th>
                <td> Rp. <?php echo number_format ($detail['total_pembelian']); ?></td>
            </tr>
            <tr>
                <th>Alamat Pengiriman</th>
                <td><?php echo $detail['alamat_pengiriman']; ?></td>
            </tr>
            <tr>
            <?php $tanggal = $detail['tanggal_pembelian']?>
                <th>Tanggal Pembelian</th>
                <td><?php echo date('d-m-Y',strtotime($tanggal)); ?></td>
            </tr>
            <tr>
                <th>No Resi</th>
                <td><?php echo $detail['resi_pengiriman'];?></td>
            </tr>
            <tr>
                <th>Pembelian</th>
                <td>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Status Pembelian</th>
                            
                        </tr>
                        <?php $ambil=$koneksi1->query("SELECT * FROM pembelian_produk JOIN produk ON 
                        pembelian_produk.id_produk=produk.id_produk 
                        WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
                        <?php while ($pecah=$ambil->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $pecah['id_produk']?></td>
                                <td><?php echo $pecah['nama']; ?></td>
                                <td><?php echo $detail['status_pembelian']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
<!-- /.container-fluid -->
    <!-- /.container-fluid -->
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
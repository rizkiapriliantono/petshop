<?php include '../koneksi1.php';?>
<?php
$id_pembelian = $_GET['id'];

$ambil = $koneksi1->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
$tanggal = $detail['tanggal'];

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
    <?php include('sidebar/sidebar_produk.php');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <?php include('topbar.php');?>
            <!-- Main Content -->
            <div id="content">

            <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Transaksi</h1>
</div>


<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?php echo $detail['nama']?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $detail['bank']?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp. <?php echo $detail['jumlah']?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo date('d-m-Y',strtotime($tanggal)); ?></td>
                </tr>
            </table>
        </div>
            <div class="col-md-6">
                <img src="../foto_pembayaran/<?php echo $detail['bukti']?>" alt="" class="mr-2" style="width:350px;">
            </div>
    </div>
        <form method="post">
            <div class="form-group">
                <label>No Resi Pengiriman</label>
                <input type="text" class="form-control" name="resi">
            </div> 
            <div class="form-group">
                <label for="transaction_status">Status</label>
                <select class="form-control" name="status">
                    <option value="">
                         Pilih Status Transaksi
                    </option>
                    <option value="SUCCESS">Succes</option>
                    <option value="PENDING">Pending</option>
                    <option value="CANCEL">Cencel</option>
                    <option value="DIKIRIM">Dalam Pengiriman</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="proses">
                Ubah
            </button>
        </form>
        <?php 
        if(isset($_POST['proses']))
        {
            $resi = $_POST['resi'];
            $status = $_POST['status'];
            $koneksi1->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

            echo "<script> alert('Data Telah Diperbarui');</script>";
            echo "<script> location = 'pembelian.php';</script>";
        }

        ?>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->
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


</body>

</html>
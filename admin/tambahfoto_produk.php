<?php include '../koneksi1.php';?>
<?php 
$dat_produk = array();


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

            <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Foto Produk</h1>
</div>

<div class="card shadow">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Produk</label>
                <select class="form-control form-control-sm" name="nama_produk" required>
                    <option>-Pilih Nama Produk-</option>
                    <?php $ambil = $koneksi1->query("SELECT * FROM produk");
                    while($nama_produk = $ambil->fetch_assoc()){?>
                    <option value="<?= $nama_produk['id_produk'];?>">
                        <?= $nama_produk['nama_produk'];?>
                    </option>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            
            <button class="btn btn-primary btn-block" name="simpan">
                Simpan
            </button>
        </form>
        <?php
        if (isset($_POST['simpan'])){
            $nama = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            move_uploaded_file($lokasi,"../foto_produk/".$nama);
            $koneksi1->query("INSERT INTO galeri (id_produk,images)VALUES('$_POST[nama_produk]','$nama')");

            echo "<div class='alert alert-info'>Data Berhasil Disimpan!!!</div>";
            echo "<meta http-equiv='refresh' content='1;url=galeri.php'>";
        }
        ?>
    </div>
</div>
</div>
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

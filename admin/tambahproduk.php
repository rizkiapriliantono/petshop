<?php include '../koneksi1.php';?>
<?php 
$dat_kategori = array();

$kat = $koneksi1->query("SELECT * FROM kategori ORDER BY kategori ASC");
while ($kat_prod = $kat->fetch_assoc())
{
    $dat_kategori[] = $kat_prod;
}
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
    <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
</div>

<div class="card shadow">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control form-control-sm" name="kategori_produk" required>
                    <option>-Pilih Kategori-</option>
                        <?php foreach($dat_kategori as $key => $value):?>
                    <option value="<?= $value['kategori'];?>">
                        <?= $value['kategori'];?>
                    </option>
                        <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" placeholder="Harga" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="10" class="d-block w-100 form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Berat</label>
                <input type="number" class="form-control" name="berat" placeholder="Berat" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" min="1" class="form-control" name="stok_produk" placeholder="Stok" required>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            
            <button class="btn btn-primary btn-block" name="save">
                Simpan
            </button>
        </form>
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
<?php
if (isset($_POST['save'])){
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi,"../foto_produk/".$nama);
    $koneksi1->query("INSERT INTO produk (kat_produk,nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk)VALUES('$_POST[kategori_produk]','$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok_produk]')");

    echo "<div class='alert alert-info'>Data Berhasil Disimpan!!!</div>";
    echo "<meta http-equiv='refresh' content='1;url=produk.php'>";
}
?>
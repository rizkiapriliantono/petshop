<?php include '../koneksi1.php';?>
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
$ambil=$koneksi1->query("SELECT * FROM galeri WHERE id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

//Nama Produk
$dat_produk = array();

$prod = $koneksi1->query("SELECT * FROM produk ORDER BY nama_produk ASC");
while ($nama_produk = $prod->fetch_assoc())
{
    $dat_produk[] = $nama_produk;
}
?>

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
    <h1 class="h3 mb-0 text-gray-800">Edit Foto Produk <?php echo $pecah['id_produk']; ?></h1>
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
                <input type="file" class="form-control" name="foto_produk" required>
            </div>
            
            <button class="btn btn-primary btn-block" name="ubah">
                Simpan
            </button>
        </form>
        <?php
            if (isset($_POST['ubah'])){

                $namafoto=$_FILES['foto_produk']['name'];
                $lokasifoto=$_FILES['foto_produk']['tmp_name'];
                $nama_produk = $_POST['nama_produk'];

                //jika foto dirubah
                if (!empty($nama_produk)) {

                    $koneksi1->query("UPDATE galeri SET id_produk='$_POST[nama_produk]',images='$namafoto'
                    WHERE id='$_GET[id]'");
                }
                else{
                    $koneksi1->query("UPDATE produk SET images='$namafoto' WHERE id='$_GET[id]'");
                }
                echo "<script>alert('Data Produk Telah Diubah');</script>";
                echo "<script>location='galeri.php'</script>";
            }
        ?>
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


</body>

</html>
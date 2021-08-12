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
$ambil=$koneksi1->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

//Kategori Produk
$dat_kategori = array();

$kat = $koneksi1->query("SELECT * FROM kategori");
while ($kat_prod = $kat->fetch_assoc())
{
    $dat_kategori[] = $kat_prod;
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
    <h1 class="h3 mb-0 text-gray-800">Edit Produk <?php echo $pecah['nama_produk']; ?></h1>
</div>

    <div class="card shadow">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <select type="text" class="form-control" name="nama">
                    @foreach ($ambil as $pecah)
                            <option value="<?php echo $pecah['nama_produk'];?>">
                                Jangan Ubah
                            </option>                            
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control form-control-sm" name="kategori" >
                    <option value="">-Pilih Kategori-</option>
                        <?php foreach($dat_kategori as $key => $value):?>
                    <option value="<?= $value['kategori'];?>" <?php if ($pecah["kat_produk"]==$value["kategori"]){ echo "selected"; }?>>
                        <?= $value['kategori'];?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" value="<?= $pecah['harga_produk'];?>">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="5">
                <?=$pecah['deskripsi_produk'];?>
                </textarea>
            </div>
            <div class="form-group">
                <label>Berat</label>
                <input type="number" class="form-control" name="berat" value="<?= $pecah['berat_produk'];?>">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" name="stok_produk" value="<?= $pecah['stok_produk'];?>">
            </div>
            <div class="form-group">
                <label>Ubah Foto Produk</label>
                <input type="file" class="form-control" name="foto" value="<?= $pecah['foto_produk'];?>">
            </div>
            
            <button class="btn btn-primary btn-block" name="ubah">Ubah</button> <br>
        </form>
        <?php
            if (isset($_POST['ubah'])){

                $namafoto=$_FILES['foto']['name'];
                $lokasifoto=$_FILES['foto']['tmp_name'];

                //jika foto dirubah
                if (!empty($lokasifoto)) {
                    move_uploaded_file($lokasifoto, "../admin/assets/foto_produk/$namafoto");

                    $koneksi1->query("UPDATE produk SET kat_produk='$_POST[kategori]',harga_produk='$_POST[harga]', berat_produk='$_POST[berat]',
                    foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok_produk]'
                    WHERE id_produk='$_GET[id]'");
                }
                else{
                    $koneksi1->query("UPDATE produk SET kat_produk='$_POST[kategori]',harga_produk='$_POST[harga]', berat_produk='$_POST[berat]',
                    deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok_produk]' WHERE id_produk='$_GET[id]'");
                }
                echo "<script>alert('Data Produk Telah Diubah');</script>";
                echo "<script>location='produk.php'</script>";
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
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
$ambil=$koneksi1->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include('sidebar/sidebar_pelanggan.php');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <?php include('topbar.php');?>
            <!-- Main Content -->
            <div id="content">

            <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Pelanggan "<?php echo $pecah['nama_pelanggan']; ?>"</h1>
</div>

    <div class="card shadow">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Pelanggan</label>
                <select type="text" class="form-control" name="nama">
                    @foreach ($ambil as $pecah)
                            <option value="<?php echo $pecah['nama_pelanggan'];?>">
                                <p><?php echo $pecah['nama_pelanggan'];?></p>
                            </option>                            
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?= $pecah['email_pelanggan'];?>">
            </div>
            <div class="form-group">
                <label>Telpon</label>
                <input type="number" class="form-control" name="telpon" value="<?= $pecah['telpon_pelanggan'];?>">
            </div>
            
            <button class="btn btn-primary btn-block" name="ubah_data">Ubah</button> <br>
        </form>
        <?php
        if (isset($_POST['ubah_data'])){
            // ubah data
            $nama=$_POST['nama'];
            $email=$_POST['email'];
            $telpon=$_POST['telpon'];

            if (!empty($nama)) {       
                $koneksi1->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]', 
                telpon_pelanggan='$_POST[telpon]' WHERE id_pelanggan='$_GET[id]'");
            }
            else{
                $koneksi1->query("UPDATE pelanggan SET email_pelanggan='$_POST[email]', telpon_pelanggan='$_POST[telpon]' 
                WHERE id_pelanggan='$_GET[id]'");
            }
            echo "<script>alert('Data Pelanggan Telah Di Perbaharui');</script>";
            echo "<script>location='pelanggan.php'</script>";
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
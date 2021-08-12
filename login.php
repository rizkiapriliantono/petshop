<?php 
session_start();
include 'koneksi1.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="shortcut icon" href="assets/images/icon_black.png" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/icon_black.png">
    <link rel="stylesheet" href="assets/css/login/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login/login.css" />
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets\sweetalert2\dist\sweetalert2.all.js"></script>
</head>

<body>
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-xl-10 col-lg-11 mx-auto login-container">
                <div class="row">
                   
                    <div class="col-lg-5 col-md-6 no-padding">
                        <div class="login-box">
                            <h5>Selamat Datang!</h5>
                            <form method="post">
                            <div class="login-row row no-margin">
                                <label for=""><i class="fas fa-envelope"></i> Email Address</label>
                                <input type="text" name="email" class="form-control form-control-sm">
                            </div>

                             <div class="login-row row no-margin">
                                <label for=""><i class="fas fa-unlock-alt"></i> Password</label>
                                <input type="password" name="password" class="form-control form-control-sm">
                            </div> <br>

                             <div class="login-row btnroo row no-margin">
                               <button class="btn btn-primary btn-sm" type="submit" name="login"> Masuk</button>
                            </div>
                            <div class="login-row donroo row no-margin">
                               <p>Belum meiliki akun? <a href="daftar1.php">Daftar Sekarang!</a></p><br>
                               <p> <a href="index.php">Batalkan !</a></p>
                            </div>
                            </form>
                        </div>
                    </div>
                    
                     <div class="col-lg-7 col-md-6 img-box">
                        <img src="assets/images/login.gif" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function berhasil(){
        Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Selamat anda sudah login!',
            animation: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        setTimeout(function(){ 

            window.location.href = "index.php";

        }, 3500);
    }
</script>
<script>
    function gagal(){
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Password atau email anda salah!',
            animation: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }
</script>
    <?php 
// Jika ada tombol login(tombol login ditekan)
if (isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    //lakukan cek query akun ditabel pelanggan di database
    $ambil = $koneksi1->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    //menghitung akun yang terambil
    $akunyangcocok = $ambil->num_rows;

    //jika 1 akun yang cocok maka di loginkan atau dijalankan 
    if ($akunyangcocok==1){
        //anda sukses login
        $akun = $ambil->fetch_assoc();
        //simpan di session pelanggan
        $_SESSION["pelanggan"] = $akun;
        echo '<script type="text/javascript">
        berhasil();
        </script>';
    }
    else{
        //anda gagal login
        echo '<script type="text/javascript">
        gagal();
        </script>';
    }
}

?>

</body>

<script src="assets/js/login/popper.min.js"></script>
<script src="assets/js/login/bootstrap.min.js"></script>


</html>
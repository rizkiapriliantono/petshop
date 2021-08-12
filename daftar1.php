<?php 
include 'koneksi1.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar</title>
    <link rel="shortcut icon" href="assets/images/icon_black.png" type="image/x-icon">
    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/daftar.css">
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets\sweetalert2\dist\sweetalert2.all.js"></script>

</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <center><h2 class="form-title">Daftar</h2></center>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label class="form-control" for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Nama Anda" required/>
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="telepon"><i class="zmdi zmdi-smartphone-android"></i></label>
                                <input type="text" name="telepon" id="telepon" placeholder="Masukan Nomor Telepon" required/>
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email Anda" required />
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="pass" ><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required minlength="6" oninvalid="this.setCustomValidity('Password Minimal 6 Karakter')" oninput="setCustomValidity('')"/>
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Ulangi Password" required/>
                            </div>
                            <div  onClick="" class="form-group form-button">
                                <input type="submit" name="daftar" id="daftar" class="form-submit" value="Daftar"/>
                            </div>
                        </form>
                        <script type="text/javascript">
                            window.onload = function () {
                                document.getElementById("pass").onchange = validatePassword;
                                document.getElementById("re_pass").onchange = validatePassword;
                            }

                            function validatePassword(){
                            var pass2=document.getElementById("re_pass").value;
                            var pass1=document.getElementById("pass").value;
                            if(pass1!=pass2)
                                document.getElementById("re_pass").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                            else
                                document.getElementById("re_pass").setCustomValidity('');
                            }
                        </script>
                        <script>
                            function salah(){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Email sudah terdaftar!',
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
                        <script>
                            function benar(){
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Silahkan Login!',
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

                                    window.location.href = "login.php";

                                }, 3500);
                            }
                        </script>
                        <?php
                        // Jika ada tombol daftar (ditekan tombol daftar)
                        if (isset($_POST["daftar"])){
                            // mengambil isian data 
                            $nama = $_POST["nama"];
                            $telepon = $_POST["telepon"];
                            $email = $_POST["email"];
                            $password = md5($_POST["pass"]);

                            //cek apakah email sudah pernah digunakan
                            $ambil = $koneksi1->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1){
                                echo '<script type="text/javascript">
                                salah();
                                </script>';

                            }
                            else {
                                $koneksi1->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telpon_pelanggan) VALUES ('$email','$password','$nama','$telepon')");
                                echo '<script type="text/javascript">
                                benar();
                                </script>';
                            }
                        }
                        ?>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/images/daftar.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Saya sudah punya akun!</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/maindaftar.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


</html>
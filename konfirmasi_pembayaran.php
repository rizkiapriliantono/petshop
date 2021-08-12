<?php 
session_start();
include 'koneksi1.php';
if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan Login !!!');</script>";
    echo "<script>location='login.php';</script>";
}

//mendapatkan id_pembelian Dari URL
$idpem = $_GET["id"];
$ambil = $koneksi1->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil -> fetch_assoc();

//mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if($id_pelanggan_login !== $id_pelanggan_beli)
{
    echo"<script> alert('Your Page Error!');</script>";
    echo"<script>location='riwayat.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>PetsQu Shop</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon_black.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/icon_black.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<main>
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php">PetsQu Shop</a>
                </div>
                <div class="collapse navbar-collapse" id="custom-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Beranda</a></li>
                            <li><a class="section-scroll" href="about.php">Tentang Kami</a></li>
                            <li><a class="section-scroll" href="penjualan.php">Penjualan</a></li>
                            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Transaksi</a>
                            <ul class="dropdown-menu">
                                <li><a href="keranjang.php">Keranjang</a></li>
                                <li><a href="order.php">Status Pemesanan</a></li>
                            </ul>
                            </li>
                            <?php if (isset($_SESSION["pelanggan"])):  ?>
                            <li><a class="section-scroll" href="logout.php">Logout</a></li>
                            <?php else: ?>
                            <li><a class="section-scroll" href="login.php">Login</a></li>
                            <?php endif ?>
                        </ul>
                </div>
            </div>
        </nav>
    <div class="main">
        <section class="module">
            <div class="container">
                <div class="block">
                  <h2 class="widget-title">Payment Method</h2>
                    <div class="alert alert-info">total tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?> </strong>Bayarkan Ke rekening -------- A/N ------</div>
                    <div class="checkout-product-details">
                        <div class="payment">
                            <div class="card-details">
                            <form  class="checkout-form" method="post" enctype="multipart/form-data">
                                <div class="form-group-konfirmasi">
                                    <label>Nama Penyetor :</label>
                                    <input  type="text" class="form-control" name="nama">
                                </div>
                                <div class="form-group-konfirmasi ">
                                    <select class="form-control" style="align:center" name="bank">
                                    <option value="Bank Mandiri">Bank Mandiri</option>
                                    <option value="Bank Bukopin">Bank Bukopin</option>
                                    <option value="Bank Danamon">Bank Danamon</option>
                                    <option value="Bank Mega">Bank Mega</option>
                                    <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                    <option value="Bank Permata">Bank Permata</option>
                                    <option value="Bank Sinarmas">Bank Sinarmas</option>
                                    <option value="Bank QNB">Bank QNB</option>
                                    <option value="Bank Lippo">Bank Lippo</option>
                                    <option value="Bank UOB">Bank UOB</option>
                                    <option value="Panin Bank">Panin Bank</option>
                                    <option value="Citibank">Citibank</option>
                                    <option value="Bank ANZ">Bank ANZ</option>
                                    <option value="Bank Commonwealth">Bank Commonwealth</option>
                                    <option value="Bank Maybank">Bank Maybank</option>
                                    <option value="Bank Maspion">Bank Maspion</option>
                                    <option value="Bank J Trust">Bank J Trust</option>
                                    <option value="Bank QNB">Bank QNB</option>
                                    <option value="Bank KEB Hana">Bank KEB Hana</option>
                                    <option value="Bank Artha Graha">Bank Artha Graha</option>
                                    <option value="Bank OCBC NISP">Bank OCBC NISP</option>
                                    <option value="Bank MNC">Bank MNC</option>
                                    <option value="Bank DBS">Bank DBS</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BTN">BTN</option>
                                    <option value="Bank DKI">Bank DKI</option>
                                    <option value="Bank BJB">Bank BJB</option>
                                    <option value="Bank BPD DIY">Bank BPD DIY</option>
                                    <option value="Bank Jateng">Bank Jateng</option>
                                    <option value="Bank Jatim">Bank Jatim</option>
                                    <option value="Bank BPD Bali">Bank BPD Bali</option>
                                    <option value="Bank Sumut">Bank Sumut</option>
                                    <option value="Bank Nagari">Bank Nagari</option>
                                    <option value="Bank Riau Kepri">Bank Riau Kepri</option>
                                    <option value="Bank Sumsel Babel">Bank Sumsel Babel</option>
                                    <option value="Bank Lampung">Bank Lampung</option>
                                    <option value="Bank Jambi">Bank Jambi</option>
                                    <option value="Bank Kalbar">Bank Kalbar</option>
                                    <option value="Bank Kalteng">Bank Kalteng</option>
                                    <option value="Bank Kalsel">Bank Kalsel</option>
                                    <option value="Bank Kaltim">Bank Kaltim</option>
                                    <option value="Bank Sulsel">Bank Sulsel</option>
                                    <option value="Bank Sultra">Bank Sultra</option>
                                    <option value="Bank BPD Sulteng">Bank BPD Sulteng</option>
                                    <option value="Bank Sulut">Bank Sulut</option>
                                    <option value="Bank NTB">Bank NTB</option>
                                    <option value="Bank NTT">Bank NTT</option>
                                    <option value="Bank Maluku">Bank Maluku</option>
                                    <option value="Bank Papua">Bank Papua</option>
                                    </select>
                                </div>
                                <div class="form-group-konfirmasi half-width padding-left">
                                    <label>Jumlah Dibayarkan :</label>
                                    <input type="text" class="form-control" id="rupiah" name="jumlah">
                                </div>
                                <div class="form-group-file">
                                    <label>Masukan Bukti Pembayaran :</label>
                                    <input type="file" class="form-control" name="bukti">
                                </div>
                                <button class="btn btn-success btn-block mt-20" name="kirim">Konfirmasi</button> <br>
                                <a href="order.php" class="btn btn-primary mt-5 btn-block " > Batal</a>
                            </form>
                            <?php 
                                if( isset($_POST['kirim']))
                                {
                                    $namabukti = $_FILES['bukti']['name'];
                                    $lokasibukti = $_FILES['bukti']['tmp_name'];
                                    $namafiks = date("YmdHis").$namabukti;
                                    move_uploaded_file($lokasibukti, "foto_pembayaran/$namafiks");

                                    $nama = $_POST['nama'];
                                    $bank = $_POST['bank'];
                                    $jumlah = $_POST['jumlah'];
                                    $tanggal = date("y-m-d");

                                    // Simpan Pembayaran
                                    $koneksi1->query("INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

                                    // Perubahan Status 
                                    $koneksi1->query("UPDATE pembelian SET status_pembelian='SUCCESS' WHERE id_pembelian='$idpem'");
                                    
                                    echo"<script> alert('Pembayaran Sukses!');</script>";
                                    echo"<script>location='order.php';</script>";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </section>
        <footer class="footer-section">
        <div class="container">
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-20">
                        <div class="footer-widget">
                            <div class="footer-logo"> <br> <br>
                                <a href="index.html"><img src="assets/images/logo/logo_white.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p align="justify">PetsQu Shop didirkan tahun 2020, PetsQu Shop merupakan sebuah toko petshop yang menyediakan berbagai macam kebutuh hewan anda termasuk makanan kucing kesayangan anda.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Links</h3>
                            </div>
                            <ul>
                                <li><a href="index.php">Beranda</a></li>
                                <li><a href="about.php">Tentang Kami</a></li>
                                <li><a href="penjualan.php">Penjualan</a></li>
                                <li><a href="keranjang.php">Keranjang</a></li>
                                <li><a href="order.php">Status Pemsanan</a></li>
                                <li><a href="login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Jangan lupa ikuti kami untuk mendapatkan penawaran dan discount spesial dari kami.</p>
                            </div>
                            <script>
                            function salah(){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Email yang anda masukan salah!',
                                    animation: true,
                                    position: 'center',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                                setTimeout(function(){ 

                                window.location.href = "#subscribe";

                                }, 4300);
                            }
                        </script>
                         <script>
                            function benar(){
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Anda Berhasil Mengikut!',
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

                                  window.location.href = "#subscribe";

                                }, 3500);
                            }
                        </script>
                            <div class="subscribe-form" id="subscribe">
                                <form action="" method="POST">
                                <?php 
                                $userEmail = ""; //
                                if(isset($_POST['subscribe'])){
                                  $userEmail = $_POST['email']; //getting user email
                                  if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //Validating User
                                    $subject = "Terima kasih anda telah mengikuti kami - PetsQu Shop";
                                    $message = "Terima kasih anda telah mengikuti kami, tunggu informasi dan potongan harga khusus untuk anda :)";
                                    $sender = "from: PetsQuShop@gmail.com";
                                    if(mail($userEmail, $subject, $message, $sender)){
                                      echo '<script type="text/javascript">
                                    Benar();
                                    </script>';?>
                                    <?php
                                    }else{

                                    }
                                  } else{
                                    
                                    echo '<script type="text/javascript">
                                    salah();
                                    </script>';?>
                                    
                                    <?php
                                  }
                                }
                                ?>
                                    <input type="text" name="email" placeholder="Email Address" require value="<?php echo $userEmail?>">
                                    <button type="submit" name="subscribe"><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2020, All Right Reserved <a href="http://localhost/petshop/">PetsQu Shop</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right text-center">
                    <div class="footer-social-icon">
                                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fab fa-instagram instagram-bg"></i></a>
                                <a href="#"><i class="fab fa-whatsapp whatsapp-bg"></i></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
    </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
</main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
  </body>
</html>
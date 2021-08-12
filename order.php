<?php 
session_start();
include 'koneksi1.php';
if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan Login !!!');</script>";
    echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>PetSQu Shop</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon_black.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
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

<body id="body">
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
      </nav> <br> <br>
<!-- Main Menu Section -->
<section class="page-header">
	<div class="container">
		<div class="row">         
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title-checkout font-alt">Status Pesanan</h1> <br>
              </div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-15">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th style="text-align:center;">Order ID</th>
									<th style="text-align:center;">Date</th>
									<th style="text-align:center;">Items</th>
									<th style="text-align:center;">Total Price</th>
									<th style="text-align:center;">Status</th>
									<th style="text-align:center;">Opsi</th>
								</tr>
							</thead>
							<tbody>
              <?php
                $no = 1;
                //Mendapatkan id_pelanggan yang login dari sesion
                $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
                $ambil = $koneksi1->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                while($pecah = $ambil->fetch_assoc()){?>
								<tr>
									<td><?php echo $no;?></td>
                  <td><?php echo date('d F Y',strtotime($pecah["tanggal_pembelian"]));?></td>
									<td><?php echo $no;?></td>
									<td><?php echo number_format($pecah["total_pembelian"]);?></td>
									<td>
                  <?php if ($pecah['status_pembelian']=="PENDING"):?>
                    <span class="label label-danger"><?php echo $pecah['status_pembelian'];?></span>
                  <?php else :?>
                    <span class="label label-success"><?php echo $pecah['status_pembelian'];?></span>
                  <?php endif ?>
									<td style="text-align:left;">
                    <a href="nota.php?id=<?php echo $pecah['id_pembelian'];?> " class="btn btn-info btn-md">Nota</a>
                    <?php if ($pecah['status_pembelian']=="PENDING"):?>
                        <a href="konfirmasi_pembayaran.php?id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-warning btn-md">Konfirmasi Pembayaran</a>
                    <?php else :?>
                        
                    <?php endif ?>
                  </td>
								</tr>
                <?php $no++;?>
                <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> <br> <br>
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
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
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

  </body>
  </html>
<?php
session_start();
include 'koneksi1.php';
?>
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
    function terkirim(){
        Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Anda Berhasil Mengikut!',
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

        window.location.href = "about.php";

        }, 4300);
    }
</script>
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
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets\sweetalert2\dist\sweetalert2.all.js"></script>
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
        <section class="module bg-dark-60 about-page-header" data-background="assets/images/about.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">PetsQu Shop</h2>
                <div class="module-subtitle font-serif">PetsQu Shop didirkan tahun 2020, PetsQu Shop merupakan sebuah toko petshop yang menyediakan berbagai macam kebutuh hewan anda termasuk makanan kucing kesayangan anda. </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module pt-0 pb-0" id="about">
          <div class="row position-relative m-0">
            <div class="col-xs-12 col-md-6 side-image" data-background="assets/images/about1.jpg"></div>
            <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text">
              <div class="row">
                <div class="col-sm-12">
                  <h2 class="module-title font-alt align-left">Mari Sayangi Hewan Peliharaan Kalian!</h2>
                  <div class="module-subtitle font-serif align-justify">Memelihara hewan peliharaan di rumah tentunya menjadi hobbi tersendiri bagi sejumlah orang. Selain mampu membuat suasana rumah menjadi lebih hidup, memelihara binatang peliharaan di rumah juga mampu membuat rumah lebih aman dan nyaman. Terdapat berbagai macam hewan peliharaan di rumah yang dapat Anda coba untuk dipelihara, mulai dari kucing, hamster, sugar glader, anjing atau puppies, berbagai macam burung seperti merpati, burung nuri, kakak tua dan lain sebagainya.
                  <br> <br> Memelihara hewan peliharaan tentu membutuhkan perhatian khusus dari Anda sebagai sang pemilik, artinya meski cukup “mudah untuk dipelihara” tapi bukan berarti Anda bisa mengabaikannya. Makanan yang cukup, air dan perawatannya layak untuk Anda berikan. Nah berikut ini daftar hewan peliharaaan unik, lucu dan mudah dipelihara di rumah. 
                     </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module bg-dark-60 pt-0 pb-0 parallax-bg testimonial" height="300px" data-background="assets/images/about3.jpg">
          <div class="testimonials-slider pt-140 pb-140">
            <ul class="slides">
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                    <blockquote class="testimonial-text font-alt">Terima Kasih PetsQu Shop dengan adanya website ini kebutuhan hewan peliharaan saya menjadi lebih mudah mendapatkannya.</blockquote>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                        <div class="testimonial-title">Nabil Andra</div>
                        <div class="testimonial-descr">Pemilik Kucing Di Jagakarsa</div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">Saya pikir dengan adanya website ini memudahkan saya dalam membeli berbagai macam kebutuhan hewan peliharaan saya. Terima kasih PetsQu Shop.</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                      <div class="testimonial-caption font-alt">
                        <div class="testimonial-title">Jeremy</div>
                        <div class="testimonial-descr">Pemilik Anjing Di Cilandak</div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">Terima kasih PetsQu Shop telah memberikan perwatan yang terbaik ke pada hewan peliharan saya.</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                          <div class="testimonial-title">Wicaksono</div>
                          <div class="testimonial-descr">Pemilik Kucing Di Depok</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </section>
        <section class="module" id="team">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Jenis Jenis Kucing</h2>
                <div class="module-subtitle font-serif">Mari kita lihat berbagai macam informasi jenis kucing</div>
              </div>
            </div>
            <div class="row">
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/kucing/mancoon.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Maine Coon</h5>
                      <p class="font-serif">Maine Coons adalah kucing terbesar dari semua ras kucing domestik. Sebagian besar Maine Coon dapat memiliki berat hingga 15 kilogram. Mereka sangat kuat, perkasa, dan dapat bertahan dalam iklim yang berat. Bulu Maine Coon sangat tebal tetapi halus. Bulu pada spesies pria umumnya lebih tebal dari wanita.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Kucing Maine Coon</div>
                    <div class="team-role">Kucing</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/kucing/anggora.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Anggora</h5>
                      <p class="font-serif"> Jenis kucing yang satu ini cukup cantik dan bersih. Namun jika Anda berhasrat untuk memelihara kucing yang satu ini, siapkan budget lebih sebab tak sembarang makanan bisa dikonsumsi oleh kucing jenis ini. Perawatan bulunya yang panjang pun juga perlu diperhatikan.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Kucing Anggora</div>
                    <div class="team-role">Kucing</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/kucing/kampung.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Domestik</h5>
                      <p class="font-serif">Kucing kampung biasa disebut juga dengan kucing domestik oleh para pecinta kucing. Meski demikian tidak semua kucing domestik merupakan kucing kampung, mereka merupakan kucing dari jenis Felis Catus. Kucing domestik ialah kucing kecil dari keluarga kucing didalam jenis Felis. </p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Kucing Kampung</div>
                    <div class="team-role">Kucing</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/kucing/himalaya.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Birman</h5>
                      <p class="font-serif">Untuk seekor kucing yang mencolok dan tidak biasa, susah untuk tidak jatuh cinta pada kucing Birman, atau ‘Kucing suci dari Burma’ sebagaimana dikenal di negara asalnya. Kucing ini memiliki sikap yang tenang dan mempunyai mantel bulu bewarna pucat, wajah yang gelap, telinga, ekor dan kaki dengan ‘gloves’ putih disekitar cakarnya.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Kucing Birman</div>
                    <div class="team-role">Kucing</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module parallax-bg" data-background="assets/images/paralax.jpg" style="background-position: 50% 15%; min-height: 400px;">
          <div class="container">
            
          </div>
        </section>
        <!--<section class="module bg-dark-60" data-background="assets/images/tanaman/hutan.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="video-box">
                  <div class="video-box-icon"><a class="video-pop-up" href="https://www.youtube.com/watch?v=f-vshHBFbe8"><span class="icon-video"></span></a></div>
                  <div class="video-title font-alt">Mari Jaga Lingkungan Dengan Menanam Pohon</div>
                  <div class="video-subtitle font-alt">Video By :<a href="https://www.greenpeace.org/indonesia/">  <font color="white"></font>greenpeace indonesia </font></a> </div>
                </div>
              </div>
            </div>
          </div>
        </section>-->
        <div class="main" id="kontak">
        <div class="col-sm-6 col-sm-offset-3"> <br> <br>
            <h2 class="module-title font-alt">Informasi Dan Kontak</h2>
          </div>
        <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.9312067494056!2d106.83971956508628!3d-6.354536915303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec475427cefd%3A0xc4e7eee0f871687!2sUniversitas%20Gunadarma%20Kampus%20E!5e0!3m2!1sen!2sid!4v1608309847519!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
              <div class="col-sm-6">
                <h2 class="module-title font-alt">Hubungi Kami</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <form id="contactForm" role="form" method="post" action="mail/contact.php">
                    <div class="form-group">
                      <label class="sr-only" for="name">Name</label>
                      <input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <label class="sr-only" for="email">Email</label>
                      <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center">
                      <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit</button>
                    </div>
                  </form>
                  <div class="ajax-response font-alt" id="contactFormResponse"></div>
                </div>
              </div>
          </div>
      </div> <br>
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
                                <li><a href="order.php">Status Pemesanan</a></li>
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
                            <div class="subscribe-form" id="subscribe">
                                <form action="" method="POST">
                                <?php 
                                $userEmail = ""; //
                                if(isset($_POST['subscribe'])){
                                  $userEmail = $_POST['email']; //getting user email
                                  if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //Validating User
                                    $subject = "Email Telah Didaftarkan";
                                    $message = "Terima kasih anda telah mengikuti kami, tunggu informasi dan potongan harga khusus untuk anda :)";
                                    $sender = "from: emailtumbal33@gmail.com";
                                    if(mail($userEmail, $subject, $message, $sender)){
                                      echo '<script type="text/javascript">
                                      terkirim();
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
                                <a href="https://web.facebook.com/"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="https://twitter.com/"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="https://www.instagram.com/rizki_apriliantono/"><i class="fab fa-instagram instagram-bg"></i></a>
                                <a href="https://api.whatsapp.com/send?phone=6289656544087"><i class="fab fa-whatsapp whatsapp-bg"></i></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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
  </body>
</html>
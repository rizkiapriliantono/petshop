<?php 
session_start();
include 'koneksi1.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota Pembelian</title>
    <link href="assets/css/nota.css" rel="stylesheet">
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <a href="index.php"><img src="assets/images/logo/logo.png" style="width:100%; max-width:300px;"></a>
                            </td>
<?php 
$ambil = $koneksi1->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
$tanggal = $detail['tanggal_pembelian'];
?>

<!--Jika Pelanggan Yang Beli Tidak Sama Dengan Yang Login, Maka dilarikan ke riwayat-->
<?php
 $idpelbeli = $detail["id_pelanggan"];
 $idpellogin = $_SESSION["pelanggan"] ["id_pelanggan"];
 if($idpelbeli!==$idpellogin){
    echo "<script>alert('Your Page Error!');</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
 } 
?>

                            <td>
                                Invoice #: <?= $detail['id_pembelian'] ?><br>
                                Date: <?php echo date('d-m-Y',strtotime($tanggal)); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                            <strong><?= $detail['nama_kota'];?></strong><br>
                            <?= $detail['alamat_pengiriman'];?><br>
                           <strong>Nomor Resi :</strong><?php echo $detail['resi_pengiriman'];?>
                            </td>
                            
                            <td>
                            <strong><?= $detail['nama_pelanggan'];?></strong><br>
                            <?= $detail['email_pelanggan']; ?><br>
                            <?= $detail['telpon_pelanggan'];?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                   Informasi Pembayaran
                </td>
                
                <td>
                    
                </td>
            </tr>
            <?php $ambil=$koneksi1->query("SELECT * FROM pembayaran WHERE id_pembelian='$_GET[id]'");?> 
            <?php while ($bayar=$ambil->fetch_assoc()) { ?>
            <tr class="item">
                <td>
                    Nama Pengirim
                </td>
                
                <td >
                <?php echo $bayar['nama']?>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Nama Bank
                </td>
                
                <td>
                <?php echo $bayar['bank']?>
                </td>
            </tr>
            <tr class="details">
                <td>
                    Jumlah
                </td>
                
                <td>
                Rp. <?php echo number_format($bayar['jumlah'])?>
                </td>
            </tr>
            <?php }?>
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
        <?php $ambil=$koneksi1->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
        <?php while ($pecah=$ambil->fetch_assoc()) { ?>
            <tr class="item">
                <td>
                    <?php echo $pecah['nama']; ?>
                </td>
                
                <td>
                    Rp. <?php echo number_format ($pecah['harga']); ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Tarif Ongkir
                </td>
                
                <td>
                    Rp. <?= number_format($detail['tarif']);?>
                </td>
            </tr>
            
            <tr class="item ">
                <td>
                    Pajak
                </td>
                
                <td>
                    Rp. <?= number_format($detail['pajak']);?>
                </td>
            </tr>
            
            <tr class="total">
                <td>
                
                </td>
                
                <td>
                   Total: Rp. <?= number_format($detail['total_pembelian']);?>
                </td>
            </tr>
        <?php } ?>
        </table>
        <p><strong> Rekening Toko  : </strong><br>
                    BANK BRI ------- AN. PetsQu Shop <br>
                    BANK BCA ------- AN. PetsQu Shop <br>
                    BANK BNI ------- AN. PetsQu Shop </p>
        <a href="order.php " ><button class="btn btn-lg btn-round btn-d">Kembali </button></a>
    </div>
</body>
</html>
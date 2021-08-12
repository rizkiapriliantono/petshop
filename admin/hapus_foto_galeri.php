<?php
include('../koneksi1.php');
?>
<?php

$ambil = $koneksi1->query("SELECT * FROM galeri WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['images'];
if (file_exists("../foto_produk/$fotoproduk")){
    unlink("../foto_produk/$fotoproduk");
}

$koneksi1->query("DELETE FROM galeri WHERE id='$_GET[id]'");

echo "<script> alert('Foto Berhasil Dihapus!!!'); </script>";
echo "<script> location='galeri.php'; </script>";
?>
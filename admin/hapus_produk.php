<?php
include('../koneksi1.php');
?>
<?php

$ambil = $koneksi1->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk")){
    unlink("../foto_produk/$fotoproduk");
}

$koneksi1->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script> alert('Produk Berhasil Dihapus!!!'); </script>";
echo "<script> location='produk.php'; </script>";
?>
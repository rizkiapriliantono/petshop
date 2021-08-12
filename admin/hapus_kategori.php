<?php
include('../koneksi1.php');
?>
<?php

$ambil = $koneksi1->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


$koneksi1->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

echo "<script> alert('Produk Berhasil Dihapus!!!'); </script>";
echo "<script> location='kategori.php'; </script>";
?>
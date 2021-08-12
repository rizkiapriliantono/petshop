<?php
include('../koneksi1.php')
?>
<?php
$ambil = $koneksi1->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi1->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'");

echo "<script> alert('Produk Berhasil Dihapus!!!'); </script>";
echo "<script> location='pembelian.php'; </script>";
?>
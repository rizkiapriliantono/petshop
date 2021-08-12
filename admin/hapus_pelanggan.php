<?php
include('../koneksi1.php')
?>
<?php
$ambil = $koneksi1->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi1->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script> alert('Pelanggan Berhasil Dihapus!!!'); </script>";
echo "<script> location='pelanggan.php'; </script>";
?>
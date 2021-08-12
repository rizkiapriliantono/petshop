<?php 
session_start();

//menggancurkan $_SESSION["pelanggan"]
session_destroy();


echo "<script>location='index.php';</script>";

?>
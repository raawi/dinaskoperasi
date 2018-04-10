<?php session_start();
include 'library/koneksi.php';
koneksi_buka();
session_destroy();
unset($_SESSION['userid']);
unset($_SESSION['username']);
echo '<script type="text/javascript">window.location = "index.php"; </script>';
?>
<?php
require "library/koneksi.php";
koneksi_buka();


$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='Cek'){
    $kd=$_GET['kd'];
    $sql=mysql_query("select * from kelurahan where nama_kelurahan='$kd'");
    $cek=mysql_num_rows($sql);
    echo $cek;
}
// tutup koneksi ke database mysql
koneksi_tutup();
?>
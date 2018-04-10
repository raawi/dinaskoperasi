<?php
require 'library/koneksi.php';
date_default_timezone_set("Asia/Jakarta"); 
// buat koneksi ke database mysql
koneksi_buka();
if(isset($_POST['hapus'])) {
	$sql=mysql_query("DELETE FROM kecamatan WHERE kd_kecamatan='".$_POST['hapus']."'");
	if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}

#$id_pelanggan	= strtoupper($_POST['id_pelanggan']);
$kd_kecamatan		= strtoupper($_POST['kd_kecamatan']);
$kecamatan		= strtoupper($_POST['kecamatan']);
if($_POST["aksi"]=="Simpan"){
$ck=mysql_query("select * FROM kecamatan WHERE nama_kecamatan='".$kecamatan."'")or die(mysql_error());
$dta=mysql_fetch_array($ck);
$nrow=mysql_num_rows($ck);
if($nrow<=0){
	$sql = mysql_query("INSERT INTO kecamatan (kd_kecamatan,nama_kecamatan)
					VALUES('$kd_kecamatan','$kecamatan')")or die(mysql_error());
	if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}else{
	echo "duplikat_nama";
}}
else if($_POST["aksi"]=="Update"){
	
$sql = mysql_query("UPDATE kecamatan SET 
			nama_kecamatan = '$kecamatan'
			
			WHERE kd_kecamatan = '".$kd_kecamatan."'
			")or die(mysql_error());
if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
// tutup koneksi ke database mysql
koneksi_tutup();
?>

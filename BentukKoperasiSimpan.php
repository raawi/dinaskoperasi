<?php
require 'library/koneksi.php';
date_default_timezone_set("Asia/Jakarta"); 
// buat koneksi ke database mysql
koneksi_buka();
if(isset($_POST['hapus'])) {
	$sql=mysql_query("DELETE FROM bentuk_koperasi WHERE kd_bk='".$_POST['hapus']."'");
	if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}

#$id_pelanggan	= strtoupper($_POST['id_pelanggan']);
$kd_bentuk_koperasi		= strtoupper($_POST['kd_bentuk_koperasi']);
$bentuk_koperasi		= strtoupper($_POST['bentuk_koperasi']);
$kepanjangan			= strtoupper($_POST['kepanjangan']);
if($_POST["aksi"]=="Simpan"){
	
$sql = mysql_query("INSERT INTO bentuk_koperasi (kd_bk,nama_bk,kepanjangan)
					VALUES('$kd_bentuk_koperasi','$bentuk_koperasi','$kepanjangan')")or die(mysql_error());

if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
else if($_POST["aksi"]=="Update"){
	
$sql = mysql_query("UPDATE bentuk_koperasi SET 
			nama_bk = '$bentuk_koperasi',
			kepanjangan = '$kepanjangan'
			
			WHERE kd_bk = '".$kd_bentuk_koperasi."'
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

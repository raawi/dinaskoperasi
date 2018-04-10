<?php
require 'library/koneksi.php'; date_default_timezone_set("Asia/Jakarta"); koneksi_buka();
if(isset($_POST['hapus'])) {
	$sql=mysql_query("DELETE FROM kelurahan WHERE kd_kelurahan='".$_POST['hapus']."'");
	if($sql){     echo "sukses";   }
	else	{  echo "error";  	}
}
$kd_kelurahan		= strtoupper($_POST['kd_kelurahan']);
$kd_kecamatan		= strtoupper($_POST['kd_kecamatan']);
$kelurahan		= strtoupper($_POST['kelurahan']);
if($_POST["aksi"]=="Simpan"){
	$ck=mysql_query("select * FROM kelurahan WHERE nama_kelurahan='".$kelurahan."'")or die(mysql_error());
	$dta=mysql_fetch_array($ck);
	$nrow=mysql_num_rows($ck);
		if($nrow<=0){
			$sql = mysql_query("INSERT INTO kelurahan (kd_kelurahan,nama_kelurahan,kd_kec)
					VALUES('$kd_kelurahan','$kelurahan','$kd_kecamatan')")or die(mysql_error());
			if($sql){
				echo "sukses";
			}else{
				echo "error";
			}
		}else{
			echo "duplikat_nama";
		}
}
else if($_POST["aksi"]=="Update"){
	
$sql = mysql_query("UPDATE kelurahan SET 
			nama_kelurahan = '$kelurahan',
			kd_kec = '$kd_kecamatan'
			WHERE kd_kelurahan = '".$kd_kelurahan."'
			")or die(mysql_error());
if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
koneksi_tutup();
?>

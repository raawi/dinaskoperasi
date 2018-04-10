<?php
require 'koneksi/koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();
if(isset($_POST['hapus'])) {
	$sql=mysql_query("DELETE FROM jabatan WHERE id_jabatan='".$_POST['hapus']."'");
	if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}

	$id_jabatan		= strtoupper($_POST['id_jabatan']);
	$jabatan		= strtoupper($_POST['jabatan']);
if($_POST["aksi"]=="Simpan"){
	
#$sql = mysql_query("insert into biodata(nama,alamat) values('$nama','$alamat')");
$sql = mysql_query("INSERT INTO jabatan (id_jabatan,jabatan)VALUES('$id_jabatan','$jabatan')");

if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
else if($_POST["aksi"]=="Update"){
	
$sql = mysql_query("UPDATE jabatan SET 
			jabatan = '$jabatan'
			
			WHERE id_jabatan = '".$id_jabatan."'
			");
echo "
			";
}else if($_POST["aksi"]=="Delete"){
$sql = mysql_query("delete from jabatan where id_jabatan= '".$_POST['id']."'")or die(mysql_error());
if($sql){echo "suksess";}else{echo "gagal";}
}

// tutup koneksi ke database mysql
koneksi_tutup();
?>

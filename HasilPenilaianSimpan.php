<?php
session_start();
require 'library/koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();
if(isset($_POST['hapus'])) {
	$sql=mysql_query("DELETE FROM skor WHERE kd_penilaian='".$_POST['hapus']."'");
	if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
		include "library/fungsi_terbilang.php";
		include "library/fungsi.php";
		$kd_penilaian=$_POST['kd_penilaian'];
		$kdkop=$_POST['kd_kop'];
		$bk=$_POST['bentuk'];
		$kecamatan=$_POST['kecamatan'];
		$no_penilaian=$_POST['no_penilaian'];
		$thbuku=$_POST['thbuku'];
		$skor=$_POST['skor'];
		$terbilang=ucwords(terbilang($skor));
		$tgl_sekarang=date('Y-m-d');
		$predikat="";
		if($skor>80){ $predikat="SEHAT";}
		elseif($skor>60){ $predikat="CUKUP SEHAT";}
		elseif($skor>40){ $predikat="KURANG SEHAT";}
		elseif($skor>20){ $predikat="TIDAK SEHAT";}
		else{ $predikat="SANGAT TIDAK SEHAT";}
		$kd_penilai=$_SESSION['userid'];
if($_POST["aksi"]=="Simpan"){	
$kodeBaru	= buatKode("skor", "SKR");
#$sql = mysql_query("insert into biodata(nama,alamat) values('$nama','$alamat')");
$sql = mysql_query("INSERT INTO skor (kd_penilaian, no_penilaian, kd_koperasi,  bentuk_koperasi,kecamatan, th_buku, tgl_sekarang, skor,terbilang, predikat,kd_penilai)
						VALUES ('$kodeBaru','$no_penilaian','$kdkop','$bk','$kecamatan','$thbuku','$tgl_sekarang','$skor','$terbilang','$predikat','$kd_penilai')")or die(mysql_error());

if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
else if($_POST["aksi"]=="Update"){
	
$sql = mysql_query("UPDATE skor set skor='$skor', terbilang='$terbilang', predikat='$predikat', kd_penilai='$kd_penilai'
					
					
					WHERE kd_penilaian='".$_POST['kd_penilaian']."'")or die(mysql_error());
	if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
else if($_POST["aksi"]=="Delete"){
$sql = mysql_query("delete from skor where kd_penilaian= '".$_POST['id']."'")or die(mysql_error());
if($sql){echo "suksess";}else{echo "gagal";}
}
// tutup koneksi ke database mysql
koneksi_tutup();
?>

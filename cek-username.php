<?php
include "library/koneksi.php";
koneksi_buka();
$data=mysql_query("select * from penilai");
$op=isset($_GET['op'])?$_GET['op']:null;

if($op=='cek'){
    $username=$_GET['username'];
    $sql=mysql_query("select * from penilai where username='$username'")or die(mysql_error());
    $cek=mysql_num_rows($sql);
    echo $cek;
}
else if($op=='simpan'){
   

$nip=htmlspecialchars($_POST['nip']);
$nama_penilai=htmlspecialchars($_POST['nama_penilai']);
$username=htmlspecialchars($_POST['username']);
$password=htmlspecialchars(md5($_POST['password']));
		$sql  	= "INSERT INTO penilai (nip, nama_penilai, username, password)
						VALUES ('$nip', 
								'$nama_penilai','$username','$password')"or die ("Gagal query".mysql_error());
		$query=mysql_query($sql, $koneksidb) or die ("Gagal query".mysql_error());
		if($query){
			
			echo "sukses";
			echo "<meta http-equiv='refresh' content='0; url=?page=Penilai'>";
		}
		exit;
	
	
}
?>
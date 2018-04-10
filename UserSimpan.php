<?php
require 'library/koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();
if(isset($_POST['hapus'])) {
	$sql=mysql_query("DELETE FROM penilai WHERE nip='".$_POST['hapus']."'");
	if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}

$nip=htmlspecialchars($_POST['nip']);
$nama_penilai=htmlspecialchars($_POST['nama_penilai']);
$username=htmlspecialchars($_POST['username']);
$password=htmlspecialchars(md5($_POST['password']));
if($_POST["aksi"]=="Simpan"){	
#$sql = mysql_query("insert into biodata(nama,alamat) values('$nama','$alamat')");
$sql = mysql_query("INSERT INTO penilai (nip, nama_penilai, username, password)
						VALUES ('$nip', 
								'$nama_penilai','$username','$password')")or die(mysql_error());

if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
else if($_POST["aksi"]=="Update"){
	
$sql = mysql_query("UPDATE penilai SET 
			nama_penilai = '$nama_penilai',
			username = '$username'
			
			WHERE nip = '".$nip."'
			");
echo "
			";
}
else if($_POST["aksi"]=="Delete"){
$sql = mysql_query("delete from supplier where id_supplier= '".$_POST['id']."'")or die(mysql_error());
if($sql){echo "suksess";}else{echo "gagal";}
}
// tutup koneksi ke database mysql
koneksi_tutup();
?>

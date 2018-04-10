<?php
require 'library/koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();
if(isset($_POST['hapus'])) {
	$sql=mysql_query("DELETE FROM data_koperasi WHERE kd_koperasi='".$_POST['hapus']."'");
	if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}

		$kode=$_POST['tkode_kop'];
		$nama_kop=strtoupper($_POST['nama_kop']);
		$bh=$_POST['tnobh'];
		$tglbh=$_POST['ttglbh'];
		$jalan=$_POST['jalan'];
		$kelurahan=$_POST['kelurahan'];
		$kecamatan=$_POST['kecamatan'];
		$telp=$_POST['telp'];
		$bentukkop=$_POST['cmbBentukkop'];
		$nmketua=$_POST['nmketua'];
		$bendahara=$_POST['bendahara'];
		$sekertaris=$_POST['sekertaris'];
		$janggota=$_POST['janggota'];
		$status=$_POST['cmbStatus'];
		$tgl_sekarang=date('d-m-y');
if($_POST["aksi"]=="Simpan"){	
#$sql = mysql_query("insert into biodata(nama,alamat) values('$nama','$alamat')");
$sql = mysql_query("INSERT INTO data_koperasi (kd_koperasi, nama_koperasi, no_bh, tanggal_bh, jalan, kelurahan, kecamatan, telp, bentuk_koperasi, nama_ketua,bendahara,sekertaris,jumlah_anggota, status)
						VALUES ('$kode','$nama_kop','$bh','$tglbh','$jalan','$kelurahan','$kecamatan','$telp','$bentukkop','$nmketua','$bendahara','$sekertaris','$janggota','$status')")or die(mysql_error());

if($sql){
        echo "sukses";
    }else{
        echo "error";
    }
}
else if($_POST["aksi"]=="Update"){
	
$sql = mysql_query("UPDATE data_koperasi set nama_koperasi='$nama_kop', 
					no_bh='$bh', 
					tanggal_bh='$tglbh', 
					jalan='$jalan', 
					kelurahan='$kelurahan', 
					kecamatan='$kecamatan', 
					telp='$telp', 
					bentuk_koperasi='$bentukkop', 
					nama_ketua='$nmketua',
					bendahara='$bendahara',
					sekertaris='$sekertaris',
					jumlah_anggota='$janggota', 
					status='$status' 
					WHERE kd_koperasi='".$_POST['tkode_kop']."'");
echo "";
}
else if($_POST["aksi"]=="Delete"){
$sql = mysql_query("delete from pegawai where id_pegawai= '".$_POST['id']."'")or die(mysql_error());
if($sql){echo "suksess";}else{echo "gagal";}
}
// tutup koneksi ke database mysql
koneksi_tutup();
?>

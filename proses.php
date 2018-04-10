<?php
include "library/koneksi.php";
koneksi_buka();

$op=isset($_GET['op'])?$_GET['op']:null;

if($op=='kd_koperasi'){
	
    echo"<option>Pilih Koperasi</option>";
	$data=mysql_query("select * from data_koperasi");
    while($r=mysql_fetch_array($data)){
	if ($Kode == $r['kd_koperasi']) {
			$cek = "selected";
		} else { $cek=""; }
        echo "<option value='$r[kd_koperasi]' $cek>$r[nama_koperasi]</option>";
    }
	$sqlData ="";
}elseif($op=='barang'){

    echo'<table id="barang" class="table table-hover">
    <thead>
            <tr>
                <Td colspan="5"><div id="menu"><a href="?page=barang&act=tambah" class="btn btn-primary">Tambah Barang</a></div></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Stok</td>
            </tr>
        </thead>';
	while ($b=mysql_fetch_array($data)){
        echo"<tr>
                <td>$b[kode]</td>
                <td>$b[nama]</td>
                <td>$b[hrg_beli]</td>
                <td>$b[hrg_jual]</td>
                <td>$b[stok]</td>
            </tr>";
        }
    echo "</table>";
}elseif($op=='ambildata'){
    $kd_koperasi=$_GET['kd_koperasi'];
    $dt=mysql_query("SELECT data_koperasi.*, bentuk_koperasi.nama_bk , kecamatan.nama_kecamatan FROM data_koperasi
			LEFT JOIN bentuk_koperasi ON data_koperasi.bentuk_koperasi=bentuk_koperasi.kd_bk
			 LEFT JOIN kecamatan ON data_koperasi.kecamatan=kecamatan.kd_kecamatan
			where kd_koperasi='$kd_koperasi'");
    $d=mysql_fetch_array($dt);
    echo $d['kd_koperasi']."|".$d['no_bh']."|".$d['tanggal_bh']."|".$d['nama_bk']."|".$d['jalan']."|".$d['nama_kecamatan'];
}elseif($op=='cek'){
    $kd=$_GET['kd'];
    $sql=mysql_query("select * from tblbarang where kode='$kd'");
    $cek=mysql_num_rows($sql);
    echo $cek;
}elseif($op=='update'){
    $kode=$_GET['kode'];
    $nama=htmlspecialchars($_GET['nama']);
    $beli=htmlspecialchars($_GET['beli']);
    $jual=htmlspecialchars($_GET['jual']);
    $stok=htmlspecialchars($_GET['stok']);
    
    $update=mysql_query("update tblbarang set nama='$nama',
                        hrg_beli='$beli',
                        hrg_jual='$jual',
                        stok='$stok'
                        where kode='$kode'");
    if($update){
        echo "Sukses";
    }else{
        echo "ERROR. . .";
    }
}elseif($op=='delete'){
    $kode=$_GET['kode'];
    $del=mysql_query("delete from tblbarang where kode='$kode'");
    if($del){
        echo "sukses";
    }else{
        echo "ERROR";
    }
}elseif($op=='simpan'){
    $kode=$_GET['kode'];
    $nama=htmlspecialchars($_GET['nama']);
    $jual=htmlspecialchars($_GET['jual']);
    $beli=htmlspecialchars($_GET['beli']);
    $stok=htmlspecialchars($_GET['stok']);
    
    $tambah=mysql_query("insert into tblbarang (kode,nama,hrg_beli,hrg_jual,stok)
                        values ('$kode','$nama','$beli','$jual','$stok')");
    if($tambah){
        echo "sukses";
    }else{
        echo "error";
    }
}
?>
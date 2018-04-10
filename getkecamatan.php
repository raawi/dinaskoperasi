<?php
include_once "library/koneksi.php";

	
#ambil data propinsi
$query = "SELECT * FROM kecamatan ORDER BY nama_kecamatan";
$sql = mysql_query($query);
$arrpropinsi = array();
while ($row = mysql_fetch_assoc($sql)) {
	$arrpropinsi [ $row['kd_kecamatan'] ] = $row['nama_kecamatan'];
}

#action get Kabupaten
if(isset($_GET['action']) && $_GET['action'] == "getKel") {
	$kd_kec = $_GET['kd_kec'];
	
	//ambil data kabupaten
	$query = "SELECT * FROM kelurahan WHERE kd_kec='$kd_kec' ORDER BY nama_kelurahan";
	$sql = mysql_query($query);
	$arrkab = array();
	while ($row = mysql_fetch_assoc($sql)) {
		array_push($arrkab, $row);
	}
	echo json_encode($arrkab);
	exit;}
?>

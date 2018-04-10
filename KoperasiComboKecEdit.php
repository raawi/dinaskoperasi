<?php
mysql_connect("localhost","root","");
mysql_select_db("koperasi");
$kd_kecamatan = $_GET['kd_kecamatan'];
$mrk = mysql_query("SELECT * FROM kelurahan WHERE kd_kec='".$kd_kecamatan."' order by nama_kelurahan");
#echo "<option>-- Silahkan  Merk --</option>";
while($k = mysql_fetch_array($mrk)or die(mysql_error())){
    echo "<option value=\"$k[kd_kelurahan]\">$k[nama_kelurahan]</option>";
}
?>

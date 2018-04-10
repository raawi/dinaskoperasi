<link type="text/css" href="js/calender/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/calender/ui.core.js"></script>
<script type="text/javascript" src="js/calender/ui.datepicker.js"></script>
	 
<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
    </script>
<script>
$(document).ready(function(){
    $("#batal").click(function(){
		$("#form_koperasi").hide();
        $("#data_koperasi").fadeIn(200);
        $(".show-hide").fadeIn(200);
    });
})
</script>
<?php
require "library/koneksi.php";
koneksi_buka();
// tangkap variabel kd_mhs
$kd_koperasi = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan id_pegawai
	$data = mysql_fetch_array(mysql_query(" SELECT data_koperasi.*, bentuk_koperasi.nama_bk, kecamatan.nama_kecamatan, kelurahan.nama_kelurahan FROM data_koperasi
				LEFT JOIN bentuk_koperasi ON data_koperasi.bentuk_koperasi=bentuk_koperasi.kd_bk
				LEFT JOIN kecamatan ON data_koperasi.kecamatan=kecamatan.kd_kecamatan
				LEFT JOIN kelurahan ON data_koperasi.kelurahan=kelurahan.kd_kelurahan WHERE data_koperasi.kd_koperasi='".$kd_koperasi."'")); 
	$dataKode		=	$data['kd_koperasi']; 
	$Dnkop			= 	$data['nama_koperasi'];
	$Dnobh			= 	$data['no_bh'];
	$Dtglbh			= 	$data['tanggal_bh'];
	$Djalan			=	$data['jalan'];
	$Dkecamatan		=	$data['kecamatan'];
	$Dkelurahan		=	$data['kelurahan'];
	$Dtelp			=	$data['telp'];
	$Dnmketua		= 	$data['nama_ketua'];
	$Dbendahara		= 	$data['bendahara'];
	$Dsekertaris	= 	$data['sekertaris'];
	$Djanggota		=	$data['jumlah_anggota'];
	$dataBk			=	$data['bentuk_koperasi'];
	$namaBK			=	$data['nama_bk'];
	$Dkec			=	$data['nama_kecamatan'];
	$Dkel			=	$data['nama_kelurahan'];
	$Dstatus		=	$data['status'];
	
	
?>
<p><form class="" id="form">
<div style="font-size:16px; padding:20px; border:1px solid gray; box-shadow:2px 2px 4px gray; min-height:500px; background:url('images/url.png');
	background-size:10%; background-repeat:no-repeat; background-position:40px 300px; *background-opacity:4;">
<table style="font-size:16px; line-height:35px; padding:20px; *border:1px solid gray; *box-shadow:2px 2px 4px gray;" border="0" width="100%">
		<tr>
			<td valign="top" width="50%">
				<table style=" margin:20px;">
					<tr>
						<td width=";" colspan=2><b><font size="4"><i>IDENTITAS</i></font></b></td>
						</tr>
					<tr>
						<td width="150px">Kode Koperasi</td>
						<td><?php echo $dataKode?></td>
					</tr>
					<tr>
						<td>Nama Koperasi</td>
						<td><?php echo $Dnkop ?></td>
					</tr>
					<tr>
						<td >Bentuk Koperasi</td>
						<td width=""><?php echo $namaBK; ?></td>
					</tr>
					<tr>
						<td width="" colspan=2><b><font size="4"><i>BADAN HUKUM</i></font></b></td>
					</tr>
					<tr>
						<td >No badan Hukum</td>
						<td><?php echo $Dnobh ?></td>
					</tr>
					<tr>
						<td >Tgl badan Hukum</td>
						<td><?php echo $Dtglbh ?>
					</td>
					</tr>
				</table>
			</td>
		
			<td>
				<table style=" margin:20px;">
					<tr>
						<td width="" colspan=2><b><font size="4"><i>ALAMAT</i></font></b></td>
					</tr>
					<tr>
						<td width="120px">Jalan</td>
						<td ><?php echo $Djalan ?></td>
					</tr>
					<tr>
						<td ><label for="propinsi">Kecamatan</label></td>
						<td width=""><?php echo $Dkec ?></td>
					</tr>
					<tr>
						<td ><label for="kabupaten">Kelurahan</label></td>
						<td><?php echo $Dkel ?>
							</td>
					</tr>
					<tr>
						<td>Telp/Fak</td>
						<td><?php echo $Dtelp ?></td>
					</tr>
					<tr>
						<td width="" colspan=2><b><font size="4"><i>PENGURUS</i></font></b></span></td>
					</tr>
					<tr>
						<td >Ketua</span></td>
						<td width=""><?php echo $Dnmketua ?>
						</td>
					</tr>
					<tr>
						<td >Bendahara</span></td>
						<td width=""><?php echo $Dbendahara ?>
						</td>
					</tr>
					<tr>
						<td >Sekertaris</span></td>
						<td width=""><?php echo $Dsekertaris ?>
						</td>
					</tr>
					<tr>
						<td >Jumlah Anggota</td>
						<td ><?php echo $Djanggota ?></td>
					</tr>
					<tr>
						<td>Status Aktif</td>
						<td><?php echo $Dstatus; ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<button type="button" id="batal" class="btn btn-primary"><i class="icon-chevron-left"></i> Kembali</button>
	</div>
	
</form></p>
<?php
koneksi_tutup();
?>
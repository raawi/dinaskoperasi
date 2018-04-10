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
	
	var main= "KoperasiData.php";
	var mainForm= "KoperasiForm.php";
	$("#nama_kop").focus();
    $("#batal").click(function(){
		$("#form_koperasi").hide();
        $("#data_koperasi").fadeIn(200);
        $(".show-hide").fadeIn(200);
    });
	$("#kelurahan2").hide();
	$("#kecamatan").change(function(){
		var kd_kecamatan = $("#kecamatan").val();
		$.ajax({
			url: "KoperasiComboKecEdit.php",
			data: "kd_kecamatan="+kd_kecamatan,
			cache: false,
			success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
				//$("#merk_edit").hide();
				$("#kelurahan").hide();
				$("#kelurahan2").html(msg).show();
			}
		});
	});
    $("#form").submit(function(){
        var data = $("#form").serialize();
		$('#loaderImage').show();
        $.ajax({
            type:"POST",
            data:"aksi=Update&"+data,
            url:"KoperasiSimpan.php",
            success:function(data){
				$("#form_koperasi").hide();
				$(".show-hide").fadeIn(200);
				$("#data_koperasi").show().load(main, function(){ $('#loaderImage').hide(); });
				$("#submit_result").fadeIn();
                return true;
            }
        })
        return false;
    })
})
</script>
<?php
require "library/koneksi.php";
koneksi_buka();
// tangkap variabel kd_mhs
$kd_koperasi = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan id_pegawai
	$data = mysql_fetch_array(mysql_query("SELECT * FROM data_koperasi WHERE kd_koperasi='".$kd_koperasi."'")); 
	$dataKode		=$data['kd_koperasi']; 
	$Dnkop			= isset($_POST['nama_kop']) ? $_POST['nama_kop'] : $data['nama_koperasi'];
	$Dnobh			= isset($_POST['tnobh']) ? $_POST['tnobh'] : $data['no_bh'];
	$Dtglbh			= isset($_POST['ttglbh']) ? $_POST['ttglbh'] : $data['tanggal_bh'];
	$Djalan			= isset($_POST['jalan']) ? $_POST['jalan'] : $data['jalan'];
	$Dkecamatan		= isset($_POST['kecamatan']) ? $_POST['kecamatan'] : $data['kecamatan'];
	$Dkelurahan		=isset($_POST['kelurahan']) ? $_POST['kelurahan'] : $data['kelurahan'];
	$Dtelp			=isset($_POST['telp']) ? $_POST['telp'] : $data['telp'];
	$Dnmketua		= isset($_POST['nmketua']) ? $_POST['nmketua'] : $data['nama_ketua'];
	$Dbendahara		= isset($_POST['bendahara']) ? $_POST['bendahara'] : $data['bendahara'];
	$Dsekertaris		= isset($_POST['sekertaris']) ? $_POST['sekertaris'] : $data['sekertaris'];
	$Djanggota		=isset($_POST['janggota']) ? $_POST['janggota'] : $data['jumlah_anggota'];
	$dataBk			=isset($_POST['cmbBentukkop']) ? $_POST['cmbBentukkop'] : $data['bentuk_koperasi'];
	$Dstatus		=isset($_POST['cmbStatus']) ? $_POST['cmbStatus'] : $data['status'];
	
	
?>
<p><form class="" id="form">
<table>
		<tr>
			<td valign="top" width="54%">
				<table>
					<tr>
						<td width=";" colspan=2><b><font size="4"><i>Identitas</i></font></b></td>
						</tr>
					<tr>
						<td width="150px">Kode Koperasi</td>
						<td><input class="kode-kop" value="<?php echo $dataKode?>"type="text" name="tkode_kop" size="25
						" readonly></td>
					</tr>
					<tr>
						<td>Nama Koperasi</td>
						<td><input type="text" name="nama_kop" id="nama_kop" size="50"  value="<?php echo $Dnkop ?>" placeholder="Nama Koperasi" class="input-xlarge" required="required"></td>
					</tr>
					<tr>
						<td >Bentuk Koperasi</td>
						<td width=""><select name="cmbBentukkop" class="input-xlarge" required="required">
								<option value="">Pilih</option>
								<?php
								$dataSql = "SELECT * FROM bentuk_koperasi ORDER BY kd_bk";
								$dataQry = mysql_query($dataSql) or die ("Gagal Query".mysql_error());
								while ($dataRow = mysql_fetch_array($dataQry)) {
								if ($dataBk == $dataRow['kd_bk']) {
								$cek = "selected";
								} else { $cek=""; }
								echo "<option value='$dataRow[kd_bk]' $cek>$dataRow[nama_bk]</option>";
								}
								$sqlData ="";
								?>
								</select></td>
					</tr>
					<tr>
						<td width="" colspan=2><b><font size="4"><i>Badan Hukum</i></font></b></td>
					</tr>
					<tr>
						<td >No badan Hukum</td>
						<td><input type="text" name="tnobh" size="50" value="<?php echo $Dnobh ?>" placeholder="No Badan Hukum" class="input-xlarge" required="required"></td>
					</tr>
					<tr>
						<td >Tgl badan Hukum</td>
						<td><input type="text" name="ttglbh" id="tanggal"  value="<?php echo $Dtglbh ?>"  size="50" placeholder="Tanggal Badan Hukum" class="input-xlarge" required="required">
					</td>
					</tr>
				</table>
			</td>
		
			<td>
				<table>
					<tr>
						<td width="" colspan=2><b><font size="4"><i>Alamat</i></font></b></td>
					</tr>
					<tr>
						<td width="120px">Jalan</td>
						<td ><input type="text" name="jalan" size="50" value="<?php echo $Djalan ?>" placeholder="Jalan" class="input-xlarge" required="required"></td>
					</tr>
					<tr>
						<td ><label for="propinsi">Kecamatan</label></td>
						<td width=""><select name="kecamatan" id="kecamatan" class="input-xlarge" required="required">
								<?php
								$kecamatan = mysql_query("SELECT * FROM kecamatan ORDER BY nama_kecamatan");
								while($dt=mysql_fetch_array($kecamatan)){
								if ($Dkecamatan == $dt['kd_kecamatan']) {
								$cek = "selected";
								} else { $cek=""; }
								echo "<option value='$dt[kd_kecamatan]' $cek>$dt[nama_kecamatan]</option>\n";
					}
				?>
						</select></td>
					</tr>
					<tr>
						<td ><label for="kabupaten">Kelurahan</label></td>
						<td><select id="kelurahan" name="kelurahan" value="" style="width:327px;" required="required">
								<?php
								$kelurahann = mysql_query("SELECT * FROM Kelurahan WHERE kd_kec='".$Dkecamatan."' ORDER BY nama_kelurahan");
								while($dt=mysql_fetch_array($kelurahann)){
									if ($Dkelurahan == $dt['kd_kelurahan']) {
										$cek = "selected";
									} else { $cek=""; }
								echo "<option value='$dt[kd_kelurahan]' $cek>$dt[nama_kelurahan]</option>\n";
								}
					
								?>
							</select>
							
							<select name="kelurahan" id="kelurahan2" >
							</select>
							</td>
					</tr>
					<tr>
						<td>Telp/Fak</td>
						<td><input type="text" name="telp" id="telp" size="50"  value="<?php echo $Dtelp ?>" placeholder="Telp/Fax" class="required"></td>
					</tr>
					<tr>
						<td width="" colspan=2><b><font size="4"><i>Pengurus</i></font></b></span></td>
					</tr>
					<tr>
						<td >Ketua</span></td>
						<td width=""><input type="text" name="nmketua" id="nmketua" size="50" value="<?php echo $Dnmketua ?>" placeholder="Nama Ketua" class="input-xlarge" required="required">
						</td>
					</tr>
					<tr>
						<td >Bendahara</span></td>
						<td width=""><input type="text" name="bendahara" id="bendahara" size="50" value="<?php echo $Dbendahara ?>" placeholder="Bendahara" class="input-xlarge" required="required">
						</td>
					</tr>
					<tr>
						<td >Sekertaris</span></td>
						<td width=""><input type="text" name="sekertaris" id="sekertaris" size="50" value="<?php echo $Dsekertaris ?>" placeholder="Sekertaris" class="input-xlarge" required="required">
						</td>
					</tr>
					<tr>
						<td >Jumlah Anggota</td>
						<td ><input type="text" name="janggota" id="janggota" size="50" value="<?php echo $Djanggota ?>" placeholder="Jumlah Anggota" class="input-small" required="required"></td>
					</tr>
					<tr>
						<td>Status Aktif</td>
						<td><b><select name="cmbStatus" id="cmbStatus" class="required">
								<option value="">Status</option>
								<?php
								$pilihan	= array("Aktif", "Tidak");
								foreach ($pilihan as $nilai) {
								if ($Dstatus==$nilai) {
								$cek=" selected";
								} else { $cek = ""; }
								echo "<option value='$nilai' $cek>$nilai</option>";
									}
									?>
							</select>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><div><input type="submit" class="btn btn-primary" name="simpan" id="simpan" value="Simpan" />
						<input type="button" id="batal" value="Batal" class="btn btn-danger"/>
						</div></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form></p>
<?php
koneksi_tutup();
?>
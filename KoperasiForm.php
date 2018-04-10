<link type="text/css" href="js/calender/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/calender/ui.core.js"></script>
<script type="text/javascript" src="js/calender/ui.datepicker.js"></script>	
<script>
$(document).ready(function(){
	var main = "KoperasiData.php";
	var mainForm = "KoperasiForm.php";
	
	$("#nama_kop").focus();
    $("#batal").click(function(){
		$("#form_koperasi").hide();
        $("#data_koperasi").fadeIn(200);
        $(".show-hide").fadeIn(200);
    })
	$(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  $("#kecamatan").change(function(){
		var kd_kecamatan = $("#kecamatan").val();
		$.ajax({
        url: "KoperasiComboKecamatan.php",
        data: "kd_kecamatan="+kd_kecamatan,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kelurahan").html(msg);
		}
		});
		});
    $("#form").submit(function(){
        var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Simpan&"+data,
            url:"KoperasiSimpan.php",
            success:function(data){
			$('#loaderImage').show();
			if(data=="sukses"){
				$("#form_koperasi").hide();
				$(".show-hide").fadeIn(200);
				$("#data_koperasi").show().load(main, function(){ $('#loaderImage').hide(); });
				$("#submit_result").fadeIn();
            }else{
				$('#loaderImage').hide();
				$("#status").html(data);
			}    
                
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
	include "fungsi.php";
	$kd_koperasi			= buatKode("data_koperasi", "KOP-");
	
	include_once "library/koneksi.php";
	#ambil data propinsi
	$query = "SELECT * FROM kecamatan ORDER BY nama_kecamatan";
	$sql = mysql_query($query);
	$arrpropinsi = array();
	while ($row = mysql_fetch_assoc($sql)) {
	$arrpropinsi [ $row['kd_kecamatan'] ] = $row['nama_kecamatan'];
	}

?>
<div id="status"></div>

<p><form class="" id="form">
	<table>
		<tr>
			<td valign="top" width="50%">
				<table>
					<tr>
						<td width=";" colspan=2><b><font size="4"><i>Identitas</i></font></b></td>
						</tr>
					<tr>
						<td width="150px">Kode Koperasi</td>
						<td><input class="kode-kop input-medium" value="<?php echo $kd_koperasi?>"type="text" name="tkode_kop" size="25
						" readonly></td>
					</tr>
					<tr>
						<td>Nama Koperasi</td>
						<td><input type="text" name="nama_kop" id="nama_kop" size="50" placeholder="Nama Koperasi" class="input-xlarge" required="required"></td>
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
						<td><input type="text" name="tnobh" size="50" placeholder="No Badan Hukum" class="input-xlarge"  required="required"></td>
					</tr>
					<tr>
						<td >Tgl badan Hukum</td>
						<td><input type="text" name="ttglbh" id="tanggal" size="50" placeholder="Tanggal Badan Hukum" class="input-xlarge" required="required">
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
						<td>Jalan</td>
						<td ><input type="text" name="jalan" size="50" placeholder="Jalan" class="input-xlarge" required="required"></td>
					</tr>
					<tr>
						<td ><label for="propinsi">Kecamatan</label></td>
						<td width=""><select name="kecamatan" id="kecamatan" class="input-xlarge" required="required">
								<option value="">PILIH KECAMATAN</option>
								<?php
								foreach ($arrpropinsi as $nama_kecamatan=>$kd_kecamatan) {
								if ($Dkecamatan==$nama_kecamatan) {
									$cek=" selected";
									} else { $cek = ""; }
								echo "<option value='$nama_kecamatan'  $cek>$kd_kecamatan</option>";
								}
								?>
						</select></td>
					</tr>
					<tr>
						<td ><label for="kabupaten">Kelurahan</label></td>
						<td><select id="kelurahan" name="kelurahan" value="" style="width:327px;" class="input-xlarge" required="required">
								<option value="">PILIH KELURAHAN</option>
							</select></td>
					</tr>
					<tr>
						<td>Telp/Fak</td>
						<td><input type="text" name="telp" id="telp" size="50" placeholder="Telp/Fax" class="required" required="required"></td>
					</tr>
					<tr>
						<td width="" colspan=2><b><font size="4"><i>Pengurus</i></font></b></span></td>
					</tr>
					<tr>
						<td >Ketua</span></td>
						<td width=""><input type="text" name="nmketua" id="nmketua" size="50" placeholder="Ketua"  required="required">
						</td>
					</tr>
					<tr>
						<td >Bendahara</span></td>
						<td width=""><input type="text" name="bendahara" id="bendahara" size="50" placeholder="bendahara"  required="required">
						</td>
					</tr>
					<tr>
						<td >Sekertaris</span></td>
						<td width=""><input type="text" name="sekertaris" id="sekertaris" size="50" placeholder="Sekertaris"  required="required">
						</td>
					</tr>
					<tr>
						<td >Jumlah Anggota</td>
						<td ><input type="text" name="janggota" id="janggota" size="50" placeholder="Jumlah Anggota" required="required"></td>
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
						<td> 
						<input type="submit" id="simpan" class="btn btn-success" value="Simpan">
						<input type="button" id="batal" value="Batal" class="btn btn-danger"/>
						</td>
					</tr>
				</table>
				</td>
				</tr>
				</table>
	
</form></p>
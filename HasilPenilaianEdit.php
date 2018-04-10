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
	
	var main= "HasilPenilaianData.php";
	var mainForm= "HasilPenilaianForm.php";
	$("#nama_kop").focus();
    $("#batal").click(function(){
		$("#form_hasil_penilaian").hide();
        $("#data_hasil_penilaian").fadeIn(200);
        $(".show-hide").fadeIn(200);
    });
    $("#form").submit(function(){
        var data = $("#form").serialize();
		$('#loaderImage').show();
        $.ajax({
            type:"POST",
            data:"aksi=Update&"+data,
            url:"HasilPenilaianSimpan.php",
            success:function(data){
			if(data=="sukses"){
				$("#form_hasil_penilaian").hide();
				$(".show-hide").fadeIn(200);
				$("#data_hasil_penilaian").show().load(main, function(){ $('#loaderImage').hide(); });
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
<style type="text/css">
.box-penilaian{width:49.8%; float:left; border:0px solid #d4d3d8; border-right:0px solid #d4d3d8;}
</style>
<?php
require "library/koneksi.php";
koneksi_buka();
// tangkap variabel kd_mhs
	$kd_penilaians = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan id_pegawai
	$data = mysql_fetch_array(mysql_query("SELECT skor.*, data_koperasi.nama_koperasi, data_koperasi.no_bh, data_koperasi.tanggal_bh, data_koperasi.jalan
	, data_koperasi.kecamatan
			
			FROM skor
			LEFT JOIN data_koperasi ON skor.kd_koperasi=data_koperasi.kd_koperasi WHERE skor.kd_penilaian='".$kd_penilaians."'")); 
	$kd_penilaian		=$data['kd_penilaian']; 
	$kd_koperasi		=$data['kd_koperasi']; 
	$nama_koperasi		=$data['nama_koperasi']; 
	$no_bh		=$data['no_bh']; 
	$tanggal_bh		=$data['tanggal_bh']; 
	$jalan		=$data['jalan']; 
	$no_penilaian		=$data['no_penilaian']; 
	$bentuk_koperasi		=$data['bentuk_koperasi']; 
	$kecamatan		=$data['kecamatan']; 
	$th_buku		=$data['th_buku']; 
	$tgl_sekarang		=$data['tgl_sekarang']; 
	$skor		=$data['skor']; 
	
	
	
?>
<div id="status"></div>
<p><form class="" id="form">
<div class="box-penilaian">
<table class="tbl_kec"  cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="170px"></td>
			<td><input  type="hidden" name="kd_penilaian" value="<?php echo $kd_penilaian; ?>" size="
			"></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Kode Koperasi</span></td>
		<td><input  type="text" name="kd_kop" id="kd_kop"  class="input-xlarge"  value="<?php echo $kd_koperasi; ?>" readonly></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">No Badan Hukum</span></td>
		<td><input  type="text" name="nobh" id="nobh"  class="input-xlarge" value="<?php echo $no_bh; ?>" readonly></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Tanggal Hukum</span></td>
		<td><input  type="text" name="tglbh" id="tglbh"  class="input-xlarge" value="<?php echo $tanggal_bh; ?>" readonly></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Bentuk Koperasi</span></td>
		<td><input  type="text" name="bentuk" id="bentuk" value="<?php echo $bentuk_koperasi; ?>" class="input-xlarge" readonly></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Alamat</span></td>
		<td><textarea name="alamat" id="alamat"  class="input-xlarge" readonly cols="40" rows="5"><?php echo $jalan; ?></textarea></td>
	</tr>
</table>
</div>
<div class="box-penilaian"style="border-right:none;">
<table class="tbl_kec"  cellpadding="0" cellspacing="0" border="0">
		
	<tr>
		<td width="170px"><span class="padding_form" >Kecamatan</span></td>
		<td><input  type="text" name="kecamatan" class="input-xlarge" id="kecamatan"  value="<?php echo $kecamatan; ?>"readonly></td>
	</tr>
		<tr>
			<td><span class="padding_form">Tahun Buku</span></td>
			<td><input style="background-color:#dedede" type="text" name="thbuku" value="<?php echo $th_buku;?>" size="15" readonly>
			</td>
		</tr>
		<tr>
			<td><span class="padding_form">No Penilaian</span></td>
			<td><input  type="text" name="no_penilaian" value="<?php echo $no_penilaian; ?>" readonly size="15">
			</td>
		</tr>
		
		<tr>
			<td><span class="padding_form">Skor</span></td>
			<td><input class="input_text" type="text" name="skor" id="skor" value="<?php echo $skor; ?>" size="15"> </td>
		</tr>
		
		<tr>
			<td width="">&nbsp;</td>
			<td><input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
			<input class="btn btn-danger" type="reset" name="batal" id="batal" value="Batal"></td>
		</tr>
	
		
		<tr>
			<td width="170px"><span class="padding_form" >&nbsp;</span></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	</div>
</form></p><div class="clear"></div>
<?php
koneksi_tutup();
?>
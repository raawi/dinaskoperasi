<link type="text/css" href="js/calender/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/calender/ui.core.js"></script>
<script type="text/javascript" src="js/calender/ui.datepicker.js"></script>	
<script>
$(document).ready(function(){
	var main = "HasilPenilaianData.php";
	var mainForm = "hasilPenilaianForm.php";
	
	
    $("#batal").click(function(){
		$("#form_hasil_penilaian").hide();
        $("#data_hasil_penilaian").fadeIn(200);
        $(".show-hide").fadeIn(200);
    })
	$(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	   var kd_koperasi;
       var nobh;
       var tglbh;
       var bentuk;
       var alamat;
       var kecamatan;
       $(function(){
		$("#kd_koperasi").load("proses.php","op=kd_koperasi");
		$("#kd_koperasi").change(function(){
			kd_koperasi=$("#kd_koperasi").val();
            //tampilkan status loading dan animasinya
            $("#status").html("loading. . .");
            $("#loading").show();
            //lakukan pengiriman data
				$.ajax({
					url:"proses.php",
					data:"op=ambildata&kd_koperasi="+kd_koperasi,
					cache:false,
					success:function(msg){
						data=msg.split("|");
						//masukan isi data ke masing - masing field
						$("#kd_kop").val(data[0]);
						$("#nobh").val(data[1]);
						$("#tglbh").val(data[2]);
						$("#bentuk").val(data[3]);
						$("#alamat").val(data[4]);
						$("#kecamatan").val(data[5]);
                        
                         //hilangkan status animasi dan loading
						$("#status").html("");
						$("#loading").hide();
						$("#skor").focus();
					}
				});
			});
		});
	  
    $("#form").submit(function(){
        var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Simpan&"+data,
            url:"HasilPenilaianSimpan.php",
            success:function(data){
			$('#loaderImage').show();
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
	include "library/fungsi_terbilang.php";
	include "library/fungsi.php";
	
	$dataKode			= buatKode("skor", "SKR");
	$dcmbkop			= isset($_POST['cmbkop']) ? $_POST['cmbkop'] : '';
	$dkdkop				= isset($_POST['kd_kop']) ? $_POST['kd_kop'] : '';
	$dnobh				= isset($_POST['nobh']) ? $_POST['nobh'] : '';
	$dtglbh				= isset($_POST['tglbh']) ? $_POST['tglbh'] : '';
	$dbentuk				= isset($_POST['bentuk']) ? $_POST['bentuk'] : '';
	$dalamat				= isset($_POST['alamat']) ? $_POST['alamat'] : '';
	$dkecamatan				= isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';
	$dno_penilaian		= substr($dataKode,4,3);
	$dthbuku			= isset($_POST['thbuku']) ? $_POST['thbuku'] : '';
	$dskor				= isset($_POST['skor']) ? $_POST['skor'] : '';
	$dterbilang			= isset($_POST['terbilang']) ? $_POST['terbilang'] : '';

?>
<div id="status"></div>

<p><form class="" id="form">
	<div class="box-penilaian">
<table class="tbl_kec"  cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="170px"></td>
			<td><input  type="hidden" name="kd_penilaian" value="<?php echo $dataKode; ?>" size="
			"></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Pilih Koperasi</span></td>
		<td><select name="cmbkop" id="kd_koperasi" class="input-xlarge"></select></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Kode Koperasi</span></td>
		<td><input  type="text" name="kd_kop" id="kd_kop"  class="input-xlarge"  value="<?php echo $dkdkop; ?>" readonly></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">No Badan Hukum</span></td>
		<td><input  type="text" name="nobh" id="nobh"  class="input-xlarge" value="<?php echo $dnobh; ?>" readonly></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Tanggal Hukum</span></td>
		<td><input  type="text" name="tglbh" id="tglbh"  class="input-xlarge" value="<?php echo $dtglbh; ?>" readonly></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Bentuk Koperasi</span></td>
		<td><input  type="text" name="bentuk" id="bentuk"  class="input-xlarge" readonly></td>
	</tr>
	<tr>
		<td width="170px"><span class="padding_form">Alamat</span></td>
		<td><textarea name="alamat" id="alamat"  class="input-xlarge" readonly cols="40" rows="5"><?php echo $dalamat; ?></textarea></td>
	</tr>
</table>
</div>
<div class="box-penilaian"style="border-right:none;">
<table class="tbl_kec"  cellpadding="0" cellspacing="0" border="0">
		
	<tr>
		<td width="170px"><span class="padding_form" >Kecamatan</span></td>
		<td><input  type="text" name="kecamatan" class="input-xlarge" id="kecamatan"  value="<?php echo $dkecamatan; ?>"readonly></td>
	</tr>
		<tr>
		<?php $th=date('Y')-1;?>
			<td><span class="padding_form">Tahun Buku</span></td>
			<td><input style="background-color:#dedede" type="text" name="thbuku" value="<?php echo $th;?>" size="15" readonly>
			</td>
		</tr>
		<tr>
			<td><span class="padding_form">No Penilaian</span></td>
			<td><input  type="text" name="no_penilaian" value="<?php echo $dno_penilaian; ?>" size="15">
			<span class="peringatan"><?php if (isset($error_no_penilaian)){ echo "isi no penilaian dulu";}; ?></span></td>
		</tr>
		
		<tr>
			<td><span class="padding_form">Skor</span></td>
			<td><input class="input_text" type="number" max="100" min="10" name="skor" id="skor" value="<?php echo $dskor; ?>" size="15"> </td>
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
	
	
</form></p><div class="clear">
	</div>
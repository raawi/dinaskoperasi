<script>
$(document).ready(function(){
	var main = "KelurahanData.php";
	var mainForm = "KelurahanForm.php";
	$("#kelurahan").focus();
    $("#batal").click(function(){
       $("#form_kelurahan").hide();
       $("#data_kelurahan").fadeIn(200);
       
        //$("#form_kelurahan").load(mainForm , function(){ $('#loaderImage').hide(); });
    })
    $("#form").submit(function(){
		 var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Update&"+data,
            url:"KelurahanSimpan.php",
            success:function(data){
			$('#loaderImage').show();
			if(data=="sukses"){
				$('#loaderImage').show();
				//$("#batal").click();
				$("#form_kelurahan").hide();
				$(".show-hide").fadeIn(200);
				$("#data_kelurahan").show().load(main, function(){ $('#loaderImage').hide(); });
				$("#submit_result").fadeIn();
			}
			else{
				$('#loaderImage').hide();
                 $("#status").html(data);
            }
                //alert(data);
				
               // $("#refresh").click();
                
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
	$kd_kel = $_POST['id'];
	$data = mysql_fetch_array(mysql_query("SELECT * FROM kelurahan WHERE kd_kelurahan='".$kd_kel."'")); 
	$kd_kelurahan = $data['kd_kelurahan'];
	$nama_kelurahan = $data['nama_kelurahan'];
	$kd_kecamatan = $data['kd_kec'];
?>
<div id="status"  style="color:#C0392B;"></div>

<p><form class="form-horizontal" id="form">
	<label>Kode Kelurahan <?php echo $kd_kelurahan ?></label>
	<input type="text" id="kd_kelurahan" class="input-xlarge" name="kd_kelurahan" readonly value="<?php echo $kd_kelurahan ?>" required="required">
	<label>Nama Kelurahan</label>
	<input type="text" id="kelurahan" class="input-xlarge" name="kelurahan" value="<?php echo $nama_kelurahan ?>" required="required"><span id="pesan"></span>
	<label>Kecamatan</label>
	<select id="kd_kecamatan" class="input-xlarge" name="kd_kecamatan" required="required">
		<option value="">--Pilih Kecamatan--</option>
		<?php
								$kecamatan = mysql_query("SELECT * FROM kecamatan ORDER BY nama_kecamatan");
								while($dt=mysql_fetch_array($kecamatan)){
								if ($kd_kecamatan == $dt['kd_kecamatan']) {
								$cek = "selected";
								} else { $cek=""; }
								echo "<option value='$dt[kd_kecamatan]' $cek>$dt[nama_kecamatan]</option>\n";
					}
				?>
	</select>	<div style="margin-top:8px;">
	<input type="submit" id="simpan" class="btn btn-success" value="Simpan">
				<input type="reset" id="batal" value="Batal" class="btn btn-danger"/>
	</div>
	
	
	<div class="clear"></div>
</form></p>
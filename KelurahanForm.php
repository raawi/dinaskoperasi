
<script>
$(document).ready(function(){
	var main = "KelurahanData.php";			var mainForm = "KelurahanForm.php";
	$("#kelurahan").focus();
    $("#batal").click(function(){
        $("#form_kelurahan").hide();
        $(".btn-toolbar").fadeIn(200);
        $("#data_kelurahan").fadeIn(200);
        $(".show-hide").fadeIn(200);
    })	  
	 $("#kelurahan").change(function(){
		var kd=$("#kelurahan").val();
        $.ajax({
			url:"KelurahanCek.php",
			data:"op=Cek&kd="+kd,
			success:function(data){
				if(data==0){
					$("#pesan").html('');
					$("#kelurahan").css('border','2px #090 solid');
				}else{
					$("#pesan").html('Data yang anda masukkan sudah ada');
					$("#kelurahan").css('border','2px #c33 solid');
				}
			}
		});
	});
    $("#form").submit(function(){
        var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Simpan&"+data,
            url:"KelurahanSimpan.php",
            success:function(data){
			$('#loaderImage').show();
			if(data=="sukses"){
				$('#loaderImage').show();
				$("#form_kelurahan").hide();
				$(".show-hide").fadeIn(200);
				$("#data_kelurahan").show().load(main, function(){ $('#loaderImage').hide(); });
				$("#submit_result").fadeIn();
			}else if(data=="duplikat_nama"){
				$('#loaderImage').hide();
                 $("#status").html('Maaf Data yang anda masukkan sudah ada');
				$("#pesan").html('Data yang anda masukkan sudah ada');
				$("#kecamatan").css('border','2px #c33 solid');
			}
			else{
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
	$KDkl			= buatKode("kelurahan", "L");

?>

<div id="status"  style="color:#C0392B;"></div>
<p><form class="" id="form" style="border:0px solid black; ">
	<label>Kode Kelurahan</label>
	<input type="text" id="kd_kelurahan" class="input-xlarge" name="kd_kelurahan" value="<?php echo $KDkl; ?>" readonly>
	<label>Nama Kelurahan</label>
	<input type="text" id="kelurahan" class="input-xlarge" name="kelurahan" value="" required="required"><span id="pesan"></span>
	<label>Kecamatan</label>
	<select id="kd_kecamatan" class="input-xlarge" name="kd_kecamatan" required="required">
		<option value="">--Pilih Kecamatan--</option>
		<?php
			$dataSql = "SELECT * FROM kecamatan ORDER BY nama_kecamatan";
			$dataQry = mysql_query($dataSql);
			while ($dataRow = mysql_fetch_array($dataQry)) {
				echo "<option value='$dataRow[kd_kecamatan]' $cek>$dataRow[nama_kecamatan]</option>";
			}
		?>
	</select>
	<div style="margin-top:8px;">
	<input type="submit" id="simpan" class="btn btn-success" value="Simpan">
				<input type="reset" id="batal" value="Batal" class="btn btn-danger"/>
	</div>
	
	
	<div class="clear"></div>
	<!--<div class="btn-toolbar-form">
    <button class="btn btn-primary simpan" id="simpan"><i class="icon-save"></i> Simpan</button>
    <button class="btn btn-danger batal" id="batal"><i class="icon-remove"></i> Batal</button>
    
	
</div>-->

</form></p>
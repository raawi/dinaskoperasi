
<script>
$(document).ready(function(){
	var main = "KecamatanData.php";			var mainForm = "KecamatanForm.php";
	$("#kecamatan").focus();
    $("#batal").click(function(){
        $("#form_kecamatan").hide();
        $(".btn-toolbar").fadeIn(200);
        $("#data_kecamatan").fadeIn(200);
        $(".show-hide").fadeIn(200);
    })	  
	 $("#kecamatan").change(function(){
		var kd=$("#kecamatan").val();
        $.ajax({
			url:"kecamatanCek.php",
			data:"op=Cek&kd="+kd,
			success:function(data){
				if(data==0){
					$("#pesan").html('');
					$("#kecamatan").css('border','2px #090 solid');
				}else{
					$("#pesan").html('Data yang anda masukkan sudah ada');
					$("#kecamatan").css('border','2px #c33 solid');
				}
			}
		});
	});
    $("#form").submit(function(){
        var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Simpan&"+data,
            url:"KecamatanSimpan.php",
            success:function(data){
			$('#loaderImage').show();
			if(data=="sukses"){
				$('#loaderImage').show();
				$("#form_kecamatan").hide();
				$(".show-hide").fadeIn(200);
				$("#data_kecamatan").show().load(main, function(){ $('#loaderImage').hide(); });
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
	$KDkc			= buatKode("kecamatan", "K");

?>

<div id="status"  style="color:#C0392B;"></div>
<p><form class="" id="form" style="border:0px solid black; ">
	<label>Kode Kecamatan</label>
	<input type="text" id="kd_kecamatan" class="input-xlarge" name="kd_kecamatan" value="<?php echo $KDkc; ?>" readonly>
	<label>Nama Kecamatan</label>
	<input type="text" id="kecamatan" class="input-xlarge" name="kecamatan" value="" required="required"><span id="pesan"></span>
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

<script>
$(document).ready(function(){
	var main = "BentukKoperasiData.php";			var mainForm = "BentukKoperasiForm.php";
	$("#bentuk_koperasi").focus();
    $("#batal").click(function(){
        $("#form_data_bentuk_koperasi").hide();
        $(".btn-toolbar").fadeIn(200);
        $("#data_bentuk_koperasi").fadeIn(200);
        $(".show-hide").fadeIn(200);
    })	  
	 $("#bentuk_koperasi").change(function(){
		var kd=$("#bentuk_koperasi").val();
        $.ajax({
			url:"BentukKoperasiCek.php",
			data:"op=Cek&kd="+kd,
			success:function(data){
				if(data==0){
					$("#pesan").html('');
					$("#bentuk_koperasi").css('border','2px #090 solid');
				}else{
					$("#pesan").html('Data yang anda masukkan sudah ada');
					$("#bentuk_koperasi").css('border','2px #c33 solid');
				}
			}
		});
	});
    $("#form").submit(function(){
        var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Simpan&"+data,
            url:"BentukKoperasiSimpan.php",
            success:function(data){
			$('#loaderImage').show();
			if(data=="sukses"){
				$('#loaderImage').show();
				$("#form_data_bentuk_koperasi").hide();
				$(".show-hide").fadeIn(200);
				$("#data_bentuk_koperasi").show().load(main, function(){ $('#loaderImage').hide(); });
				$("#submit_result").fadeIn();
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
	$KDbk			= buatKode("bentuk_koperasi", "BK");

?>

<div id="status"  style="color:#C0392B;"></div>
<p><form class="" id="form" style="border:0px solid black; ">
	<label>Kode Bentuk Koperasi</label>
	<input type="text" id="kd_bentuk_koperasi" class="input-xlarge" name="kd_bentuk_koperasi" value="<?php echo $KDbk; ?>" readonly required="required">
	<label>Bentuk Koperasi</label>
	<input type="text" id="bentuk_koperasi" class="input-xlarge" name="bentuk_koperasi" value="" required="required"><span id="pesan"></span>
	<label>Kepanjangan</label>
	<input type="text" id="kepanjangan" class="input-xlarge" name="kepanjangan" value="" required="required">
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
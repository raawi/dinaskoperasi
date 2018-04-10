<script>
$(document).ready(function(){
	var main = "BentukKoperasiData.php";
	var mainForm = "BentukKoperasiForm.php";
	$("#bentuk_koperasi").focus();
    $("#batal").click(function(){
       $("#form_data_bentuk_koperasi").hide();
       $("#data_bentuk_koperasi").fadeIn(200);
       
        //$("#form_data_bentuk_koperasi").load(mainForm , function(){ $('#loaderImage').hide(); });
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
		 var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Update&"+data,
            url:"BentukKoperasiSimpan.php",
            success:function(data){
			$('#loaderImage').show();
			if(data=="sukses"){
				$('#loaderImage').show();
				//$("#batal").click();
				$("#form_data_bentuk_koperasi").hide();
				$(".show-hide").fadeIn(200);
				$("#data_bentuk_koperasi").show().load(main, function(){ $('#loaderImage').hide(); });
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
	$kd_bentuk_koperasi = $_POST['id'];
	$data = mysql_fetch_array(mysql_query("SELECT * FROM bentuk_koperasi WHERE kd_bk='".$kd_bentuk_koperasi."'")); 
	$kd_bentuk_koperasi = isset($_POST['kd_bentuk_koperasi']) ? $_POST['kd_bentuk_koperasi'] : $data['kd_bk'];
	$bentuk_koperasi = isset($_POST['bentuk_koperasi']) ? $_POST['bentuk_koperasi'] : $data['nama_bk'];
	$kepanjangan = isset($_POST['kepanjangan']) ? $_POST['kepanjangan'] : $data['kepanjangan'];
?>
<div id="status"  style="color:#C0392B;"></div>

<p><form class="form-horizontal" id="form">
	<label>Kode Bentuk Koperasi</label>
	<input type="text" id="kd_bentuk_koperasi" class="input-xlarge" name="kd_bentuk_koperasi" readonly value="<?php echo $kd_bentuk_koperasi ?>" required="required">
	<label>Bentuk Koperasi</label>
	<input type="text" id="bentuk_koperasi" class="input-xlarge" name="bentuk_koperasi" value="<?php echo $bentuk_koperasi ?>" required="required"><span id="pesan"></span>
	<label>Kepanjangan</label>
	<input type="text" id="kepanjangan" class="input-xlarge" name="kepanjangan" value="<?php echo $kepanjangan ?>" required="required">
	<div style="margin-top:8px;">
	<input type="submit" id="simpan" class="btn btn-success" value="Simpan">
				<input type="reset" id="batal" value="Batal" class="btn btn-danger"/>
	</div>
	
	
	<div class="clear"></div>
</form></p>
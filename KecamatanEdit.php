<script>
$(document).ready(function(){
	var main = "KecamatanData.php";
	var mainForm = "KecamatanForm.php";
	$("#kecamatan").focus();
    $("#batal").click(function(){
       $("#form_kecamatan").hide();
       $("#data_kecamatan").fadeIn(200);
       
        //$("#form_kecamatan").load(mainForm , function(){ $('#loaderImage').hide(); });
    })
	$("#bentuk_koperasi").change(function(){
		var kd=$("#bentuk_koperasi").val();
        $.ajax({
			url:"KoperasiCek.php",
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
            url:"KecamatanSimpan.php",
            success:function(data){
			$('#loaderImage').show();
			if(data=="sukses"){
				$('#loaderImage').show();
				//$("#batal").click();
				$("#form_kecamatan").hide();
				$(".show-hide").fadeIn(200);
				$("#data_kecamatan").show().load(main, function(){ $('#loaderImage').hide(); });
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
	$kd_kecamatan = $_POST['id'];
	$data = mysql_fetch_array(mysql_query("SELECT * FROM kecamatan WHERE kd_kecamatan='".$kd_kecamatan."'")); 
	$kd_kecamatan = isset($_POST['kd_kecamatan']) ? $_POST['kd_kecamatan'] : $data['kd_kecamatan'];
	$nama_kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : $data['nama_kecamatan'];
?>
<div id="status"  style="color:#C0392B;"></div>

<p><form class="form-horizontal" id="form">
	<label>Kode Kecamatan</label>
	<input type="text" id="kd_kecamatan" class="input-xlarge" name="kd_kecamatan" readonly value="<?php echo $kd_kecamatan ?>" required="required">
	<label>Nama Kecamatan</label>
	<input type="text" id="kecamatan" class="input-xlarge" name="kecamatan" value="<?php echo $nama_kecamatan ?>" required="required"><span id="pesan"></span>
	<div style="margin-top:8px;">
	<input type="submit" id="simpan" class="btn btn-success" value="Simpan">
				<input type="reset" id="batal" value="Batal" class="btn btn-danger"/>
	</div>
	
	
	<div class="clear"></div>
</form></p>
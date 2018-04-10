<script>
$(document).ready(function(){
	
	var main= "UserData.php";
	var mainForm= "UserForm.php";
	$("#nama_penilai").focus();
   $("#batal").click(function(){
		$("#form_user").hide();
		$("#data_user").fadeIn(200);
		$(".show-hide").show();
    })
    $("#form").submit(function(){
        var data = $("#form").serialize();
		$('#loaderImage').show();
        $.ajax({
            type:"POST",
            data:"aksi=Update&"+data,
            url:"UserSimpan.php",
            success:function(data){
				$("#form_user").hide();
				$(".show-hide").fadeIn(200);
				$("#data_user").show().load(main, function(){ $('#loaderImage').hide(); });
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
	$nip = $_POST['id'];
	$data = mysql_fetch_array(mysql_query("SELECT * FROM penilai WHERE nip='".$nip."'")); 
	$nip = isset($_POST['nip']) ? $_POST['nip'] : $data['nip'];	
	$nama_penilai = isset($_POST['nama_penilai']) ? $_POST['nama_penilai'] : $data['nama_penilai'];
	$username = isset($_POST['username']) ? $_POST['username'] : $data['username'];
	
	
?>
<form class="" id="form">
<label>Nip</label>
        <input type="text" name="nip"  id="nip" size="10" value="<?php echo $nip ?>" readonly class="input-xlarge required">
        <label>Nama Penilai</label>
        <input type="text" name="nama_penilai" value="<?php echo $nama_penilai ?>" id="nama_penilai" class="input-xlarge required"> 
        <label>Username</label>
        <input type="text" name="username" id="username" value="<?php echo $username ?>" class="input-xlarge required" ><span style="margin-left:5px;margin-top:-5px;" id="pesan"></span>
		<div>
		<input type="submit" id="simpan" class="btn btn-primary" value="Simpan">
		<input type="button" id="batal" value="Batal" class="btn btn-danger"/>
		</div>	
</form>
<?php
koneksi_tutup();
?>
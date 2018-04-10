<script>
$(document).ready(function(){
	
	var main= "JabatanData.php";
	var mainForm= "JabatanForm.php";
	$("#jabatan").focus();
    $("#batal").click(function(){
		$("#form_jabatan").fadeOut(200);
		 $(".btn-toolbar").fadeIn(200);
        $("#data_jabatan").fadeIn(200);
        $(".show-hide").fadeIn(200);
    })
    $("#form").submit(function(){
        var data = $("#form").serialize();
		$('#loaderImage').show();
        $.ajax({
            type:"POST",
            data:"aksi=Update&"+data,
            url:"JabatanSimpan.php",
            success:function(data){
				$("#form_jabatan").hide();
				$(".show-hide").fadeIn(200);
				$("#data_jabatan").show().load(main, function(){ $('#loaderImage').hide(); });
				$("#submit_result").fadeIn();
                return true;
            }
        })
        return false;
    })
})
</script>
<?php
require "koneksi/koneksi.php";
	koneksi_buka();
	$id_jabatan = $_POST['id'];
	$data = mysql_fetch_array(mysql_query("SELECT * FROM jabatan WHERE id_jabatan='".$id_jabatan."'")); 
	$jabatan = isset($_POST['jabatan']) ? $_POST['jabatan'] : $data['jabatan'];	
	$id_jabatan = isset($_POST['id_jabatan']) ? $_POST['id_jabatan'] : $data['id_jabatan'];
	
	
?>
<form class="form-horizontal" id="form">
<table class="table-left" valign="top">
<input type="hidden" id="id_jabatan" name="id_jabatan" value="<?php echo $_POST['id']; ?>">
		<tr>
			<td width="150px;">ID Jabatan</td>
			<td><input type="text" id="id_jabatan" class="input-medium" readonly name="id_jabatan" value="<?php echo $id_jabatan; ?>" required="required"><span id="pesan"></span></td>
		</tr>
		<tr>
			<td>Nama jabatan</td>
			<td> <input type="text" id="jabatan" class="input-xlarge" name="jabatan" value="<?php echo $jabatan; ?>" required="required"></td>
		</tr>
		<tr>
			<td></td>
			<td> 
				<input type="submit" id="simpan" class="btn btn-success" value="Simpan">
				<input type="button" id="batal" value="Batal" class="btn btn-danger"/>
			</td>
		</tr>
	</table>
</form>
<?php
koneksi_tutup();
?>
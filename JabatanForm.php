<link type="text/css" href="js/calender/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/calender/ui.core.js"></script>
<script type="text/javascript" src="js/calender/ui.datepicker.js"></script>
	 

<script>
$(document).ready(function(){
	var main = "JabatanData.php";
	var mainForm = "JabatanForm.php";
	$("#jabatan").focus();
   $("#batal").click(function(){
		$("#form_jabatan").fadeOut(200);
		 $(".btn-toolbar").fadeIn(200);
        $("#data_jabatan").fadeIn(200);
        $(".show-hide").fadeIn(200);
    })
	$(document).ready(function(){
        $("#tanggal_lahir").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    $("#form").submit(function(){
        var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Simpan&"+data,
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
	include "fungsi.php";
	$ID_Jabatan			= buatKode("jabatan", "JB");

?>
<div id="status"></div>

<form class="form-horizontal" id="form">
	<table class="table-left" valign="top">
		<tr>
			<td width="150px;">ID Jabatan</td>
			<td><input type="text" id="id_jabatan" class="input-medium" name="id_jabatan" value="<?php echo $ID_Jabatan; ?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Jabatan</td>
			<td><input type="text" id="jabatan" class="input-xlarge" name="jabatan" value="" required="required"></td>
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
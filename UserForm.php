<link type="text/css" href="js/calender/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/calender/ui.core.js"></script>
<script type="text/javascript" src="js/calender/ui.datepicker.js"></script>
	 

<script>
$(document).ready(function(){
	var main = "UserData.php";
	var mainForm = "UserForm.php";
	$("#nip").focus();
   $("#batal").click(function(){
		$("#form_user").hide();
		 $(".btn-toolbar").fadeIn(200);
        $("#data_user").fadeIn(200);
        $(".show-hide").fadeIn(200);
    })
	$(document).ready(function(){
        $("#tanggal_lahir").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  $("#username").change(function(){
			var username=$("#username").val();              
			$.ajax({
				url:"cek-username.php",
				data:"op=cek&username="+username,
				success:function(data){
					if(data==0){
						$("#pesan").html('<img src="images/checkmark.png">');
						$("#username").css('border','1px #090 solid');
					}else{
						$("#pesan").html(data);
						$("#username").css('border','3px #c33 solid');
                    }
				}
             });
       });
    $("#form").submit(function(){
        var data = $("#form").serialize();
        $.ajax({
            type:"POST",
            data:"aksi=Simpan&"+data,
            url:"UserSimpan.php",
            success:function(data){
				if(data=="sukses"){
					$("#form_user").hide();
					$(".show-hide").fadeIn(200);
					$("#data_user").show().load(main, function(){ $('#loaderImage').hide(); });
					$("#submit_result").fadeIn();
				}else{
				$('#loaderImage').hide();
                 $("#status").html('Data yang anda masukkan sudah ada');
            }
				
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

<form class="" id="form">
	<label>Nip</label>
        <input type="text" name="nip"  id="nip" size="10" class="input-xlarge required">
        <label>Nama Penilai</label>
        <input type="text" value="" name="nama_penilai" id="nama_penilai" class="input-xlarge required"> 
        <label>Username</label>
        <input type="text" name="username" id="username" value=""  class="input-xlarge required" ><span style="margin-left:5px;margin-top:-5px;" id="pesan"></span>
		<label>Password</label>
        <input type="password" name="password" id="password" value=""  class="input-xlarge required" ><span style="margin-left:5px;margin-top:-5px;" id="pesan"></span>
		<div>
		<input type="submit" id="simpan" class="btn btn-primary" value="Simpan">
		<input type="button" id="batal" value="Batal" class="btn btn-danger"/>
		</div>	
</form>
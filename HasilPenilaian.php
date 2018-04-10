<?php 
require 'koneksi/koneksi.php'; 
?>
<script>
$(document).ready(function(e){
		var main = "HasilPenilaianData.php";
		$('#loaderImage').show();
		var mainForm = "HasilPenilaianForm.php";
		
		$(".dashboard_menu").removeClass('active');
		
		$(".pegawai_menu").removeClass('active');
		$(".pelanggan_menu").removeClass('active');
		$(".jabatan_menu").removeClass('active');
		$(".user_menu").removeClass('active');
		$(".level_menu").removeClass('active');
		
		$(".type_motor_menu").addClass('active');
		$(".merk_motor_menu").removeClass('active');
		$(".supplier_menu").removeClass('active');
		$(".spare_parts_menu").removeClass('active');
		$(".update_spare_parts_menu").removeClass('active');
		
		$(".estimasi_biaya_menu").removeClass('active');
		$(".work_order_menu").removeClass('active');
		$(".service_menu").removeClass('active');
		$(".penjualan_menu").removeClass('active');
		
		$(".ltype_motor_menu").removeClass('active');
		$(".lmerk_motor_menu").removeClass('active');
		$(".lkategori_spareparts_menu").removeClass('active');
		$(".lpenjualan_spare_parts_menu").removeClass('active');
		$(".lservice_menu").removeClass('active');
			
		$("#data_hasil_penilaian").load(main, function(){ 
			$('#loaderImage').hide(); 
			$("#submit_result").hide();
			$("#delete_result").hide(); 
		});
		$(".tambahPenilaian").click(function(){
			$('#loaderImage').show(); 
			$('.show-hide').hide(); 
			//$('#data_hasil_penilaian').hide();
			$("#form_hasil_penilaian").fadeIn(1,function(){
				
				$('#loaderImage').hide(); 
				
			}).load(mainForm);
		});
		//$("#form_hasil_penilaian").load(mainForm, function(){ $('#loaderImage').hide(); });
		$("#submit_result").hide();
		$("#delete_result").hide();
		$('.halaman').live("click", function(event){
			$('#loaderImage').show();
			kd_hal = this.id;
			$.post(main, {halaman: kd_hal} ,function(data) {
				$("#data_hasil_penilaian").html(data).show(function(){ $('#loaderImage').hide(); });//.show()
			});
		});
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			$('#loaderImage').show(); 
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					$("#data_hasil_penilaian").html(data).show(function(){ $('#loaderImage').hide(); });
				});
			} else {
				$("#data_hasil_penilaian").load(main,function(){ $('#loaderImage').hide(); });
			}
		});
		$('.hapus').live("click", function(){
			var url = "HasilPenilaianSimpan.php";
			var id_parts = $(this).closest("tr").attr("id");
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			if (answer) {
				$('#loaderImage').show();
				$.post(url, {hapus: id_parts} ,function() {
					$("#form_hasil_penilaian").load(mainForm, function(){ 
						$("#data_hasil_penilaian").load(main, function(){ $('#loaderImage').fadeOut(); });
					});
					$("#submit_result").hide(1);
					$("#delete_result").fadeIn();
				});
			}
		});
		$("#refresh").click(function(){
			$('#loaderImage').show();
			$("#data_hasil_penilaian").load(main, function(){ $('#loaderImage').hide(); });
			$('#pegawai').focus();
		});
})
</script>	
<div class="header show-hide">
	<div style="float:right; border:0px solid red; margin-top:5px;padding:10px;padding-right:30px;">
				<!--<div style="position:absolute;margin-top:15px; font-size:16px;right:90px">Jackhhlihjlijj</div> &nbsp;&nbsp;<a href=""><img title="logout" src="images/switch.png" height="24px"></a>
			-->
	</div>
    <h1 class="page-title">
		<div class="btn-toolbar">
			<button class="btn btn-primary tambahPenilaian"><i class="icon-plus"></i> Tambah</button>
			<button class="btn btn-success btn-refresh" id="refresh"><i class="icon-refresh"></i> Refresh</button>
			<a href="fpdf-header-footer/laporan-hasil-penilaian.php" target="_blank" class="btn"><i class="icon-print"></i> Cetak</a>
			<form style="float:right" class="search form-inline">
				<input style="background:#fff;color:000;border-right:none" type="text" name="pencarian" placeholder="Search..."> <button class="btn" style="border-left:none"><i class="icon-search"></i> Go</button>
			</form>
		</div>
	</h1>
</div>

<ul class="breadcrumb">
	<li><a href="index.html">Home</a> <span class="divider">/</span></li>
	<li class="active">Hasil Penilaian</li>
</ul>

<div class="container-fluid">
<div id="submit_result" class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Berhasil menambahkan data
</div>
<div id="delete_result" class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Berhasil menghapus data
</div>
	<div class="row-fluid">
		<div class="well">
			<div id="form_hasil_penilaian"></div>
			<div id="data_hasil_penilaian"></div>
			
		</div>            
	</div>
</div>
		
<footer style="position:absolute;bottom:0px; left:0px; right:0px">
	<p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
    <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
</footer>
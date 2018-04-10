<script>
$(document).ready(function(e){
		var main = "KoperasiData.php";
		var mainFilter = "KoperasiDataFilter.php";
		$('#loaderImage').show();
		var mainForm = "KoperasiForm.php";
		
		$(".dashboard_menu").removeClass('active');
		
		$(".pegawai_menu").addClass('active');
		$(".pelanggan_menu").removeClass('active');
		$(".jabatan_menu").removeClass('active');
		$(".user_menu").removeClass('active');
		$(".level_menu").removeClass('active');
		
		$(".type_motor_menu").removeClass('active');
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
			
		$("#data_koperasi").load(main, function(){ 
			$('#loaderImage').hide(); 
			$("#submit_result").hide();
			$("#delete_result").hide(); 
		});
		$(".tambahKoperasi").click(function(){
			$('#loaderImage').show(); 
			$('.show-hide').hide(); 
			//$('#data_koperasi').hide();
			$("#form_koperasi").fadeIn(1,function(){
				
				$('#loaderImage').hide(); 
				
			}).load(mainForm);
		});
		//$("#form_koperasi").load(mainForm, function(){ $('#loaderImage').hide(); });
		$("#submit_result").hide();
		$("#delete_result").hide();
		$('.halaman').live("click", function(event){
			$('#loaderImage').show();
			kd_hal = this.id;
			$.post(main, {halaman: kd_hal} ,function(data) {
				$("#data_koperasi").html(data).show(function(){ $('#loaderImage').hide(); });//.show()
			});
		});
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			$('#loaderImage').show(); 
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					$("#data_koperasi").html(data).show(function(){ $('#loaderImage').hide(); $('#kd_kecamatan').val("");});
				});
			} else {
				$("#data_koperasi").load(main,function(){ $('#loaderImage').hide(); });
			}
		});
		$(".kd_kecamatan").on('change',function(e){
			var t_filter = $('#kd_kecamatan').val();
			$('#loaderImage').show(); 
			if(t_filter!="") {
				$.post(mainFilter, {filter: t_filter} ,function(data) {
					$("#data_koperasi").html(data).show(function(){ $('#loaderImage').hide();  });
				});
			}
			else if(t_filter!="") {
				$.post(mainFilter, {filter: t_filter} ,function(data) {
					$("#data_koperasi").html(data).show(function(){ $('#loaderImage').hide(); });
				});
			} else {
				$("#data_koperasi").load(main,function(){ $('#loaderImage').hide(); });
			}
		});
		$('.hapus').live("click", function(){
			var url = "KoperasiSimpan.php";
			var id_parts = $(this).closest("tr").attr("id");
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			if (answer) {
				$('#loaderImage').show();
				$.post(url, {hapus: id_parts} ,function() {
					$("#form_koperasi").load(mainForm, function(){ 
						$("#data_koperasi").load(main, function(){ $('#loaderImage').fadeOut(); });
					});
					$("#submit_result").hide(1);
					$("#delete_result").fadeIn();
				});
			}
		});
		
		$("#refresh").click(function(){
			$('#loaderImage').show();
			$("#data_koperasi").load(main, function(){ $('#loaderImage').hide(); });
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
			<button class="btn btn-primary tambahKoperasi"><i class="icon-plus"></i> Tambah</button>
			<button class="btn btn-success btn-refresh" id="refresh"><i class="icon-refresh"></i> Refresh</button>
			<div style="float:right" class="search form-inline">
				<select name="kd_kecamatan" id="kd_kecamatan" class="input-xlarge kd_kecamatan">
				<option value="">Cari Berdasarkan Kecamatan</option>
				<?php
				require "library/koneksi.php";
				koneksi_buka();
				$kecamatan = mysql_query("SELECT * FROM kecamatan ORDER BY nama_kecamatan");
				while($dt=mysql_fetch_array($kecamatan)){
				echo "<option value='$dt[kd_kecamatan]'>$dt[nama_kecamatan]</option>\n";
				}
				?>
				</select>
				<!--<button class="btn btn-success btn-refresh" id="filter"><i class="icon-filter"></i> Filter</button>-->
				<input style="background:#fff;color:000;*border-right:none" type="text" name="pencarian" placeholder="Search..."> <!--<button class="btn" style="border-left:none"><i class="icon-search"></i> Go</button>-->
			</div>
		</div>
	</h1>
</div>

<ul class="breadcrumb">
	<li><a href="index.html">Home</a> <span class="divider">/</span></li>
	<li class="active">Data Koperasi</li>
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
			<div id="form_koperasi"></div>
			<div id="data_koperasi"></div>
		</div>            
	</div>
</div>
		
<footer style="position:absolute;bottom:0px; left:0px; right:0px">
	<p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
    <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
</footer>
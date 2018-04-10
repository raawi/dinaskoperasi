<?php
require 'library/koneksi.php';
include 'fungsi.php';
koneksi_buka();
?>
 <script>
$(document).ready(function(){
	var main = "KoperasiData.php";
    $(".edit").click(function(){
	$('#loaderImage').show();
        var id = $(this).closest("tr").attr("id");
        $.ajax({
            type:"POST",
            data:"id="+id,
            url:"KoperasiEdit.php",
            success:function(data){
				$("#form_koperasi").fadeIn(1, function(){ $('#loaderImage').hide(); });
				$("#form_koperasi").html(data);
				//$("#data_koperasi").hide();
				$(".show-hide").hide();
            }
        })
    })
	$(".lihat").click(function(){
	$('#loaderImage').show();
        var kd = $(this).closest("tr").attr("id");
        $.ajax({
            type:"POST",
            data:"id="+kd,
            url:"KoperasiLihat.php",
            success:function(data){
				$("#form_koperasi").fadeIn(1, function(){ $('#loaderImage').hide(); });
				$("#form_koperasi").html(data);
				$("#data_koperasi").hide();
				$(".show-hide").hide();
            }
        })
    })
	
})

</script>
<table class="table table-hover list" cellpadding="0" cellspacing="0" style="font-size:12px;">
<thead>
    <tr>
        <th style="width:20px">#F</th>
        <th style="width:120px">KOPERASI</th>
        <th>NO B.HUKUM</th>
        <th>TGL B.HK</th>
        <th>B.KOP</th>
        <th>ALAMAT</th>
        <th>KECAMATAN</th>
        <th>KELURAHAN</th>
        <th>TELP</th>
        
        <th style="width:60px; background:#fafafa">TOOLS</th>
    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        $jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM data_koperasi"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci = $_POST['cari'];
            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mysql_query("
                SELECT data_koperasi.*, bentuk_koperasi.nama_bk, kecamatan.nama_kecamatan, kelurahan.nama_kelurahan FROM data_koperasi
				LEFT JOIN bentuk_koperasi ON data_koperasi.bentuk_koperasi=bentuk_koperasi.kd_bk
				LEFT JOIN kecamatan ON data_koperasi.kecamatan=kecamatan.kd_kecamatan
				LEFT JOIN kelurahan ON data_koperasi.kelurahan=kelurahan.kd_kelurahan
                WHERE data_koperasi.nama_koperasi LIKE '%$kunci%'
                OR data_koperasi.no_bh LIKE '%$kunci%' OR bentuk_koperasi.nama_bk LIKE '%$kunci%' order by kd_koperasi desc
            ");
        // query jika nomor halaman sudah ditentukan
        } 
		elseif(isset($_POST['filter'])) {
            $t_filter = $_POST['filter'];
            $query = mysql_query("SELECT data_koperasi.*, bentuk_koperasi.nama_bk, kecamatan.nama_kecamatan, kelurahan.nama_kelurahan FROM data_koperasi
				LEFT JOIN bentuk_koperasi ON data_koperasi.bentuk_koperasi=bentuk_koperasi.kd_bk
				LEFT JOIN kecamatan ON data_koperasi.kecamatan=kecamatan.kd_kecamatan
				LEFT JOIN kelurahan ON data_koperasi.kelurahan=kelurahan.kd_kelurahan
                WHERE data_koperasi.kecamatan='$t_filter' order by kd_koperasi desc");
        // query jika nomor halaman sudah ditentukan
        }else {
			
				
            $query = mysql_query(" SELECT data_koperasi.*, bentuk_koperasi.nama_bk, kecamatan.nama_kecamatan, kelurahan.nama_kelurahan FROM data_koperasi
				LEFT JOIN bentuk_koperasi ON data_koperasi.bentuk_koperasi=bentuk_koperasi.kd_bk
				LEFT JOIN kecamatan ON data_koperasi.kecamatan=kecamatan.kd_kecamatan
				LEFT JOIN kelurahan ON data_koperasi.kelurahan=kelurahan.kd_kelurahan
				order by data_koperasi.kd_koperasi desc LIMIT 0, $jml_per_halaman");
            $halaman = 1; //tambahan
        }
         
        // tampilkan data pegawai selama masih ada
        while($data = mysql_fetch_array($query)) {
    ?>
    <tr id="<?php echo $data['kd_koperasi'] ?>" title="<?php echo $data['nama_koperasi'] ?>">
        <td><?php echo $i ?></td>
        <td><?php echo $data['nama_koperasi'] ?></td>
        <td><?php echo $data['no_bh'] ?></td>
        <td><?php echo $data['tanggal_bh'] ?></td>
        <td><?php echo $data['nama_bk'] ?></td>
        <td><?php echo $data['jalan'] ?></td>
        <td><?php echo $data['nama_kecamatan'] ?></td>
        <td><?php echo $data['nama_kelurahan'] ?></td>
        <td><?php echo $data['telp'] ?></td>
        <td style="background:#fafafa">
		<!--<input type='button' value='Edit' class='edit'/>-->
            <a href=""  class='edit' data-toggle="modal">
                <i class="icon-pencil"></i>
            </a>
            <a href="" data-toggle="modal" id="<?php #echo $data['id_pegawai'] ?>" class="hapus">
                <i class="icon-trash"></i>
            </a>
			<a href=""  class='lihat' data-toggle="modal">Lihat</a>
        </td>
    </tr>
    <?php
        $i++;
        }
    ?>
</tbody>
</table>
 <div style="clear:both">&nbsp;</div>
<?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pagination-right">
  <ul>
    <?php

    // tambahan
    // panjang pagig yang akan ditampilkan
#    $no_hal_tampil = 5; // lebih besar dari 3

#    if ($jml_halaman <= $no_hal_tampil) {
#        $no_hal_awal = 1;
#        $no_hal_akhir = $jml_halaman;
#    } else {
#        $val = $no_hal_tampil - 2; //3
#        $mod = $halaman % $val; //
#        $kelipatan = ceil($halaman/$val);
#        $kelipatan2 = floor($halaman/$val);

#        if($halaman < $no_hal_tampil) {
#            $no_hal_awal = 1;
#            $no_hal_akhir = $no_hal_tampil;
#        } elseif ($mod == 2) {
#            $no_hal_awal = $halaman - 1;
#            $no_hal_akhir = $kelipatan * $val + 2;
#        } else {
#            $no_hal_awal = ($kelipatan2 - 1) * $val + 1;
#            $no_hal_akhir = $kelipatan2 * $val + 2;
#        }

#        if($jml_halaman <= $no_hal_akhir) {
#            $no_hal_akhir = $jml_halaman;
#        }
#    }

#    for($i = $no_hal_awal; $i <= $no_hal_akhir; $i++) {
        // tambahan
        // menambahkan class active pada tag li
#        $aktif = $i == $halaman ? ' active' : '';
    ?>
    <!--<li class="halaman<?php echo $aktif ?>" id="<?php echo $i ?>"><a href="" data-toggle="modal"><?php echo $i ?></a></li>-->
    <?php# } ?>
  </ul>
</div>
<div style="clear:both">&nbsp;</div>
<?php } ?>
 
<?php 
// tutup koneksi ke database mysql
koneksi_tutup(); 
?>
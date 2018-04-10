<?php
require 'library/koneksi.php';
koneksi_buka();
?>
 <script>
$(document).ready(function(){
	var main = "KelurahanData.php";
    $(".edit").click(function(){
	$('#loaderImage').show();
        var id = $(this).closest("tr").attr("id");
        $.ajax({
            type:"POST",
            data:"id="+id,
            url:"KelurahanEdit.php",
            success:function(data){
            $("#form_kelurahan").fadeIn("10", function(){ $('#loaderImage').hide(); });
            $("#form_kelurahan").html(data);
            //$("#data_bentuk_koperasi").hide();
            $(".show-hide").hide();
            }
        })
    });	
})

</script>
<table class="table table-hover" cellpadding="0" cellspacing="0">
<thead>
    <tr>
        <th style="width:20px">#</th>
        <th style="width:220px">Kode Kelurahan</th>
        <th>Nama Kelurahan</th>
        <th>Nama Kecamatan</th>
        <th style="width:60px">Aksi</th>
    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        $jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM kelurahan"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci = $_POST['cari'];
            echo "Hasil pencarian untuk kata kunci : $kunci";
            $query = mysql_query("SELECT kelurahan.*, kecamatan.nama_kecamatan FROM kelurahan
			LEFT JOIN kecamatan ON kelurahan.kd_kec=kecamatan.kd_kecamatan
			WHERE kelurahan.nama_kelurahan LIKE '%$kunci%' OR kecamatan.nama_kecamatan LIKE '%$kunci%' 
			order by kecamatan.nama_kecamatan asc
            ");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysql_query("SELECT kelurahan.*, kecamatan.nama_kecamatan FROM kelurahan
			LEFT JOIN kecamatan ON kelurahan.kd_kec=kecamatan.kd_kecamatan
			order by kecamatan.nama_kecamatan asc LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
			
            $query = mysql_query("SELECT kelurahan.*, kecamatan.nama_kecamatan FROM kelurahan
			LEFT JOIN kecamatan ON kelurahan.kd_kec=kecamatan.kd_kecamatan
			order by kecamatan.nama_kecamatan asc LIMIT 0, $jml_per_halaman");
            $halaman = 1; //tambahan
        }
         
        // tampilkan data bentuk_koperasi selama masih ada
        while($data = mysql_fetch_array($query)) {
    ?>
    <tr id="<?php echo $data['kd_kelurahan'] ?>" title="<?php echo $data['nama_kelurahan'] ?>">
        <td><?php echo $i ?></td>
        
        <td><?php echo $data['kd_kelurahan'] ?></td>
        <td><?php echo $data['nama_kelurahan'] ?></td>
        <td><?php echo $data['nama_kecamatan'] ?></td>
        <td>
		<!--<input type='button' value='Edit' class='edit'/>
            <a href="#"  class='tambah_kendaraan' data-toggle="modal">
                Tambah Kendaraan-->
            </a>
			<a href=""  class='edit' data-toggle="modal">
                <i class="icon-pencil"></i>
            </a>
            <a href="" id="<?php #echo $data['no_pol'] ?>" data-toggle="modal" class="hapus">
                <i class="icon-trash"></i>
            </a>
        </td>
    </tr>
    <?php
        $i++;
        }
    ?>
</tbody>
</table>
 
<?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pagination-right">
  <ul>
    <?php

    // tambahan
    // panjang pagig yang akan ditampilkan
    $no_hal_tampil = 5; // lebih besar dari 3

    if ($jml_halaman <= $no_hal_tampil) {
        $no_hal_awal = 1;
        $no_hal_akhir = $jml_halaman;
    } else {
        $val = $no_hal_tampil - 2; //3
        $mod = $halaman % $val; //
        $kelipatan = ceil($halaman/$val);
        $kelipatan2 = floor($halaman/$val);

        if($halaman < $no_hal_tampil) {
            $no_hal_awal = 1;
            $no_hal_akhir = $no_hal_tampil;
        } elseif ($mod == 2) {
            $no_hal_awal = $halaman - 1;
            $no_hal_akhir = $kelipatan * $val + 2;
        } else {
            $no_hal_awal = ($kelipatan2 - 1) * $val + 1;
            $no_hal_akhir = $kelipatan2 * $val + 2;
        }

        if($jml_halaman <= $no_hal_akhir) {
            $no_hal_akhir = $jml_halaman;
        }
    }

    for($i = $no_hal_awal; $i <= $no_hal_akhir; $i++) {
        // tambahan
        // menambahkan class active pada tag li
        $aktif = $i == $halaman ? ' active' : '';
    ?>
    <li class="halaman<?php echo $aktif ?>" id="<?php echo $i ?>"><a href="#"><?php echo $i ?></a></li>
    <?php } ?>
  </ul>
</div>
<?php } ?>
 
<?php 
// tutup koneksi ke database mysql
koneksi_tutup(); 
?>
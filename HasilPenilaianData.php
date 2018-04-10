<?php
require 'library/koneksi.php';
koneksi_buka();
?>
 <script>
$(document).ready(function(){
	var main = "HasilPenilaianData.php";
    $(".edit").click(function(){
	$('#loaderImage').show();
        var id = $(this).closest("tr").attr("id");
        $.ajax({
            type:"POST",
            data:"id="+id,
            url:"HasilPenilaianEdit.php",
            success:function(data){
            $("#form_hasil_penilaian").fadeIn(1, function(){ $('#loaderImage').hide(); });
            $("#form_hasil_penilaian").html(data);
			// $("#data_hasil_penilaian").hide();
			$(".show-hide").hide();
            }
        })
    })
	
})

</script>
<table style="font-size:13px;" class="table table-hover" cellpadding="0" cellspacing="0">
<thead>
    <tr>
        <th style="width:20px">#</th>
        <th style="width:60px">KD NILAI</th>
        <th style="width:50px">NO NIL.</th>
        <th>NAMA KOP</th>
        <th style="width:80px">B. KOPERASI</th>
        <th>NO BH.</th>
        <th>JALAN</th>
        <th>KECAMATAN</th>
        <th style="width:60px">TH BUKU</th>
        <th>SKOR</th>
        <th>Predikat</th>
        <th style="width:40px">#</th>
    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        $jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM skor"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci = $_POST['cari'];
            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mysql_query("
                SELECT skor.*, data_koperasi.nama_koperasi, data_koperasi.no_bh, data_koperasi.jalan
				, data_koperasi.kecamatan FROM skor
				LEFT JOIN data_koperasi ON skor.kd_koperasi=data_koperasi.kd_koperasi
				WHERE data_koperasi.no_bh LIKE '%$kunci%'
                OR data_koperasi.nama_koperasi OR skor.bentuk_koperasi LIKE '%$kunci%' order by skor.kd_penilaian desc
            ");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysql_query("SELECT skor.*, data_koperasi.nama_koperasi, data_koperasi.no_bh, data_koperasi.jalan
			, data_koperasi.kecamatan
			
			FROM skor
			LEFT JOIN data_koperasi ON skor.kd_koperasi=data_koperasi.kd_koperasi
			ORDER BY skor.kd_penilaian ASC LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysql_query("SELECT skor.*, data_koperasi.nama_koperasi, data_koperasi.no_bh, data_koperasi.jalan
	, data_koperasi.kecamatan
			
			FROM skor
			LEFT JOIN data_koperasi ON skor.kd_koperasi=data_koperasi.kd_koperasi
			ORDER BY skor.kd_penilaian ASC LIMIT 0, $jml_per_halaman")or die(mysql_error());
            $halaman = 1; //tambahan
        }
         
        // tampilkan data jabatan selama masih ada
        while($data = mysql_fetch_array($query)) {
    ?>
    <tr id="<?php echo $data['kd_penilaian'] ?>" title="<?php echo $data['nama_koperasi'] ?>">
        <td><?php echo $i ?></td>
        <td><?php echo $data['kd_penilaian']?></td>
		<td><?php echo $data['no_penilaian']?></td>
		<td><?php echo $data['nama_koperasi']?></td>
		<td><?php echo $data['bentuk_koperasi']?></td>
		<td><?php echo $data['no_bh']?></td>
		<td><?php echo $data['jalan']?></td>
		<td><?php echo $data['kecamatan']?></td>
		<td><?php echo $data['th_buku']?></td>
		<td><?php echo $data['skor']?></td>
		<td><?php echo $data['predikat']?></td>
        <td>
		<!--<input type='button' value='Edit' class='edit'/>-->
            <a href=""  class='edit' data-toggle="modal">
                <i class="icon-pencil"></i>
            </a>
             <a href="" data-toggle="modal" id="<?php #echo $data['id_pegawai'] ?>" class="hapus">
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
    <li class="halaman<?php echo $aktif ?>" id="<?php echo $i ?>"><a data-toogle="modal" href=""><?php echo $i ?></a></li>
    <?php } ?>
  </ul>
</div>
<div class="clear">&nbsp;</div>
<?php } ?>
 
<?php 
// tutup koneksi ke database mysql
koneksi_tutup(); 
?>
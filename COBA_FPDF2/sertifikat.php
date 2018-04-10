<?php
date_default_timezone_set("Asia/Jakarta");
$host ="localhost";
$user="root";
$password="";
$database="koperasi";
mysql_connect($host,$user,$password) or die("Koneksi server gagal");
mysql_select_db($database);
$namaBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret",
				 "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli",
				 "08" => "Agustus", "09" => "September", "10" => "Oktober",
				 "11" => "November", "12" => "Desember");


$tgl=date('d-m-Y');
$Tgl=": ".$tgl."";
//Queri untuk Menampilkan data
$Kode= isset($_GET['Kode']) ?  $_GET['Kode'] : ''; 
$query ="SELECT skor.*, data_koperasi.nama_koperasi, data_koperasi.no_bh, data_koperasi.jalan  FROM skor
			LEFT JOIN data_koperasi ON skor.kd_koperasi=data_koperasi.kd_koperasi
			WHERE skor.kd_penilaian='$Kode'";
$db_query = mysql_query($query) or die("Query gagal".mysql_error());
//Variabel untuk iterasi


//Mengambil nilai dari query database
$data=mysql_fetch_row($db_query);

$cell[0] = $data[0];
$cell[1] = $data[1];
$cell[2] = $data[2];
$cell[3] = $data[3];
$cell[4] = $data[4];
$cell[5] = $data[5];
$cell[6] = $data[6];
$cell[7] = $data[7];
$cell[8] = $data[8];
$cell[9] = $data[9];
$cell[10] = $data[10];
$cell[11] = $data[11];
$cell[12] = $data[12];
$cell[13] = $data[13];
#$cell[13] = $data[13];

require('fpdf.php');

class PDF extends FPDF
{
//Fungsi Untuk Membuat Header
function Header()
{
   //Pilih font Arial bold 15
   $this->SetFont('times','B',17);
   //Geser ke kanan
   $this->Cell(80);
   //Judul dalam bingkai
   $this->Cell(30,10,'Title',1,0,'C');
   //Ganti baris
   $this->Ln(0);
}

//Fungsi Untuk Membuat Footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(24);
    //Arial italic 8
    $this->SetFont('times','',8);
    //Page number
    #$this->Cell(0,10,'Halaman ke : '.$this->PageNo(),0,0,'C');
}
}

$pdf=new FPDF('P','cm',array(21,29)); 
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont("times","B",10);




#==========================================
#$pdf->Cell(0,20, $toData, '0', 1, 'C');

#$pdf->Cell(0,20, $totalpinjaman, '0', 1, 'C');
$pdf->SetFont('times','','8');
#$pdf->Cell(25,6,'Total Data','',0,'L');
#$pdf->Cell(30,6,$toData,'','0','L');
#$pdf->Ln();

$pdf->Cell(2.5,0.5,'','',0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

#========================================
$pdf->SetFont('times','',10);
$pdf->Cell(8,0.5,'','',0,'L');
$pdf->Cell(1.4,0.5,'No : 512/','',0,'L');
$pdf->Cell(0.5,0.5,$cell[1],'',0,'L');
$pdf->Cell(0.1,0.5,'/','',0,'L');
$pdf->Cell(0.8,0.5,'2014','',0,'L');
$pdf->Cell(8.3,0.5,'','',0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont("times","B",16);
$pdf->Cell(0,0.65,'HASIL PENILAIAN TINGKAT KESEHATAN',0,1,'C');
$pdf->Cell(0,0.65,'(KSP) KOPERASI SIMPAN PINJAM / (USP) UNIT SIMPAN PINJAM',0,1,'C');
#$pdf->SetFillColor(224,235,255);
#$fill=false;
#$pdf->Cell(1,0.7,'No','LRTB',0,'C');
#$pdf->Cell(4,0.7,'KD KELURAHAN','LRTB',0,'C');
#$pdf->Cell(7.6,0.7,'NAMA KELURAHAN','LRTB',0,'C');
#$pdf->Cell(6,0.7,'KELOMPOK KECAMATAN','LRTB',0,'C');

#$fill = !$fill;
$pdf->Ln();

$pdf->SetFont('times','',14);





//menampilkan data dari hasil query database


$pdf->Ln();
$pdf->Cell(1,0.5,'','',0,'L');
$pdf->Cell(6.6,0.5,'Nama Koperasi','',0,'L');
$pdf->Cell(0.2,0.5,':','',0,'L');
$pdf->SetFont('times','B',14);
$pdf->Cell(1.4,0.5,$cell[3],'',0,'L');
$pdf->Cell(0,0.5,'"'.$cell[11].'"','',0,'L');
$pdf->Ln();
$pdf->SetFont('times','',14);
#$pdf->Cell(6,0.7,$cell[3],'LBTR',0,'L');
#$pdf->Ln();
$pdf->Cell(1,0.5,'','',0,'L');
$pdf->Cell(6.6,0.6,'Badan Hukum','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(2.8,0.6,'Nomor','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(0,0.6,$cell[12],'',0,'L');
$pdf->Ln();
$pdf->Cell(1,0.5,'','',0,'L');
$pdf->Cell(6.6,0.6,'','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(2.8,0.6,'Tanggal','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(0,0.6,$cell[6],'',0,'L');
$pdf->Ln();

$pdf->Cell(1,0.5,'','',0,'L');
$pdf->Cell(6.6,0.6,'Alamat','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(2.8,0.6,'Jalan','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(0,0.6,$cell[13],'',0,'L');
$pdf->Ln();
$pdf->Cell(1,0.5,'','',0,'L');
$pdf->Cell(6.6,0.6,'','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(2.8,0.6,'Kecamatan','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(0,0.6,$cell[4],'',0,'L');
$pdf->Ln();

$pdf->Cell(1,0.5,'','',0,'L');
$pdf->Cell(6.6,0.6,'Penilaian Kesehatan','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(2.6,0.6,'Tahun Buku','',0,'L');
$pdf->Cell(0,0.6,$cell[5],'',0,'L');
$pdf->Ln();
$pdf->Cell(1,0.5,'','',0,'L');
$pdf->Cell(6.6,0.6,'Score','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->Cell(1.3,0.6,$cell[7],'',0,'L');
$pdf->Cell(0,0.6,'"'.$cell[8].'"','',0,'L');
$pdf->Ln();


$pdf->Cell(1,0.5,'','',0,'L');
$pdf->Cell(6.6,0.6,'Predikat','',0,'L');
$pdf->Cell(0.2,0.6,':','',0,'L');
$pdf->SetFont('times','B',11);
$pdf->Cell(0,0.6,$cell[9],'',0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('times','',14);
$pdf->Cell(7.4,0.6,'','',0,'C');
$pdf->Cell(0,0.6,'Semarang, '.$tgl.'','',0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(7.4,0.6,'','',0,'C');
$pdf->Cell(0,0.6,'KEPALA DINAS KOPERASI,','',0,'C');
$pdf->Ln();
$pdf->Cell(7.4,0.6,'','',0,'C');
$pdf->Cell(0,0.6,'USAHA MIKRO, KECIL, DAN MENENGAH','',0,'C');
$pdf->Ln();
$pdf->Cell(7.4,0.6,'','',0,'C');
$pdf->Cell(0,0.6,'KOTA SEMARANG','',0,'C');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(7.4,0.5,'','',0,'C');
$pdf->SetFont('times','BU',14);
$pdf->Cell(0,0.5,'Dra. LITANI SATYAWATI','',0,'C');
$pdf->Ln();
$pdf->SetFont('times','',14);
$pdf->Cell(7.4,0.5,'','',0,'C');
$pdf->Cell(0,0.5,'Pembina Tk1','',0,'C');
$pdf->Ln();
$pdf->Cell(7.4,0.5,'','',0,'C');
$pdf->Cell(0,0.5,'NIP. 19618031 198503 2 008','',0,'C');
//menampilkan output berupa halaman PDF
$pdf->Output();
?>
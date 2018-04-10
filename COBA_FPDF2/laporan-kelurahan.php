<?php
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

$dataTahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
$dataBulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
$tgl=date('d-m-Y');
$Tgl=": ".$tgl."";
//Queri untuk Menampilkan data
$query ="SELECT kelurahan.*, kecamatan.kd_kecamatan, kecamatan.nama_kecamatan FROM kelurahan
				LEFT JOIN kecamatan ON kelurahan.kd_kec=kecamatan.kd_kecamatan 
				ORDER BY kelurahan.kd_kelurahan ASC";
$db_query = mysql_query($query) or die("Query gagal".mysql_error());
//Variabel untuk iterasi
$i = 0;

//Mengambil nilai dari query database
while($data=mysql_fetch_row($db_query))
{
$cell[$i][0] = $data[0];
$cell[$i][1] = $data[1];
#$cell[$i][2] = $data[2];
$cell[$i][3] = $data[3];
$cell[$i][4] = $data[4];

$i++;
}
require('fpdf.php');

class PDF extends FPDF
{
//Fungsi Untuk Membuat Header
function Header()
{
   //Pilih font Arial bold 15
   $this->SetFont('Arial','B',15);
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
    $this->SetFont('Arial','',8);
    //Page number
    $this->Cell(0,10,'Halaman ke : '.$this->PageNo(),0,0,'C');
}
}

$pdf = new PDF('P','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont("Arial","B",10);


$pdf->Cell(0,0.5,'LAPORAN DATA PEGAWAI ',0,1,'C');
$pdf->Cell(0,0.5,'PT Coba Alias Test ',0,1,'C');

#==========================================
#$pdf->Cell(0,20, $toData, '0', 1, 'C');

#$pdf->Cell(0,20, $totalpinjaman, '0', 1, 'C');
$pdf->SetFont('Arial','','8');
#$pdf->Cell(25,6,'Total Data','',0,'L');
#$pdf->Cell(30,6,$toData,'','0','L');
#$pdf->Ln();



$pdf->Cell(2.5,0.5,'Tanggal Cetak','',0,'L');
$pdf->Cell(2,0.5,$Tgl,'','0','L');
$pdf->Ln();
$pdf->Ln();
#========================================

$pdf->SetFont("Arial","B",8);
#$pdf->SetFillColor(224,235,255);
#$fill=false;
$pdf->Cell(1,0.7,'No','LRTB',0,'C');
$pdf->Cell(4,0.7,'KD KELURAHAN','LRTB',0,'C');
$pdf->Cell(7.6,0.7,'NAMA KELURAHAN','LRTB',0,'C');
$pdf->Cell(6,0.7,'KELOMPOK KECAMATAN','LRTB',0,'C');

#$fill = !$fill;
$pdf->Ln();

$pdf->SetFont('Arial','',8);

for($j=0;$j<$i;$j++)
{



//menampilkan data dari hasil query database
$pdf->Cell(1,0.7,$j+1,'LTB',0,'L');
$pdf->Cell(4,0.7,$cell[$j][0],'LTB',0,'L');
#kodepegawai $pdf->Cell(2,0.7,$cell[$j][1],'LB',0,'L');
#$pdf->Cell(1.8,0.7,$cell[$j][7],'LBR',0,'L');
#$pdf->Cell(4.4,0.7,$cell[$j][8],'LBR',0,'L');
$pdf->Cell(7.6,0.7,$cell[$j][1],'LTB',0,'L');
#$pdf->Cell(2,0.7,$cell[$j][2],'LB',0,'L');
#$pdf->Cell(2,0.7,$cell[$j][3],'LB',0,'L');
$pdf->Cell(6,0.7,$cell[$j][4],'LBTR',0,'L');
#$pdf->Cell(2,0.7,$cell[$j][5],'LBR',0,'L');
$pdf->Ln();

}

//menampilkan output berupa halaman PDF
$pdf->Output();
?>
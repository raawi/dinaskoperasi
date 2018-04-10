<?php
$host ="localhost";
$user="root";
$password="";
$database="koperasi";
mysql_connect($host,$user,$password) or die("Koneksi server gagal");
mysql_select_db($database);
//Queri untuk Menampilkan data
$query ="SELECT * from bentuk_koperasi ORDER BY kd_bk ASC";
$db_query = mysql_query($query) or die("Query gagal");
//Variabel untuk iterasi
$i = 0;

//Mengambil nilai dari query database
while($data=mysql_fetch_row($db_query))
{
$cell[$i][0] = $data[0];
$cell[$i][1] = $data[1];
$cell[$i][2] = $data[2];
#$cell[$i][2] = $data[2];
#$cell[$i][3] = $data[3];
#$cell[$i][4] = $data[4];
#$cell[$i][5] = $data[5];
#$cell[$i][6] = $data[6];

#$cell[$i][7] = $data[7];
#$cell[$i][8] = $data[8];
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


$pdf->Cell(0,0.5,'LAPORAN DATA BNTUK KOPERASI ',0,1,'C');
$pdf->Cell(0,0.5,'DINAS KOPERASI DAN UMKM KOTA SEMARANG ',0,1,'C');
$pdf->Cell(0,0.5,' ',0,1,'C');

#==========================================

#========================================

$pdf->SetFont("Arial","B",8);
#$pdf->SetFillColor(224,235,255);
#$fill=false;
$pdf->Cell(1,0.7,'No','LRTB',0,'C');
$pdf->Cell(4,0.7,'Kode Bentuk Koperasi','LRTB',0,'C');
$pdf->Cell(4,0.7,'Nama Bentuk koperasi','LRTB',0,'L');
$pdf->Cell(10,0.7,'Kepanjangan','LRTB',0,'L');

#$fill = !$fill;
$pdf->Ln();

$pdf->SetFont('Arial','',8);
for($j=0;$j<$i;$j++)
{

//menampilkan data dari hasil query database
$pdf->Cell(1,0.7,$j+1,'LB',0,'C');
$pdf->Cell(4,0.7,$cell[$j][0],'LB',0,'L');
$pdf->Cell(4,0.7,$cell[$j][1],'LBR',0,'L');
$pdf->Cell(10,0.7,$cell[$j][2],'LBR',0,'L');
$pdf->Ln();
}

//menampilkan output berupa halaman PDF
$pdf->Output();
?>
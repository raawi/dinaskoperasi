<?php
define('FPDF_FONTPATH','fpdf17/font/');
require('fpdf17/fpdf.php');

class PDF extends FPDF
{
	//Page header
	function Header()
	{
		//Logo
		$this->Image('logo-ubl.jpg',10,8);
		//Arial bold 15
		$this->SetFont('Arial','B',10);
		//pindah ke posisi ke tengah untuk membuat judul
		$this->Cell(80);
		//judul
		$this->Cell(30,6,'LAPORAN DATA BNTUK KOPERASI',0,0,'C');
		$this->Ln();
		$this->Cell(80);
		$this->Cell(30,6,'DINAS KOPERASI DAN UMKM KOTA SEMARANG',0,0,'C');
		//pindah baris
		$this->Ln(15);
		$this->SetFont('Arial','',8);
		$this->Cell(10,7,'No','LRTB',0,'L');
		$this->Cell(40,7,'Kode Bentuk Koperasi','LRTB',0,'L');
		$this->Cell(40,7,'Nama Bentuk koperasi','LRTB',0,'L');
		$this->Cell(100,7,'Kepanjangan','LRTB',0,'L');

#$fill = !$fill;
$this->Ln();
		//buat garis horisontal
		$this->Line(10,25,200,25);
	}
	
	//Page Content
	function Content()
	{
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
$i++;
}
$this->SetFont("Arial","B",8);
#$pdf->SetFillColor(224,235,255);
#$fill=false;


$this->SetFont('Arial','',8);
for($j=0;$j<$i;$j++)
{

//menampilkan data dari hasil query database
$this->Cell(10,7,$j+1,'LB',0,'C');
$this->Cell(40,7,$cell[$j][0],'LB',0,'L');
$this->Cell(40,7,$cell[$j][1],'LBR',0,'L');
$this->Cell(100,7,$cell[$j][2],'LBR',0,'L');
$this->Ln();
}
	}

	//Page footer
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),200,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

//contoh pemanggilan class
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>

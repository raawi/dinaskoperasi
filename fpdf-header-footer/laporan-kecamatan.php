<?php
date_default_timezone_set("Asia/Jakarta");
define('FPDF_FONTPATH','fpdf17/font/');
require('fpdf17/fpdf.php');
$tgl=date('Y');
class PDF extends FPDF
{
	//Page header
	function Header()
	{
		//Logo
		$this->Image('logokop.png',10,8);
		//Arial bold 15
		$this->SetFont('Arial','B',14);
		//pindah ke posisi ke tengah untuk membuat judul
		$this->Cell(20);
		//judul
		$this->Cell(0,7,'LAPORAN DATA KECAMATAN KOTA SEMARANG',0,0,'L');
		$this->Ln();
		$this->Cell(20);
		$this->Cell(0,7,'DINAS KOPERASI DAN UMKM KOTA SEMARANG',0,0,'L');
		//pindah baris
		$this->Ln(20);
		$this->SetFont("Arial","B",8);
$this->SetFillColor(224,235,255);
$fill=false;
$this->Cell(8,7,'No','LRTB',0,'L');
$this->Cell(51,7,'Kode Kecamatan','LRTB',0,'L');
$this->Cell(137,7,'Nama Kecamatan','LRTB',0,'L');



#$fill = !$fill;
$this->Ln();
		//buat garis horisontal
		$this->Line(10,30,206,30);
		$this->Line(10,31,206,31);
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
$query ="SELECT * FROM kecamatan";
$db_query = mysql_query($query) or die("Query gagal");
//Variabel untuk iterasi
$i = 0;

//Mengambil nilai dari query database
while($data=mysql_fetch_row($db_query))
{$cell[$i][0] = $data[0];
$cell[$i][1] = $data[1];
$i++;
}
$tahun=date('Y');
$this->SetFont("Arial","B",8);
#$this->SetFillColor(224,235,255);
#$fill=false;


$this->SetFont('Arial','',8);
for($j=0;$j<$i;$j++)
{

//menampilkan data dari hasil query database
$this->Cell(8,7,$j+1,'LTB',0,'L');
$this->Cell(51,7,$cell[$j][0],'LTB',0,'L');
$this->Cell(137,7,$cell[$j][1],'LBTR',0,'L');
$this->Ln();

}
	}

	//Page footer
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		#$this->Line(10,$this->GetY(),346,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

//contoh pemanggilan class
$pdf = new PDF('P','mm','legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$namafile = 'Data Kecamatan '.$tgl.'.pdf';
$tujuan = 'I'; // D =donlot i=teruskan ke browser
$pdf->Output($namafile, $tujuan);
?>

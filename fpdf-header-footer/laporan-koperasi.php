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
		$this->Cell(0,7,'LAPORAN DATA BNTUK KOPERASI',0,0,'L');
		$this->Ln();
		$this->Cell(20);
		$this->Cell(0,7,'DINAS KOPERASI DAN UMKM KOTA SEMARANG',0,0,'L');
		//pindah baris
		$this->Ln(20);
		$this->SetFont("Arial","B",6);
$this->SetFillColor(224,235,255);
$fill=false;
$this->Cell(5,14,'No','LRTB',0,'C');
$this->Cell(51,14,'Nama Koperasi','LRTB',0,'C');
$this->Cell(60,07,'Badan Hukum','LRTB',0,'C');
$this->Cell(20,14,'Bentuk Koperasi','LRTB',0,'C');
$this->Cell(111,07,'Alamat','LRTB',0,'C');
$this->Cell(24,14,'Telp','LRTB',0,'C');
$this->Cell(35,14,'Nama Ketua','LRTB',0,'C');
$this->Cell(15,14,'J. Angg','LRTB',0,'C');
$this->Cell(15,14,'Status','LRTB',0,'C');
$this->Cell(0,07,'','',0,'C');

$fill = !$fill;
$this->Ln();
$this->Cell(5,7,'','',0,'C');
$this->Cell(51,7,'','',0,'C');
$this->Cell(42,7,'No Bh','LRTB',0,'C');
$this->Cell(18,7,'Tgl BH','LRTB',0,'C');
$this->Cell(20,7,'','',0,'C');
$this->Cell(53,7,'Jalan','LRTB',0,'C');
$this->Cell(28,7,'Kelurahan ','LRTB',0,'C');
$this->Cell(30,7,'Kecamatan','LRTB',0,'C');
$this->Cell(17,7,'','',0,'C');
$this->Cell(27,7,'','',0,'C');
$this->Cell(15,7,'','',0,'C');
$this->Cell(15,7,'','',0,'C');
$this->Cell(0,7,'','',0,'C');

#$fill = !$fill;
$this->Ln();
		//buat garis horisontal
		$this->Line(10,30,346,30);
		$this->Line(10,31,346,31);
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
$query ="SELECT data_koperasi.*, bentuk_koperasi.kd_bk, bentuk_koperasi.nama_bk, kecamatan.nama_kecamatan, kelurahan.nama_kelurahan FROM data_koperasi
				LEFT JOIN bentuk_koperasi ON data_koperasi.bentuk_koperasi=bentuk_koperasi.kd_bk 
				LEFT JOIN kecamatan ON data_koperasi.kecamatan=kecamatan.kd_kecamatan
				LEFT JOIN kelurahan ON data_koperasi.kelurahan=kelurahan.kd_kelurahan
				ORDER BY data_koperasi.kd_koperasi ASC";
$db_query = mysql_query($query) or die("Query gagal");
//Variabel untuk iterasi
$i = 0;

//Mengambil nilai dari query database
while($data=mysql_fetch_row($db_query))
{$cell[$i][1] = $data[1];
$cell[$i][2] = $data[2];
$cell[$i][3] = $data[3];
$cell[$i][4] = $data[4];
$cell[$i][6] = $data[6];
$cell[$i][7] = $data[7];
$cell[$i][8] = $data[8];
$cell[$i][9] = $data[9];
$cell[$i][10] = $data[10];
$cell[$i][11] = $data[11];
$cell[$i][12] = $data[12];
$cell[$i][14] = $data[14];
$cell[$i][15] = $data[15];
$cell[$i][16] = $data[16];
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
$this->Cell(5,7,$j+1,'LTB',0,'L');
$this->Cell(51,7,$cell[$j][1],'LTB',0,'L');
$this->Cell(42,7,$cell[$j][2],'LBTR',0,'L');
$this->Cell(18,7,$cell[$j][3],'LBTR',0,'L');

$this->Cell(20,7,$cell[$j][14],'LBTR',0,'L');
$this->Cell(53,7,$cell[$j][4],'LBTR',0,'L');
$this->Cell(28,7,$cell[$j][16],'LBTR',0,'L');
$this->Cell(30,7,$cell[$j][15],'LBTR',0,'L');
$this->Cell(24,7,$cell[$j][7],'LBTR',0,'L');
$this->Cell(35,7,$cell[$j][9],'LBTR',0,'L');
$this->Cell(15,7,$cell[$j][10],'LBTR',0,'L');
$this->Cell(15,7,$cell[$j][11],'LBTR',0,'L');
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
$pdf = new PDF('L','mm','legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$namafile = 'Data Koperasi Tahun '.$tgl.'.pdf';
$tujuan = 'I'; // D =donlot i=teruskan ke browser
$pdf->Output($namafile, $tujuan);
?>

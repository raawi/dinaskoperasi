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
include "../library/koneksi.php";
$queryAktif   = "SELECT COUNT(*) as totAktif FROM data_koperasi where status='Aktif'";
		$hasil  = mysql_query($queryAktif, $koneksidb);
		$data     = mysql_fetch_array($hasil);
		$jumDataA = $data['totAktif'];
	$totalDataA=": ".$jumDataA;
$queryTA   = "SELECT COUNT(*) as totTA FROM data_koperasi where status='Tidak Aktif'";
		$hasil  = mysql_query($queryTA, $koneksidb);
		$data     = mysql_fetch_array($hasil);
		$jumDataT = $data['totTA'];
	$totalDataT=": ".$jumDataT;
	
$querys   = "SELECT COUNT(*) as jumData FROM data_koperasi";
		$hasil  = mysql_query($querys, $koneksidb);
		$data     = mysql_fetch_array($hasil);
		$jumData = $data['jumData'];
	$totalData=": ".$jumData;
	
//Queri untuk Menampilkan data
$query ="SELECT data_koperasi.*, bentuk_koperasi.kd_bk, bentuk_koperasi.nama_bk, kecamatan.nama_kecamatan, kelurahan.nama_kelurahan FROM data_koperasi
				LEFT JOIN bentuk_koperasi ON data_koperasi.bentuk_koperasi=bentuk_koperasi.kd_bk 
				LEFT JOIN kecamatan ON data_koperasi.kecamatan=kecamatan.kd_kecamatan
				LEFT JOIN kelurahan ON data_koperasi.kelurahan=kelurahan.kd_kelurahan
				ORDER BY data_koperasi.kd_koperasi ASC";
$db_query = mysql_query($query) or die("Query gagal".mysql_error());
//Variabel untuk iterasi
$i = 0;

//Mengambil nilai dari query database
while($data=mysql_fetch_row($db_query))
{
$cell[$i][1] = $data[1];
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
    $this->SetY(20);
    //Arial italic 8
    $this->SetFont('Arial','',8);
    //Page number
    $this->Cell(0,1,'Halaman ke : '.$this->PageNo(),0,0,'C');
}
}

$pdf = new PDF('L','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont("Arial","B",10);

$tahun=date('Y');
$th="TAHUN  " .$tahun;
$pdf->Cell(0,0.5,'LAPORAN DATA KOPERASI ',0,1,'C');
$pdf->Cell(0,0.5,'DINAS KOPERASI DAN UMKM KOTA SEMARANG ' ,0,1,'C');
$pdf->Cell(0,0.5,$th ,0,1,'C');
$pdf->Ln();
#========================================

$pdf->SetFont("Arial","B",6);
$pdf->SetFillColor(224,235,255);
$fill=false;
$pdf->Cell(0.5,1.4,'No','LRTB',0,'C');
$pdf->Cell(4,1.4,'Nama Koperasi','LRTB',0,'C');
$pdf->Cell(4.5,0.7,'Badan Hukum','LRTB',0,'C');
$pdf->Cell(2,1.4,'Bentuk Koperasi','LRTB',0,'C');
$pdf->Cell(9.4,0.7,'Alamat','LRTB',0,'C');
$pdf->Cell(1.7,1.4,'Telp','LRTB',0,'C');
$pdf->Cell(2.7,1.4,'Nama Ketua','LRTB',0,'C');
$pdf->Cell(1.5,1.4,'J. Angg','LRTB',0,'C');
$pdf->Cell(1.5,1.4,'Status','LRTB',0,'C');
$pdf->Cell(0,0.7,'','',0,'C');

$fill = !$fill;
$pdf->Ln();
$pdf->Cell(0.5,0.7,'','',0,'C');
$pdf->Cell(4,0.7,'','',0,'C');
$pdf->Cell(3,0.7,'No Bh','LRTB',0,'C');
$pdf->Cell(1.5,0.7,'Tgl BH','LRTB',0,'C');
$pdf->Cell(2,0.7,'','',0,'C');
$pdf->Cell(3.8,0.7,'Jalan','LRTB',0,'C');
$pdf->Cell(2.8,0.7,'Kelurahan ','LRTB',0,'C');
$pdf->Cell(2.8,0.7,'Kecamatan','LRTB',0,'C');
$pdf->Cell(1.7,0.7,'','',0,'C');
$pdf->Cell(2.7,0.7,'','',0,'C');
$pdf->Cell(1.5,0.7,'','',0,'C');
$pdf->Cell(1.5,0.7,'','',0,'C');
$pdf->Cell(0,0.7,'','',0,'C');

$fill = !$fill;
$pdf->Ln();

$pdf->SetFont('Arial','',6);

for($j=0;$j<$i;$j++)
{



//menampilkan data dari hasil query database
$pdf->Cell(0.5,0.7,$j+1,'LTB',0,'L');
$pdf->Cell(4,0.7,$cell[$j][1],'LTB',0,'L');
$pdf->Cell(3,0.7,$cell[$j][2],'LBTR',0,'L');
$pdf->Cell(1.5,0.7,$cell[$j][3],'LBTR',0,'L');

$pdf->Cell(2,0.7,$cell[$j][14],'LBTR',0,'L');
$pdf->Cell(3.8,0.7,$cell[$j][4],'LBTR',0,'L');
$pdf->Cell(2.8,0.7,$cell[$j][16],'LBTR',0,'L');
$pdf->Cell(2.8,0.7,$cell[$j][15],'LBTR',0,'L');
$pdf->Cell(1.7,0.7,$cell[$j][7],'LBTR',0,'L');
$pdf->Cell(2.7,0.7,$cell[$j][9],'LBTR',0,'L');
$pdf->Cell(1.5,0.7,$cell[$j][10],'LBTR',0,'L');
$pdf->Cell(1.5,0.7,$cell[$j][11],'LBTR',0,'L');
$pdf->Ln();

}

#==========================================
#$pdf->Cell(0,20, $toData, '0', 1, 'C');

#$pdf->Cell(0,20, $totalpinjaman, '0', 1, 'C');

$pdf->SetFont('Arial','','8');
$pdf->Ln();
$pdf->Cell(3.7,0.5,'Jumlah Koperasi Aktif','',0,'L');
$pdf->Cell(2,0.5,$totalDataA,'','0','L');
$pdf->Ln();

$pdf->Cell(3.7,0.5,'Jumlah Koperasi Tidak Aktif','',0,'L');
$pdf->Cell(2,0.5,$totalDataT,'','0','L');
$pdf->Ln();

$pdf->Cell(3.7,0.5,'Total Koperasi','',0,'L');
$pdf->Cell(2,0.5,$totalData,'','0','L');
$pdf->Ln();

$pdf->Cell(3.7,0.5,'Tanggal Cetak','',0,'L');
$pdf->Cell(2,0.5,$Tgl,'','0','L');
$pdf->Ln();
$pdf->Ln();

//menampilkan output berupa halaman PDF
$pdf->Output();
?>
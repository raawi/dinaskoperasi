<?php
if($_GET) {
	switch ($_GET['page']){	
		case '' :				
			if(!file_exists ("dashboard.php")) die (include "404.php"); 
			include "dashboard.php";
		break;
		case 'HalamanUtama' :				
			if(!file_exists ("dashboard.php")) die ("Sorry Empty Page!"); 
			include "dashboard.php";						
		break;
		
		case 'User-Add' :				
			if(!file_exists ("user.php")) die (include "404.php"); 
			include "user.php";
		break;
		case 'User-Edit' :				
			if(!file_exists ("user-edit.php")) die (include "404.php"); 
			include "user-edit.php";
		break;
		
		case 'Kecamatan-Add' :				
			if(!file_exists ("kecamatan.php")) die (include "404.php"); 
			include "kecamatan.php";
		break;
		case 'Kecamatan-Delete' :				
			if(!file_exists ("kecamatan-delete.php")) die (include "404.php"); 
			include "kecamatan-delete.php";
		break;	
		case 'Kecamatan-Edit' :				
			if(!file_exists ("kecamatan-edit.php")) die (include "404.php"); 
			include "kecamatan-edit.php";
		break;	
		case 'Kecamatan-Laporan' :				
			if(!file_exists ("kecamatan-laporan.php")) die (include "404.php"); 
			include "kecamatan-laporan.php";
		break;
		case 'Kecamatan-Laporan-Cetak' :				
			if(!file_exists ("kecamatan-laporan-cetak.php")) die (include "404.php"); 
			include "kecamatan-laporan-cetak.php";
		break;	
		
		
		case 'Kelurahan-Add' :				
			if(!file_exists ("kelurahan.php")) die (include "404.php"); 
			include "kelurahan.php";
		break;
		case 'Kelurahan-Delete' :				
			if(!file_exists ("kelurahan-delete.php")) die (include "404.php"); 
			include "kelurahan-delete.php";
		break;
		case 'Kelurahan-Edit' :				
			if(!file_exists ("kelurahan-edit.php")) die (include "404.php"); 
			include "kelurahan-edit.php";
		break;
		case 'Kelurahan-Laporan' :				
			if(!file_exists ("kelurahan-laporan.php")) die (include "404.php"); 
			include "kelurahan-laporan.php";
		break;
		
		
		case 'Bentuk-Koperasi' :				
			if(!file_exists ("bentuk-koperasi-data.php")) die (include "404.php"); 
			include "bentuk-koperasi-data.php";
		break;
		case 'Bentuk-Koperasi-Delete' :				
			if(!file_exists ("bentuk-koperasi-delete.php")) die (include "404.php"); 
			include "bentuk-koperasi-delete.php";
		break;
		case 'Bentuk-Koperasi-Edit' :				
			if(!file_exists ("bentuk-koperasi-edit.php")) die (include "404.php"); 
			include "bentuk-koperasi-edit.php";
		break;
		case 'Bentuk-Koperasi-Laporan' :				
			if(!file_exists ("bentuk-koperasi-laporan.php")) die (include "404.php"); 
			include "bentuk-koperasi-laporan.php";
		break;
		
		case 'Koperasi-Data' :				
			if(!file_exists ("koperasi-data.php")) die (include "404.php"); 
			include "koperasi-data.php";
		break;
		case 'Koperasi-Add' :				
			if(!file_exists ("koperasi.php")) die (include "404.php"); 
			include "koperasi.php";
		break;
		case 'Koperasi-Delete' :				
			if(!file_exists ("koperasi-delete.php")) die (include "404.php"); 
			include "koperasi-delete.php";
		break;
		case 'Koperasi-Edit' :				
			if(!file_exists ("koperasi-edit.php")) die (include "404.php"); 
			include "koperasi-edit.php";
		break;
		case 'Koperasi-Laporan' :				
			if(!file_exists ("koperasi-laporan.php")) die (include "404.php"); 
			include "koperasi-laporan.php";
		break;
		
		case 'Hasil-Penilaian-Add' :				
			if(!file_exists ("hasil-penilaian.php")) die (include "404.php"); 
			include "hasil-penilaian.php";
		break;
		case 'Hasil-Penilaian-Delete' :				
			if(!file_exists ("hasil-penilaian-delete.php")) die (include "404.php"); 
			include "hasil-penilaian-delete.php";
		break;
		case 'Data-Hasil-Penilaian' :				
			if(!file_exists ("hasil-penilaian-data.php")) die (include "404.php"); 
			include "hasil-penilaian-data.php";
		break;
		case 'Koreksi-Penilaian' :				
			if(!file_exists ("hasil-penilaian-koreksi.php")) die (include "404.php"); 
			include "hasil-penilaian-koreksi.php";
		break;
		case 'Detail-Hasil-Penilaian' :				
			if(!file_exists ("hasil-penilaian-detail.php")) die (mysql_error()); 
			include "hasil-penilaian-detail.php";
		break;
		
		case 'Penilaian-Cetak' :				
			if(!file_exists ("COBA_FPDF2/sertifikat.php")) die (include "404.php"); 
			include "COBA_FPDF2/sertifikat.php";
		break;
		
		case 'Manajemen-Add' :				
			if(!file_exists ("manajemen.php")) die (include "404.php"); 
			include "manajemen.php";
		break;
		
		case 'Penilai' :				
			if(!file_exists ("penilai-data.php")) die (include "404.php"); 
			include "penilai-data.php";
		break;
		case 'Penilai-Delete' :				
			if(!file_exists ("penilai-delete.php")) die (include "404.php"); 
			include "penilai-delete.php";
		break;
		
		case 'Logout' :				
			if(!file_exists ("logout.php")) die (include "404.php"); 
			include "logout.php";
		break;
		
				
		default:
			if(!file_exists ("dashboard.php")) die (include "404.php"); 
			include "dashboard.php";						
		break;
	}
}
?>
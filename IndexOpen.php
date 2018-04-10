<?php 
if($_GET){
	switch ($_GET['page']){				
		case '' :			
			if(!file_exists ("dashboard.php")) die (include "404.php"); 
			include "dashboard.php";						
		break;
		case 'dashboard' :				
			if(!file_exists ("dashboard.php")) die (include "404.php"); 
			include "dashboard.php";						
		break;
		case 'Supplier' :				
			if(!file_exists ("Supplier.php")) die (include "404.php"); 
			include "Supplier.php";						
		break;
		case 'data' :				
			if(!file_exists ("data.php")) die (include "404.php"); 
			include "data.php";						
		break;
		break;
		case 'TypeMotor' :				
			if(!file_exists ("TypeMotor.php")) die (include "404.php"); 
			include "TypeMotor.php";						
		break;
		case 'User' :				
			if(!file_exists ("User.php")) die (include "404.php"); 
			include "User.php";						
		break;
		case 'Merk' :				
			if(!file_exists ("MerkMotor.php")) die (include "404.php"); 
			include "MerkMotor.php";						
		break;
		case 'GroupParts' :				
			if(!file_exists ("GroupParts.php")) die (include "404.php"); 
			include "GroupParts.php";						
		break;
		case 'SubGroupParts' :				
			if(!file_exists ("SubGroupParts.php")) die (include "404.php"); 
			include "SubGroupParts.php";						
		break;
		case 'Parts' :				
			if(!file_exists ("Parts.php")) die (include "404.php"); 
			include "Parts.php";						
		break;
		case 'PartsUpdate' :				
			if(!file_exists ("PartsUpdate.php")) die (include "404.php"); 
			include "PartsUpdate.php";						
		break;
		case 'Mekanik' :				
			if(!file_exists ("Mekanik.php")) die (include "404.php"); 
			include "Mekanik.php";						
		break;
		case 'Pelanggan' :				
			if(!file_exists ("Pelanggan.php")) die (include "404.php"); 
			include "Pelanggan.php";						
		break;
		case 'Jabatan' :				
			if(!file_exists ("Jabatan.php")) die (include "404.php"); 
			include "Jabatan.php";						
		break;
		case 'Pegawai' :				
			if(!file_exists ("Pegawai.php")) die (include "404.php"); 
			include "Pegawai.php";						
		break;
		case 'Motor' :				
			if(!file_exists ("Motor.php")) die (include "404.php"); 
			include "Motor.php";						
		break;
		case 'JasaService' :				
			if(!file_exists ("JasaService.php")) die (include "404.php"); 
			include "JasaService.php";						
		break;
		case 'WorkOrder' :				
			if(!file_exists ("WorkOrder.php")) die (include "404.php"); 
			include "WorkOrder.php";						
		break;
		case 'WorkOrderDataPage' :				
			if(!file_exists ("WorkOrderDataPage.php")) die (include "404.php"); 
			include "WorkOrderDataPage.php";						
		break;
		case 'LapTypeMotor' :				
			if(!file_exists ("LapTypeMotor.php")) die (include "404.php"); 
			include "LapTypeMotor.php";						
		break;
		default :
			echo include "404.php";
		break;
	}
}
?>
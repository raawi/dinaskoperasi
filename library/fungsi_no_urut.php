<?php function buatpenilaian($tabel, $inisial){
				$th_buku=date('Y')-1;
				$struktur	= mysql_query("SELECT * FROM $tabel ");
				$field		= mysql_field_name($struktur,0);
				$panjang	= mysql_field_len($struktur,0);
				$panjang	= mysql_field_len($struktur,0);
		#$querNP = "SELECT max(thbuku) AS last FROM score WHERE thbuku LIKE '$th_buku%'";
				$querNP = "SELECT MAX(".$field.") FROM ".$tabel." Where thbuku like '$th_buku'";
				$results = mysql_query($querNP)or die(mysql_error());
				$data  = mysql_fetch_array($results)or die(mysql_error());
				
				#$lastNo = $data['last'];
				if ($data[0]=="") {
				$angka=0;				$lastNoPenilaian = $angka;
				$nextNoPenilaian = $lastNoPenilaian + 1;
				}
				else {
				$angka		= substr($data[0], strlen($inisial));
				$lastNoPenilaian = $angka;
				$nextNoPenilaian = $lastNoPenilaian + 1;
				}
				$angka++;
				$angka	=strval($angka); 
				$tmp	="";
				for($i=1; $i<=($panjang-strlen($inisial)-strlen($nextNoPenilaian)); $i++) {
				$tmp=$tmp."0";}	return $inisial.$tmp.$nextNoPenilaian;}
?>
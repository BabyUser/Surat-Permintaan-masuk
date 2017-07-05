<form method="post" action="" enctype="multipart/form-data">
	<input id="excel" type="file" name="excel" >
	<input type="submit" name="submit" value="import">
</form>
<?php 
include "../koneksi/conn.php";
include "../Classes/PHPExcel.php";
include "../Classes/PHPExcel/IOFactory.php";
// $var = $_POST['submit'];

// $file = $_FILES['excel']['tmp_name'];
// $load = PHPExcel_IOFactory::load($file);
// $sheets = $load->getActiveSheet()->toArray(null,true,true,true);

// $i = 1;
// foreach ($sheets as $sheet) {
// 	if ($i > 1) {
// 		// $sql = 'INSERT INTO excel VALUES';
// 		// $sql = 'nama="'.$sheet['A'].'",';
// 		// $sql = 'sertifikat="'.$sheet['B'].'"';
// 		// mysql_query($sql);
// 		$sql = $db->query("INSERT INTO excel VALUES ('','$sheet['A']','123','','')");
// 	}

// 	$i++;
// }

// if ($i >= 2) {
// 	echo "<h1>Berhasil</h1>";
// }
	
if (isset($_POST['submit'])) {
	$uploaddir   = '/var/www/uploads/';
	$tmpfname 	 = $uploaddir . basename($_FILES['excel']['tmp_name']);
	$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
	$excelObj	 = $excelReader->load($tmpfname);
	$workSheet	 = $excelObj->getActiveSheet();
	// $workSheet	 = $excelObj->getSheet(0);
	$lastRow	 = $workSheet->getHighestRow();

	echo "<table>";
	for ($row= 2; $row <= $lastRow ; $row++) { 
		echo "<tr><td>";
		$h  = $workSheet->getCell('A'.$row)->getValue();
		echo $h;
		echo "</td><td>";
		$ha = $workSheet->getCell('C'.$row)->getValue();
		echo $ha;
		echo "</td></tr>";

		// $query = $db->query("INSERT INTO excel VALUES('','$h','','','')");
	}
	echo "</table>";
}


?>
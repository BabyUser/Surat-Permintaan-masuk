<?php 
include "koneksi/conn.php";
include "excelreader/excel_reader.php";


$target = basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $target);

	//mencegah error
	chmod($_FILES['file']['name'], 0777);

	$data = NEW Spreadsheet_Excel_Reader($_FILES['file']['name'], false);

	//menghitung jumlah baris
	$baris = $data->rowCount($sheet_index=0);

	//jika centang
	$drop = isset( $_POST['drop']) ? $_POST['drop'] : 0;
	if ($drop == 1) {
		//kosongkan table
		$truncate = $db->query("TRUNCATE TABLE excel");
	};

	//import data excel
	for ($i=2; $i < $baris ; $i++) { 
		//membaca data
		$nama		= $data->val($i, 1);
		$sertifikat	= $data->val($i, 2);
		$expired	= $data->val($i, 3);
		$produk		= $data->val($i, 4);

	//setelah dibaca
	$query = $db->prepare("INSERT INTO excel VALUES ('','$nama','$sertifikat','$expired','$produk')");
	$hasil = $query->execute();

	}

	if (!$hasil) {
		$result['message']="gagal import";
	} else {
		$result['message']="berhasil import";
	}
 
 ?>

 <form name="myForm" id="myForm"  onSubmit="">
 	<input type="file" name="file" id="file">
 	<input type="submit" name="submit" value="import"><br>
 	<label><input type="checkbox" name="drop" value="1"><u>kosongkan tabel</u></label>
 </form>
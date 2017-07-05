<?php 
include "../koneksi/conn.php";
@$id = $_POST['id'];
@$naam = "asd";

if ($id) {
	$sql = $db->prepare("SELECT id_perusahaan, nama_perusahaan FROM perusahaan WHERE id_perusahaan = ?");
	$sql->bindparam(1, $id);
	$sql->execute();
	$fet = $sql->fetch(PDO::FETCH_ASSOC);

	$result['message'] = $fet['nama_perusahaan'];	
} elseif ($naam) {
	echo "string";
}

echo json_encode($result);
 ?>
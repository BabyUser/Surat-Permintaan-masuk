<?php
include "../koneksi/conn.php";
$nama = $_POST['perusahaan'];
$sertifikat = $_POST['sertifikat'];
$olahan = $_POST['olahan'];
$produks = $_POST['produk'];
$result['message'] = "";

// $produk = explode(", ",$produks);
$sql		= $db->prepare("SELECT * FROM perusahaan WHERE no_sertifikat_halal = '$sertifikat'");
$sql->execute();
$cek		= $sql->fetch(PDO::FETCH_ASSOC);
$halal  = $cek['no_sertifikat_halal'];	
$id			= $cek['id_perusahaan'];
if ($halal == $sertifikat) {
	foreach (explode(',', $produks) as $produk) {
			$db->query("INSERT INTO produks VALUES ('','$id','$produk','$olahan')");
	}
	$result['message'] = "Data Berhasil Di simpan!";
} else {
	$query	= $db->prepare("INSERT INTO perusahaan VALUES('','$nama','$sertifikat')");
	$query->execute();
	$query1	=	$db->prepare("SELECT * FROM perusahaan WHERE no_sertifikat_halal = '$sertifikat'");
	$query1->execute();
	$cek1		= $query1->fetch(PDO::FETCH_ASSOC);
	$halal1	= $cek1['no_sertifikat_halal'];
	$id			= $cek1['id_perusahaan'];

		if ($halal1 == $sertifikat) {
			foreach (explode(',', $produks) as $produk) {
					$db->query("INSERT INTO produks VALUES ('','$id','$produk','$olahan')");
			}
			$result['message'] = "Data Berhasil Di simpan!2";
		}

}

echo json_encode($result);
 ?>

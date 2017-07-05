
		<?php
		include "../koneksi/conn.php";
		$nama = $_POST['perusahaan'];
		$sertifikat = $_POST['sertifikat'];
		// $expired = $_POST['expired'];
		$produks = $_POST['produk'];
		// // $produk = explode(", ",$produks);
		$sql = $db->prepare("SELECT * FROM perusahaan");
		$sql->execute();
		$fet = $sql->fetch(PDO::FETCH_ASSOC);
		$id  = $fet['id_perusahaan'];
		$name = $fet['nama_perusahaan'];
		$no = $fet['no_sertifikat_halal'];

		if ($no == $sertifikat) {
		 foreach (explode(',', $produks) as $produk) {
				 $db->query("INSERT INTO produks VALUES ('','$id','$produk')");
		 }
		 $result['message'] = "Data berhasil di simpan!";
		} elseif ($no != $sertifikat) {
		 $query = $db->prepare("INSERT INTO perusahaan VALUES ('','$nama','$sertifikat')");
		 $query->execute();
		 $sql1 = $db->prepare("SELECT id_perusahaan, nama_perusahaan FROM perusahaan WHERE nama_perusahaan = ?");
		 $sql1->bindparam(1, $nama, PDO::PARAM_STR);
		 $sql1->execute();
		 $fet = $sql1->fetch(PDO::FETCH_ASSOC);
		 $id  = $fet['id_perusahaan'];
		 $cek = $sql1->rowCount();

		 if ($cek == 1) {
			 foreach (explode(',', $produks) as $produk) {
					 $db->query("INSERT INTO produks VALUES ('','$id','$produk')");
			 }
			 $result['message'] = "Data berhasil di simpan!";
		 }
		}

		echo json_encode($result);
		// <!-- $result['message'] = "Data berhasil di simpan!";
		// foreach (explode(', ', $produks) as $produk) {
		//     $db->query("INSERT INTO produks VALUES ('$nama','$sertifikat','$expired','$produk')");
		// } -->
		?>

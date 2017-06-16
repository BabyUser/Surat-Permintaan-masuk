<?php
$nama = $_POST['perusahaan'];
$sertifikat = $_POST['sertifikat'];
$expired = $_POST['expired'];
$produks = $_POST['produk'];
$result['message'] = "";

if ($nama == "") {
  $result['message'] = "Nama perusahaan tidak boleh kosong";
}
else if ($sertifikat == "") {
  $result['message'] = "Nomer Sertfikat tidak boleh kosong";
}
else if ($expired == "") {
  $result['message'] = "Tanggal tidak boleh kosong";
}
else if ($produks == "") {
  $result['message'] = "Produk tidak boleh kosong";
}
else {
  $result['message'] = "true";
}

echo json_encode($result);

 ?>

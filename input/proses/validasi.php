<?php
$nama = $_POST['perusahaan'];
$sertifikat = $_POST['sertifikat'];
$produks = $_POST['produk'];
$olahan = $_POST['olahan'];
$result['message'] = "";
if ($nama == "") {
  $result['message'] = "Nama perusahaan tidak boleh kosong";
}
else if ($sertifikat == "") {
  $result['message'] = "Nomer Sertfikat tidak boleh kosong";
}
elseif ($olahan == "null") {
  $result['message'] = "Kategori Olahan tidak boleh kosong";
}
else if ($produks == "") {
  $result['message'] = "Produk tidak boleh kosong";
}
else {
  $result['message'] = "true";
}

echo json_encode($result);

 ?>

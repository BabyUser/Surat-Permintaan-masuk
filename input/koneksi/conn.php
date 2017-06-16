<?php

try {
  // buat koneksi dengan database
  $db = new PDO('mysql:host=localhost;dbname=input', "root", "");

  // set error mode
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $e) {
  // tampilkan pesan kesalahan jika koneksi gagal
  print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
  die();
}

 ?>

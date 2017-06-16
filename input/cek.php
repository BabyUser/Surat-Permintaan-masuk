<!DOCTYPE html>
<html>
<head>
	<title>CEK..!</title>
	<link rel="stylesheet" href="css/materialize.css">
	<style type="text/css">
		.card {
        padding: 25px;
        margin-top:2.5%;
      }
      body {
        background-color: #eee;
      }
      h3 {
        font-weight: 200;
      }
      #toast-container {
        top: auto !important;
        right: auto !important;
        bottom: 50%;
        left:40%;
      }
	</style>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="row">
				<div class="col s12">
					<ul class="tabs">
				        <li class="tab col s6"><a class="active" href="#test1">Test 1</a></li>
				        <li class="tab col s6"><a href="#test2">Test 2</a></li>
				    </ul>
				</div>
				<div id="test1" class="col s12">Test 1</div>
    			<div id="test2" class="col s12">Test 2</div>
			</div>
			<table class="highlight">
				<thead>
					<tr>
						<th>Id Perusahaan</th>
						<th>Nama Perusahaan</th>
						<th>Sertifikat</th>
						<th>Expired Sertifikat</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				include "koneksi/conn.php";

				$sql = $db->prepare("SELECT * FROM perusahaan");
				$sql->execute();
				while ($fet = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
						<td><?php echo $fet['id_perusahaan'] ?></td>
						<td><?php echo $fet['nama_perusahaan'] ?></td>
						<td><?php echo $fet['sertifikat'] ?></td>
						<td><?php echo $fet['expired_sertifikat'] ?></td>
					</tr>
					<?php
				}
				 ?>
				</tbody>
			</table>
		</div>
	</div>


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
</body>
</html>
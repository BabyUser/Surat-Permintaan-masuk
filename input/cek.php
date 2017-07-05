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
					<ul class="tabs truncate">
				        <li class="tab col s5"><a class="active" href="#test1">company</a></li>
				        <li class="tab col s6"><a href="#test2">Produks</a></li>
				    </ul>
				</div>
				<div id="test1" class="col s12">
					<table class="highlight responsive-table centered">
						<thead>
							<tr>
								<th>Id Perusahaan</th>
								<th>Nama Perusahaan</th>
								<th>No. Sertifikat Halal</th>
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
								<td><?php echo $fet['no_sertifikat_halal'] ?></td>
							</tr>
							<?php
						}
						 ?>
						</tbody>
					</table>
				</div>
    			<div id="test2" class="col s12">
    				<table class="highlight responsive-table centered">
						<thead>
							<tr>
								<th>Id Produk</th>
								<th>id Perusahaan</th>
								<th>Produk</th>
								<th>Olahan</th>
							</tr>
						</thead>
						<tbody>
						<?php
						include "koneksi/conn.php";

						$sql = $db->prepare("SELECT * FROM produks ORDER BY id_produk DESC");
						$sql->execute();
						while ($fet = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
							<tr>
								<td><?php echo $fet['id_produk'] ?></td>
								<td class="blue-text" name="perusahaan" id="<?php echo $fet['id_perusahaan'] ?>"><?php echo $fet['id_perusahaan'] ?></td>
								<td><?php echo $fet['produk'] ?></td>
								<td><?php echo $fet['kelompok'] ?></td>
							</tr>
							<?php
						}
						 ?>
						</tbody>
					</table>
    			</div>
			</div>
		</div>
	</div>
	<div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li><a href="index.html" class="btn-floating red"><i class="material-icons">reply</i></a></li>
    </ul>
  </div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("[name = 'perusahaan']").click(function(){
				var id = $(this).attr('id');

				$.ajax({
					type	: "POST",
					data	: "id="+id,
					url		: "proses/validasi_cek.php",
					success: function(data){
						var resultObj = JSON.parse(data);
         				Materialize.toast(resultObj.message, 4000);
					}
				});
			});
		});
	</script>
</body>
</html>

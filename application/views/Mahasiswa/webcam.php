<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Selamat Datang, Mahasiswa Baru JTK <?php echo date('Y'); ?>!</title>

	<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
	<?php echo link_tag('assets/css/style.css'); ?>

	<style>
	.jumbotron {
		padding: 20px 0;
	}
	.jumbotron h1 {
		margin: 0;
		font-size: 2em;
		letter-spacing: 0px;
	}
	.jumbotron h1 small {
		color: #fff;
	}
	</style>
</head>
<body>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1>Satu langkah terakhir! <small>Foto untuk database mahasiswa baru</small></h1>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p class="lead"><strong>Data Anda belum tersimpan!</strong> Pastikan Anda berfoto sebelum data tersimpan.</p>

			<div id="webcam" style="height: 240px; width: 320px; box-shadow: 0 0 5px #000; margin: 0 auto 1em;">

			</div>

			<?php echo form_open('', array('id' => 'webcamForm')); ?>
				<input id="webcamData" type="hidden" name="webcam_data" value="" />
			<?php echo form_close(); ?>

			<p align="center">
				<a id="submit" class="btn btn-primary">Say cheese!</a>
			</p>

			<table class="table table-bordered">
				<tr>
					<th>Nama Lengkap</th>
					<td><?php echo $mahasiswa->nama_lengkap; ?></td>
				</tr>
				<tr>
					<th>Asal Sekolah</th>
					<td><?php echo $mahasiswa->asal_sekolah; ?></td>
				</tr>
				<tr>
					<th>Waktu Input Data</th>
					<td><?php echo $mahasiswa->created_at; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/webcam.js'); ?>"></script>

<script>
$(document).ready(function() {

	Webcam.set({
		dest_width: 640,
		dest_height: 480
	});

	Webcam.attach('#webcam');

	$('#submit').click(function() {
		Webcam.snap(function(data_uri) {
			var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

			document.getElementById('webcamData').value = raw_image_data;
			document.getElementById('webcamForm').submit();
		});
	});

});
</script>

</body>
</html>
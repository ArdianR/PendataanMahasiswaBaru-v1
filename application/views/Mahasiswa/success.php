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

	<style type="text/css">
	html {
		min-height: 100%;
		background:
			radial-gradient(transparent, black),
			url('<?php echo base_url('assets/img/pendopo_polban.jpg'); ?>') no-repeat;
		background-size: cover;
		background-position: center bottom;
		color: #fff;
		text-shadow: 0 0 5px #000;
	}
	body {
		color: #fff;
	}
	p {
		font-size: 1.3em;
	}
	.page-header {
		box-shadow: 0 4px 2px -2px #000;
	}
	.page-header h1 small {
		color: #ddd;
	}
	#box {
		position: absolute;
		bottom: 0;
		right: 0;
		margin: 1em 2em;
	}
	</style>

	<meta http-equiv="refresh" content="10; url=<?php echo base_url(); ?>">
</head>
<body class="bg-pendopo">

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			
		</div>
	</div>
</div>

<div id="box" class="col-md-6 col-sm-7">
	<div class="page-header">
		<h1>Oke! <small>Pengisian biodata selesai \(^o^)/</small></h1>
	</div>
	<p>Terima kasih sudah mengisi biodatamu di halaman ini!</p>
	<p>Sekali lagi kami ucapkan, selamat datang di keluarga besar Jurusan Teknik Komputer dan Informatika!</p>
	<p><i>See you later!</i></p>
	<p class="next-step">Silakan ikuti panduan selanjutnya dari kakak tingkatmu mengenai aktivitas selanjutnya di tempat ini. (Tidak lama, kok! Janji :D)</p>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js'); ?>"></script>

</body>
</html>
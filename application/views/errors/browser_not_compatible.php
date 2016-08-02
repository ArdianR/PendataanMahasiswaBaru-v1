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
</head>
<body>

<div class="container">
	<div class="col-md-12">
		<?php if (ENVIRONMENT == 'cli-server') : ?>
			<h1>Aplikasi ini berjalan di mode lokal, dan hanya dapat dignakan dengan Google Chrome.</h1>
			<h4>Menggunakan Google Chrome di mode lokal membantu pengaktifan webcam yang lebih baik.</h4>
		<?php else : ?>
			<h1>Aplikasi ini berjalan di mode server, dan tidak dapat digunakan di browser Google Chrome.</h1>
			<h3>Cobalah menggunakan Mozilla Firefox atau Microsoft Edge.</h3>
			<h4>Google Chrome tidak support mengaktifkan webcam tanpa HTTPS.</h4>
		<?php endif; ?>
	</div>
</div>

</body>
</html>
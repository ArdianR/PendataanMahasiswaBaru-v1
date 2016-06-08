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

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1>Selamat datang, JTK <?php echo date('Y'); ?>!</h1>
				<p>Selamat datang di keluarga besar Jurusan Teknik Komputer dan Informatika!</p>
			</div>
		</div>
	</div>
</div>

<?php

$attrLabel = array(
		'class' => 'col-md-4 control-label'
	);
$attrInputNotRequired = array(
		'class' => 'form-control',
		'autocomplete' => 'off'
	);
$attrInput = array_merge($attrInputNotRequired, array('required' => ''));

?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p class="lead">Untuk keperluan pendataan, mohon dapat mengisi formulir berikut dengan sebenar-benarnya. Pastikan menggunakan ejaan yang benar dalam mengisi formulir.</p>

			<?php echo form_open('', array('class' => 'form-horizontal')); ?>

				<div class="form-group">
					<?php echo form_label('Nama lengkap', 'inputNamaLengkap', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputNamaLengkap',
								'name' => 'nama_lengkap',
								'placeholder' => 'Nama lengkap',
								'autofocus' => ''
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Nama panggilan', 'inputNamaPanggilan', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputNamaPanggilan',
								'name' => 'nama_panggilan',
								'placeholder' => 'Nama panggilan'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Jenis kelamin', 'inputJenisKelamin', $attrLabel); ?>
					<div class="col-md-8">
						<?php foreach($kv_jenis_kelamin as $k => $v) : ?>
						<div class="radio">
							<label>
								<?php echo form_radio('jenis_kelamin', $k, FALSE, array(
									'required' => ''
								)); ?> <?php echo $v; ?>
							</label>
						</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Program studi', 'inputProgramStudi', $attrLabel); ?>
					<div class="col-md-8">
						<?php foreach($kv_program_studi as $k => $v) : ?>
						<div class="radio">
							<label>
								<?php echo form_radio('program_studi', $k, FALSE, array(
									'required' => ''
								)); ?> <?php echo $v; ?>
							</label>
						</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Jalur masuk', 'inputJalurMasuk', $attrLabel); ?>
					<div class="col-md-8">
						<?php foreach($kv_jalur_masuk as $k => $v) : ?>
						<div class="radio">
							<label>
								<?php echo form_radio('jalur_masuk', $k, FALSE, array(
									'required' => ''
								)); ?> <?php echo $v; ?>
							</label>
						</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Tempat dan tanggal lahir', 'inputTempatLahir', $attrLabel); ?>
					<div class="col-md-4">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputTempatLahir',
								'name' => 'tempat_lahir',
								'placeholder' => 'Tempat lahir'
							))); ?>
					</div>
					<div class="col-md-4">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputTanggalLahir',
								'name' => 'tanggal_lahir',
								'placeholder' => 'Tanggal lahir (format: yyyy-mm-dd)',
								'type' => 'date'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Agama', 'inputAgama', $attrLabel); ?>
					<div class="col-md-8">
						<?php foreach($kv_agama as $k => $v) : ?>
						<div class="radio">
							<label>
								<?php echo form_radio('agama', $k, FALSE, array(
									'required' => ''
								)); ?> <?php echo $v; ?>
							</label>
						</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Alamat asal', 'inputAlamatAsal', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputAlamatAsal',
								'name' => 'alamat_asal',
								'placeholder' => 'Alamat asal'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Alamat sekarang', 'inputAlamatSekarang', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputAlamatSekarang',
								'name' => 'alamat_sekarang',
								'placeholder' => 'Alamat sekarang'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Asal sekolah', 'inputAsalSekolah', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputAsalSekolah',
								'name' => 'asal_sekolah',
								'placeholder' => 'Asal sekolah'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Jurusan asal', 'inputJurusanAsal', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputJurusanAsal',
								'name' => 'jurusan_asal',
								'placeholder' => 'Jurusan asal'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Nomor handphone', 'inputNomorHandphone', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputNomorHandphone',
								'name' => 'nomor_hp',
								'placeholder' => 'Nomor handphone',
								'maxlength' => '20',
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Alamat email', 'inputAlamatEmail', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputAlamatEmail',
								'name' => 'email',
								'placeholder' => 'Alamat email',
								'type' => 'email'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Facebook', 'inputFacebook', $attrLabel); ?>
					<div class="col-md-8">
						<div class="input-group">
							<div class="input-group-addon">www.facebook.com/</div>
							<?php echo form_input(array_merge($attrInputNotRequired, array(
									'id' => 'inputFacebook',
									'name' => 'facebook',
									'placeholder' => 'Username Facebook'
								))); ?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Twitter', 'inputTwitter', $attrLabel); ?>
					<div class="col-md-8">
						<div class="input-group">
							<div class="input-group-addon">twitter.com/</div>
							<?php echo form_input(array_merge($attrInputNotRequired, array(
									'id' => 'inputTwitter',
									'name' => 'twitter',
									'placeholder' => 'Username Twitter'
								))); ?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Instagram', 'inputInstagram', $attrLabel); ?>
					<div class="col-md-8">
						<div class="input-group">
							<div class="input-group-addon">instagram.com/</div>
							<?php echo form_input(array_merge($attrInputNotRequired, array(
									'id' => 'inputInstagram',
									'name' => 'instagram',
									'placeholder' => 'Username Instagram'
								))); ?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('LINE', 'inputLINE', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInputNotRequired, array(
								'id' => 'inputLINE',
								'name' => 'line',
								'placeholder' => 'ID LINE'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Status', 'inputStatus', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputStatus',
								'name' => 'status',
								'placeholder' => 'Status'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Cita-cita', 'inputCitaCita', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputCitaCita',
								'name' => 'cita_cita',
								'placeholder' => 'Cita-cita'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Hobi', 'inputHobi', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputHobi',
								'name' => 'hobi',
								'placeholder' => 'Hobi'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Olahraga yang disukai', 'inputOlahraga', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputOlahraga',
								'name' => 'olahraga',
								'placeholder' => 'Olahraga yang disukai'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Hal yang disukai', 'inputHalDisukai', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputHalDisukai',
								'name' => 'hal_disukai',
								'placeholder' => 'Hal yang disukai'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Hal yang tidak disukai', 'inputHalTidakDisukai', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputHalTidakDisukai',
								'name' => 'hal_tidak_disukai',
								'placeholder' => 'Hal yang tidak disukai'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Kebiasan baik', 'inputKebiasaanBaik', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputKebiasaanBaik',
								'name' => 'kebiasaan_baik',
								'placeholder' => 'Kebiasan baik'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Kebiasaan buruk', 'inputKebiasaanBuruk', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputKebiasaanBuruk',
								'name' => 'kebiasaan_buruk',
								'placeholder' => 'Kebiasaan buruk'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Motivasi masuk JTK', 'inputMotivasiMasuk', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputMotivasiMasuk',
								'name' => 'motivasi_masuk',
								'placeholder' => 'Motivasi masuk JTK'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Moto hidup', 'inputMotoHidup', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputMotoHidup',
								'name' => 'moto_hidup',
								'placeholder' => 'Moto hidup'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Deskripsi diri', 'inputDeskripsiDiri', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_textarea(array_merge($attrInput, array(
								'id' => 'inputDeskripsiDiri',
								'name' => 'deskripsi_diri',
								'placeholder' => 'Deskripsi diri',
								'rows' => '3'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8 col-md-offset-4">
						<?php echo form_submit('', 'Submit', array('class' => 'btn btn-primary')); ?>
					</div>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

</body>
</html>
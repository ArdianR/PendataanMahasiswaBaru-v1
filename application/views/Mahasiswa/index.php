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
	<?php echo link_tag('assets/css/jquery-ui.css'); ?>
	<?php echo link_tag('assets/css/style.css'); ?>

	<script>
	function periksaEjaan(element)
	{
		var value = $(element).val();

		if (value.trim() != "")
		{
			if (value.toUpperCase() === value || value.toLowerCase() === value)
			{
				alert("Gunakan ejaan huruf besar dan huruf kecil dengan benar.");
				$(element).focus();
			}
		}
	}
	</script>
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
								'onblur' => 'periksaEjaan(this);',
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
								'placeholder' => 'Nama panggilan',
								'onblur' => 'periksaEjaan(this);'
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
								'placeholder' => 'Tempat lahir',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
					<div class="col-md-4">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputTanggalLahir',
								'name' => 'tanggal_lahir',
								'placeholder' => 'Tanggal lahir (yyyy-mm-dd)',
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
								'placeholder' => 'Alamat asal',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Alamat sekarang', 'inputAlamatSekarang', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputAlamatSekarang',
								'name' => 'alamat_sekarang',
								'placeholder' => 'Alamat sekarang',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Asal sekolah', 'inputAsalSekolah', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputAsalSekolah',
								'name' => 'asal_sekolah',
								'placeholder' => 'Asal sekolah',
								'onblur' => 'periksaEjaan(this);'
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
								'placeholder' => 'Status',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Cita-cita', 'inputCitaCita', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputCitaCita',
								'name' => 'cita_cita',
								'placeholder' => 'Cita-cita',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Hobi', 'inputHobi', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputHobi',
								'name' => 'hobi',
								'placeholder' => 'Hobi',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Olahraga yang disukai', 'inputOlahraga', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputOlahraga',
								'name' => 'olahraga',
								'placeholder' => 'Olahraga yang disukai',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Hal yang disukai', 'inputHalDisukai', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputHalDisukai',
								'name' => 'hal_disukai',
								'placeholder' => 'Hal yang disukai',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Hal yang tidak disukai', 'inputHalTidakDisukai', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputHalTidakDisukai',
								'name' => 'hal_tidak_disukai',
								'placeholder' => 'Hal yang tidak disukai',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Kebiasan baik', 'inputKebiasaanBaik', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputKebiasaanBaik',
								'name' => 'kebiasaan_baik',
								'placeholder' => 'Kebiasan baik',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Kebiasaan buruk', 'inputKebiasaanBuruk', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputKebiasaanBuruk',
								'name' => 'kebiasaan_buruk',
								'placeholder' => 'Kebiasaan buruk',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Motivasi masuk JTK', 'inputMotivasiMasuk', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputMotivasiMasuk',
								'name' => 'motivasi_masuk',
								'placeholder' => 'Motivasi masuk JTK',
								'onblur' => 'periksaEjaan(this);'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Moto hidup', 'inputMotoHidup', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputMotoHidup',
								'name' => 'moto_hidup',
								'placeholder' => 'Moto hidup',
								'onblur' => 'periksaEjaan(this);'
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
								'onblur' => 'periksaEjaan(this);',
								'rows' => '3'
							))); ?>
					</div>
				</div>

				<div id="webcam"></div>
				<input id="webcamData" type="hidden" name="webcam_data" value="" />

				<div class="form-group">
					<div class="col-md-8 col-md-offset-4">
						<?php echo form_submit('', 'Selanjutnya', array('class' => 'btn btn-primary')); ?>
					</div>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/modernizr.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/webcam.js'); ?>"></script>
<script>
$(function() {
	Webcam.set({
		dest_width: 640,
		dest_height: 480
	});

	Webcam.attach('#webcam');

	$('form').submit(function(e) {
		Webcam.snap(function(data_uri) {
			var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
			document.getElementById('webcamData').value = raw_image_data;
		});

		$('form input[type="submit"]').prop('disabled', true);

		return;
	});

	if ( !Modernizr.inputtypes.date)
	{
		$('input[type=date]').datepicker(
			{ dateFormat: 'yy-mm-dd' },
			$.datepicker.regional['id']
		);
	}
});
</script>

</body>
</html>
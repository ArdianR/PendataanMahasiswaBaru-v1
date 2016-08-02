<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sinkronisasi Data ke Server</title>

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
				<h1>Sinkronisasi Data ke Server</h1>
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
			<?php echo form_open('', array('class' => 'form-horizontal')); ?>
				
				<div class="form-group">
					<?php echo form_label('URL endpoint', 'endpoint', $attrLabel); ?>
					<div class="col-md-8">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'endpoint',
								'name' => 'endpoint',
								'value' => 'http://himakom.jtk.polban.ac.id/maba/index.php/sync/'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8 col-md-offset-4">
						<?php echo form_submit('', 'Sinkronisasi', array('class' => 'btn btn-primary')); ?>
					</div>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js'); ?>"></script>

</body>
</html>
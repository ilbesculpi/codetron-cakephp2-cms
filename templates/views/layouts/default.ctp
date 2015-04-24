<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title_for_layout; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="/cms/plugins/bootstrap/dist/css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/cms/plugins/bootstrap/dist/css/bootstrap-theme.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/cms/plugins/fontawesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="/cms/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
		<!--<link rel="stylesheet" type="text/css" href="/cms/plugins/bootstrapvalidator/dist/css/bootstrapValidator.min.css" /> -->
		<link rel="stylesheet" type="text/css" href="/cms/css/styles.css" />
		<link rel="stylesheet" type="text/css" href="/cms/css/custom.css" />
		<?php echo $this->fetch('css'); ?>
		<script src="/cms/plugins/jquery/dist/jquery.min.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="/cms/plugins/html5shiv/dist/html5shiv.min.js"></script>
			<script src="/cms/plugins/respond-minmax/dest/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php echo $this->element('header'); ?>
		<div id="content">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<?php echo $this->element('sidebar'); ?>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
		<script src="/cms/plugins/moment/min/moment.min.js"></script>
		<script src="/cms/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- <script src="/cms/plugins/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script> -->
		<script src="/cms/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<script src="/cms/plugins/underscore/underscore-min.js"></script>
		<?php echo $this->fetch('scripts'); ?>
		<script src="/cms/js/admin.js"></script>
		<script>
			$( document ).ready(function() {
				admin.initialize();
			});
		</script>
	</body>
</html>

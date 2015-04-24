<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title_for_layout; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="/cms/plugins/bootstrap/dist/css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/cms/plugins/bootstrap/dist/css/bootstrap-theme.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/cms/css/auth.css" />
		<script src="/cms/plugins/jquery/dist/jquery.min.js"></script>
	</head>
	<body>
		<div class="container auth">
			<?php echo $this->fetch('content'); ?>
		</div>
		<script src="/cms/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>

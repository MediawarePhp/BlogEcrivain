<!DOCTYPE html> 
<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- favicône de base -->
	<link rel="shortcut icon" href="./bootstrap/img/favicon.ico"/>
	<title>Blog de Jean Forteroche</title>

</head>

<body>
	<?php	
		require_once('front/header.php');
	?>

	<?= $content ?>

	<?php 
	require_once('front/footer.php');
	?>
</body>
</html>
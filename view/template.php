<!DOCTYPE html> 
<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Blog de Jean Forteroche</title>

</head>

<body>
	<?php
	if(isset($_SESSION['connected'])&& $_SESSION['connected'] == 1){
		require_once('back/header.php');
	}else{
		require_once('front/header.php');
	}
	?>

	<?= $content ?>

	<?php 
	require_once('front/footer.php');
	?>
</body>
</html>
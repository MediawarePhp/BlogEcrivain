<html>


	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="../bootstrap/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

		<meta charset="utf-8" />
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<title>Blog de Jean Forteroche</title>

	</head>

	<body>
		<?php 
		$titreErr = $contentErr = "";
		$titre = $content = "";

		require_once("../header.php");


		if($_SERVER["REQUEST_METHOD"] == "POST"){

			if(empty($_POST["titre"])){
				$titreErr = "Un titre est requis";
			}else {
				$titre = test_input($_POST["titre"]);
			}


			if(empty($_POST["contenu"])){
				$contentErr = "Un contenu est requis";
			}
			else {
				$content = test_input($_POST["contenu"]);
			}
			

			if($titre != "" AND $content != "" ){
				require_once("../model.php");
				$addPost = addPost($titre,$content);	

			}
		}




		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		?>
		<form action="" method="post">
			Titre : <input type="text" name="titre"> <span class="error">* <?php echo $titreErr;?> </span>
			Contenu : <input type="text" name="contenu"><span class="error">* <?php echo $contentErr;?> </span>
			<input type="submit" name="envoyer" value="Valider">
		</form>

	</body>

</html>
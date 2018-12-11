<?php ob_start(); ?>
	<div class="container-fluid text-center"> <!-- corp du site -->

		<div class="row content">

			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->
				<p> <h2>Article</h2> blablablablablablabla</p>
				<p> <h2>Article</h2> blablablablablablablabla</p>
			</div>

			<div class="col-sm-8 text-left"> <!-- Milieu  -->
				<h1> Page d'erreur </h1>
				<p> 
					<?= $errorMessage ?>
				</p>
				<hr>
				
			</div>


			<div class="col-sm-2 sidenav"> <!-- Colonne droite -->

				<div class="well">
					<p>PUB</p>
				</div>

				<div class="well">
					<p>PUB </p>
				</div>
				
			</div>

		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
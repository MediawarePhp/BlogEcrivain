<?php ob_start(); ?>

	<div class="container-fluid text-center"> <!-- corp du site -->

		<div class="row content">

			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->
				<p> <h2>Article</h2> blablablablablablabla</p>
				<p> <h2>Article</h2> blablablablablablablabla</p>
			</div>

			<div class="col-sm-10 text-left"> <!-- Milieu  -->


				<div class="main">	

					<h1> 
						Le Back-End					
					</h1>
					
					<p>
						Bienvenue <?= nl2br(htmlspecialchars($_SESSION['login'])); ?>
					</p>
					<hr>
				</div>


				<div  class="col-sm-6">
					<div class="card">
						<img class="card-img-top" id=card_img src="bootstrap/img/ecrire.png" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Ecriture d'un billet</h5>
						    <p class="card-text">Pour écrire un nouveau billet.</p>
						    <a href="index.php?action=newpost" class="btn btn-primary btn-block">Ecrire un billet</a>
						</div>
					</div>
					<br>
					<div class="card">
						<img class="card-img-top" id=card_img src="bootstrap/img/ecrire.png" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Ecriture d'un billet</h5>
						    <p class="card-text">Pour écrire un nouveau billet.</p>
						    <a href="#" class="btn btn-primary btn-block">Ecrire un billet</a>
						</div>
					</div>
				</div>
					
				<div class="col-sm-6">
					<div class="card">
						<img class="card-img-top" id=card_img src="bootstrap/img/ecrire.png" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Modifier les billets</h5>
						    <p class="card-text">Pour relire tout les billets, modifier leur contenu ou le supprimer.</p>
						    <a href="index.php?action=showposts" class="btn btn-primary btn-block">Afficher la liste des billets</a>
						</div>
					</div>
					<br>
					<div class="card">
						<img class="card-img-top" id=card_img src="bootstrap/img/ecrire.png" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">Ecriture d'un billet</h5>
						    <p class="card-text">Pour écrire un nouveau billet.</p>
						    <a href="#" class="btn btn-primary btn-block">Ecrire un billet</a>
						</div>
					</div>

				</div>

				

		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require_once('view/template.php'); ?>
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
						<a href="index.php?action=newpost">
							<img class="card-img-top" id=card_img src="bootstrap/img/ecrire.png" alt="Card image cap">
						</a>
						<div class="card-body">
							<h4 class="card-title">Ecriture d'un billet</h4>
						    <p class="card-text">Je vous propose un éditeur de texte pour écrire votre roman.</p>
						    <a href="index.php?action=newpost" class="btn btn-primary btn-block">Ecrire un billet</a>
						</div>
					</div>
					<br>
					<div class="card">
						<a href="#">
							<img class="card-img-top" id=card_img src="bootstrap/img/validate.png" alt="Card image cap">
						</a>
						<div class="card-body">
							<h4 class="card-title">Validation des commentaires</h4>
						    <p class="card-text">Liste des commentaires à valider. Vous pouvez accepter ou refuser chaque commentaire</p>
						    <a href="#" class="btn btn-primary btn-block">Afficher la liste des commentaires à valider</a>
						</div>
					</div>
				</div>
					
				<div class="col-sm-6">
					<div class="card">
						<a href="index.php?action=showposts">
							<img class="card-img-top" id=card_img src="bootstrap/img/manage.png" alt="Card image cap">
						</a>
						<div class="card-body">
							<h4 class="card-title">Modifier les billets</h4>
						    <p class="card-text">Pour relire tout les billets, modifier leur contenu ou le supprimer.</p>
						    <a href="index.php?action=showposts" class="btn btn-primary btn-block">Afficher la liste des billets</a>
						</div>
					</div>
					<br>
					<div class="card">
						<a href="#">
							<img class="card-img-top" id=card_img src="bootstrap/img/comment.png" alt="Card image cap">
						</a>
						<div class="card-body">
							<h4 class="card-title">Modération des commentaires</h4>
						    <p class="card-text">Liste de tout les commentaires validés. Vous pouvez les afficher et les supprimer </p>
						    <a href="#" class="btn btn-primary btn-block">Afficher la liste des commentaires valides</a>
						</div>
					</div>

				</div>

				

		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require_once('view/template.php'); ?>
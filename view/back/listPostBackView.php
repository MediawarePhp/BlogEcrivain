<?php ob_start(); ?>
	<div class="container-fluid text-center"> <!-- corp du site -->

		<div class="row content">

			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->
				<p> <h2>Article</h2> blablablablablablabla</p>
				<p> <h2>Article</h2> blablablablablablablabla</p>
			</div>

			<div class="col-sm-8 text-left"> <!-- Milieu  -->
				<h1> Administration des billets </h1>
				<p> 
					Cette page vous permet de lire, modifier et supprimer les différents billets déjà postés.
				</p>
				<hr>

				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<?php 
						$count = "1";
						while($data = $posts->fetch()){ ?>

						
					    <div class="panel-heading">
					      <h4 class="panel-title">
					      	<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $count ?>">Billet <?= $count ?> - <?= $data['titre'];?>           </a>
					      </h4>
					    </div>
					    <div id="collapse<?= $count ?>" class="panel-collapse collapse">
					    	<div class="panel-body">
								<div class="news">	

									<h2> 
										<?= $data['titre'];?>
										le <strong><?= $data['date_creation_fr'];?></strong>					
									</h2>
									
									<p>
										<?= $data['contenu']; ?> 
									</p>
									<hr>
									<div id="admin">
										<a href="#" class="btn btn-primary btn-block">Modifier le billet</a> 
										<a href="#" class="btn btn-danger btn-block">Supprimer le billet</a>
									</div>


								</div>
							</div>
						</div>
						

						<?php
						$count +=1;
						} 
						$posts-> closeCursor();
						?>
					</div>
				</div>
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
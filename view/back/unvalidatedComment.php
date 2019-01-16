<?php ob_start(); ?>
	<div class="container-fluid text-center"> <!-- corp du site -->

		<div class="row content">

			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->
				
			</div>

			<div class="col-sm-9 text-left"> <!-- Milieu  -->
				<h1> Validation des commentaires </h1>
				<p> 
					Cette page vous permet de lire, valider ou supprimer les différents commentaires écrit par les visiteurs du site.
				</p>
				<hr>

				<?php if ($totalPage != 0) : 
				?> 
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<?php 
						$count = "1";
						while($comment = $comments->fetch()){ ?>

						
					    <div class="panel-heading">
					      <h4 class="panel-title">
					      	<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $count ?>"> Commentaire <?= $comment['id'] ?>   le <?= $comment['date_commentaire_fr'];?></a>
					      </h4>
					    </div>
					    <div id="collapse<?= $count ?>" class="panel-collapse collapse in">
					    	<div class="panel-body">
								<div class="comment">	
									 <a href="index.php?action=post&id=<?= $comment['id_billet'] ?>">Accéder au billet commenté</a>
									<h3> 
										 Publié par <strong><?= $comment['auteur'];?></strong>					
									</h3>
									
									<p>
										<?= $comment['commentaire']; ?> 
									</p>
									<hr>
									<div id="admin">
										<a href="index.php?action=validateComm&commentaryId=<?=$comment['id']?>" class="btn btn-success btn-block">Valider le commentaire</a> 
										<a href="index.php?action=deleteComm&commentaryId=<?=$comment['id']?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire ? '))" class="btn btn-danger btn-block">Supprimer le commentaire</a>
									</div>


								</div>
							</div>
						</div>
						

						<?php
						$count +=1;
						} 
						$comments-> closeCursor();
						?>
					</div>
				</div>
				<?php else : ?>
					<div class="comment">	

					

						<h2> 
							Désolé mais il n'y a aucun commentaire à valider.				
						</h2>
						
						<p>
							Il va falloir attendre qu'un utilisateur soumette un commentaire !
						</p>
						<hr>

					</div>
				<?php endif; ?> 

				<div class="pagination pagination-lg">	
					<?php 
					for ($i=0; $i < $totalPage ; $i++) { 
						?>
						
						<li <?php if (!isset($_GET['commentary_count']) && $i == 0 ) {
							echo ' class="active"';
							$_GET['commentary_count'] = 0;
						}elseif($_GET['commentary_count'] == $i){
							echo ' class="active"';
						}

						 ?> > <a href="index.php?action=manage&commentary_count=<?=$i?>"> <?= $i+1 ?></a></li>
					<?php	
					}
					?>


				
				</div>
			</div>


				

		</div>
	</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

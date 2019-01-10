<?php ob_start(); ?>

	<div class="container-fluid text-center"> <!-- corp du site -->

		<div class="row content">

			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->
				
			</div>

			<div class="col-sm-8 text-left"> <!-- Milieu  -->


				<div class="post">	

					<h1> 
						<?= $post['titre'];?>
						le <strong><?= $post['date_creation_fr'];?> </strong>					
					</h1>
					
					<p>
						<?= $post['contenu']; ?>
					</p>
					<hr>

				</div>

				<?php if($totalPage != 0){ while($comment = $comments->fetch()){ ?>

				<div class="comment">	

					

					<h3> 
						Commentaire posté le <strong><?= $comment['date_commentaire_fr'] ?></strong>				
					</h3>
					<h4>
						<em> Par <?= nl2br(htmlspecialchars($comment['auteur'])); ?> </em>
					</h4>
					
					<p>
						<?= nl2br(htmlspecialchars($comment['commentaire'])); ?>
					</p>
					<hr>

				</div>

				<?php 
				}
				
				$comments-> closeCursor();	
				} else { ?>
					<div class="comment">	

					

						<h2> 
							Désolé mais il n'y a aucun commentaire.				
						</h2>
						
						<p>
							C'est pourquoi je te propose d'en écrire un ! Il faudra attendre que Jean valide ton commentaire pour qu'il s'affiche.
						</p>
						<hr>

					</div>
				
				<?php
				}
				?>



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

						 ?> > <a href="index.php?action=post&id=<?= $post['id']?>&commentary_count=<?=$i?>"> <?= $i+1 ?></a></li>
					<?php	
					}
					?>


				
				</div>

				<div class="comment">
				<h2>Donnez-nous votre avis</h2>

					<form class="form-group" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
					    <div>
					        <label for="author">Auteur</label><br />
					        <input type="text"  class="form-control" id="author" name="author" />
					    </div>
					    <div>
					        <label for="comment">Commentaire</label><br />
					        <textarea id="comment" class="form-control" name="comment"></textarea>
					    </div>
					    <div>
					        <button type="submit" class="btn btn-success"> Valider votre commentaire </button>
					    </div>
					</form>
				</div>




				
			</div>
			


			<div class="col-sm-2 sidenav"> <!-- Colonne droite -->

				
				
			</div>

		</div>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require_once('view/template.php'); ?>
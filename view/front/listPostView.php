<?php ob_start(); ?>
	<div class="container-fluid text-center"> <!-- corp du site -->

		<div class="row content">

			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->
				<p> <h2>Article</h2> blablablablablablabla</p>
				<p> <h2>Article</h2> blablablablablablablabla</p>
			</div>

			<div class="col-sm-8 text-left"> <!-- Milieu  -->
				<h1> Bienvenue </h1>
				<p> 
					Vous êtes bien sur le blog de Jean Forteroche, célèbre écrivain français. Vous pourrez trouver ici tous les chapitres qui constituent son dernier livre "A l'approche de l'hiver"
					Jean publie régulièrement des nouveaux chapitres à son oeuvre, voici le site qui lui permets de les publier.
				</p>
				<hr>

				<?php while($data = $posts->fetch()){ ?>

				<div class="news">	

					 <h2>
						<?= $data['titre'];?>	
					</h2>
					
					<p>
						<?= $data['contenu']; ?>
					</p>
					<p>
						le <strong> <?= $data['date_creation_fr'];?> </strong>
					</p>
					<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
					<hr>

				</div>

				<?php
				} 
				$posts-> closeCursor();
				?>
				<div class="pagination pagination-lg">	
					<?php 
					for ($i=0; $i < $totalPage ; $i++) { 
						?>
						
						<li <?php if (!isset($_GET['count']) && $i == 0 ) {
							echo ' class="active"';
							$_GET['count'] =0;
						}elseif($_GET['count'] == $i){
							echo ' class="active"';
						}

						 ?> > <a href="index.php?count=<?=$i?>"> <?= $i+1 ?></a></li>
					<?php	
					}
					?>


				
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
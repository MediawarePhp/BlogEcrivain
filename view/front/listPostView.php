<?php ob_start(); ?>
		<div class="jumbotron">
			<div class="fond">
				<h1> Bienvenue </h1>
					<p> 

						Vous êtes bien sur le blog de Jean Forteroche, célèbre écrivain français. Vous pourrez trouver ici tous les chapitres qui constituent son dernier livre "A l'approche de l'hiver"
						Jean publie régulièrement des nouveaux chapitres à son oeuvre, voici le site qui lui permets de les publier.
					</p>
			</div>
		</div>
				
				<hr>


	<div class="container-fluid text-center"> <!-- corp du site -->

		

		<div class="row content">


			
			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->

			</div>

			<div class="col-sm-8 text-left"> <!-- Milieu  -->
				
					

					
				<?php while($data = $posts->fetch()){ ?>

				<div class="news" >	
 
					 <h2>
						<b><?= nl2br( $data['titre']);  ?></b> 
					</h2>
					<p>
						<em>le <strong> <?= $data['date_creation_fr'];?> </strong></em>
					</p>
					
						<?= $data['contenu']; ?>
					
					
					<?php if ($data['countCommentaire']>1) : ?>
						<em><a href="index.php?action=post&id=<?= $data['id'] ?>"> Afficher les <?= $data['countCommentaire']; ?> commentaires </a></em>
					<?php elseif ($data['countCommentaire']==1) : ?>
						<em><a href="index.php?action=post&id=<?= $data['id'] ?>">   Afficher l'unique commentaire</a></em>
					
					<?php else : ?>
						<em> <a href="index.php?action=post&id=<?= $data['id'] ?>"> Aucun commentaire, postez-en un !</a></em>
					<?php endif;?>

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

				
				
			</div>

		</div>
	</div>
	<script type="text/javascript">
		//Hauteur du jumbotron
	var hauteurJumbotron = $('.jumbotron').outerHeight();
	//Fonction appelée au scroll de la souris
	function parallax()
	{
	//On calcule la distance de scroll, puis on réduit la taille du container du jumbotron en fonction de cette distance.
	var scrolled = $(window).scrollTop();
	if (hauteurJumbotron-scrolled>100) {
		$('.fond').css('height', (hauteurJumbotron-scrolled) + 'px');
		$('.jumbotron').css('height',(hauteurJumbotron-scrolled) + 'px');
	}
	// if ( $('.jumbotron').height() < 200) {
	// 	$('.jumbotron').css("display","none");
	// } 

	// if ( $('.jumbotron').css('display') == 'none' && scrolled <5){
	// 	$('.jumbotron').css('display','block');
	// }
		
	}
	//Ajout de la fonction à l'événement scroll
	$(window).scroll(function(e){
	parallax();
	});
	</script>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>


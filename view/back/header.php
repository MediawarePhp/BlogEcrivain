<nav class="navbar navbar-expand-lg navbar-inverse bg-light "> <!-- Barre navigation -->
		<div class="container-fluid">
			<a href="index.php" class="navbar-brand"><img src="bootstrap/img/logo.jpg" width="50" height="50"class=" align-top" alt=""></a>
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
					<li><a href="index.php?action=done"><span class="glyphicon glyphicon-book"></span> Panneau d'administration</a> </li>
					<!-- <li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-envelope"> </span> Projets <span class="caret"></span></a>
						 <ul class="dropdown-menu"> 
						</ul> 
					</li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					 <form class="navbar-form navbar-right" method="post" action="index.php?action=disconnect">
					 	 Bienvenue <?= nl2br(htmlspecialchars($_SESSION['login'])); ?>
					 	<button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-log-out"></span> Se déconnecter</button>

					 </form>
					
				</ul>
		</div>
	</nav>
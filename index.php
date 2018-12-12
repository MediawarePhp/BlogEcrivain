<?php
session_start();
require('controller/c_frontend.php');
require('controller/c_backend.php');

try{
	if (isset($_GET['action'])) {
	    if ($_GET['action'] == 'listPosts') {
	    	if (isset($_GET['count']) && $_GET['count'] >= 0) {

	    		$start = $_GET['count']*6;
	    		listPosts($start);

	    	} else {

	    		$start = 0;
	    		listPosts($start);
	    	}
	        
	    }

	    elseif ($_GET['action'] == 'post') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	        	if (isset($_GET['commentary_count']) && $_GET['commentary_count'] >= 0) {

		    		$start = $_GET['commentary_count']*6;
		    		post($start);

		    	} else {

		    		$start = 0;
		    		post($start);
		    	}
	            
	        }
	        else {
	            throw new Exception ('Erreur : aucun identifiant de billet envoyé.');
	        }
	    }

	    elseif ($_GET['action'] == 'addComment') {
	    	if(isset($_GET['id']) && $_GET['id'] > 0 ){
	    		if (!empty($_POST['author']) && !empty($_POST['comment'])){

	    			addComment($_GET['id'],$_POST['author'],$_POST['comment']);
	    		} else {
	    			throw new Exception ('Désolé mais il faut remplir tout les champs du formulaire.');
	    		}
	    	} else {
	    		throw new Exception ("Erreur : Aucun identifiant de billet n'est renseigné.");
	    	}

	    }

	    elseif($_GET['action'] == 'connexion'){
	    	if(!empty($_POST['login']) && $_POST['login'] == 'JeanF'){
	    		if(!empty($_POST['pwd'])){

	    			$_SESSION['login'] = "JeanF";
	    			connect($_POST['login'], $_POST['pwd']);

	    		} else {
	    			throw new Exception ("Désolé, le mot de passe n'a pas été renseigné.");
	    		}

	    	} else {
	    		throw new Exception ("Désolé, vous n'avez pas rentré un login valide.");
	    	}

	    }

	    elseif($_GET['action'] == "done" ){
	    	if(isset($_SESSION['authLvl']) && $_SESSION['authLvl'] == "master"){
	    		displayBackend();
	    	} else {
	    		throw new Exception ("Désolé, vous n'avez pas le droit d'accéder au contenu demandé.");
	    	}


	    }

	    elseif($_GET['action'] == 'disconnect'){
	    	if(isset($_SESSION['connected']) && $_SESSION['connected'] == 1){

	    		disconnect();
	    	} else {
	    		throw new Exception ("Désolé mais vous n'êtes même pas connecté, il m'est impossible de vous déconnecter.");
	    	}
	    }

	    elseif($_GET['action'] == 'newpost'){
	    	if(isset($_SESSION['authLvl']) && $_SESSION['authLvl'] == "master"){

	    		showAddPost();
	    	} else {
	    		throw new Exception ("Désolé, vous n'avez pas le droit d'accéder au contenu demandé.");
	    	}
	    } 
	    
	    elseif($_GET['action'] == 'addPost'){
	    	if(!empty($_POST['title_tinymce']) && !empty($_POST['content_tinymce'])){

	    		addPost($_POST['title_tinymce'],$_POST['content_tinymce']);

	    	} else {
	    		if(empty($_POST['title_tinymce'])){
	    			throw new Exception("Vous n'avez pas rempli le titre.");
	    		} else {
	    			throw new Exception("Vous n'avez pas rempli le contenu.");
	    		}
	    		
	    		
	    	}
	    } 

	    elseif($_GET['action'] == 'showposts'){
	    	if(isset($_SESSION['authLvl']) && $_SESSION['authLvl'] == "master"){
	    		if (isset($_GET['count']) && $_GET['count'] >= 0) {

		    		$start = $_GET['count']*6;
		    		showPosts($start);
		    	}else{

		    		$start = 0;
		    		showPosts($start);
		    	}
	    		
	    	} else {
	    		throw new Exception ("Désolé, vous n'avez pas le droit d'accéder au contenu demandé.");
	    	}
	    }

	    elseif($_GET['action']=='editpost'){
	    	if(isset($_SESSION['authLvl']) && $_SESSION['authLvl'] == "master"){
	    		if (isset($_GET['editId']) && $_GET['editId'] >=0){

	    			editPost();
	    		}

	    	} else {
	    		throw new Exception ("Désolé, vous n'avez pas le droit d'accéder au contenu demandé.");
	    	}
	    }

	    elseif($_GET['action']=='editing'){
	    	if(!empty($_POST['title_tinymce']) && !empty($_POST['content_tinymce']) && isset($_GET['editId'])){

	    		editing($_POST['title_tinymce'],$_POST['content_tinymce']);


	    	} else {
	    		if(empty($_POST['title_tinymce'])){
	    			throw new Exception("Vous n'avez pas rempli le titre.");
	    		} else {
	    			throw new Exception("Vous n'avez pas rempli le contenu.");
	    		}
	    		
	    		
	    	}
	    } 

	    elseif ($_GET['action']=='deletepost') {
	    	if((isset($_GET['deleteId']) && $_GET['deleteId']) && $_SESSION['authLvl'] == 'master'){

	    		deletePost();

	    	} else {
	    		throw new Exception("Vous n'avez pas le droit de faire cette action.");
	    		
	    	}	
	    } 

	    elseif ($_GET['action'] == 'manage' ) {
	    	if (isset($_SESSION['authLvl']) && $_SESSION['authLvl'] == 'master') {
	    		manageCommentary();

	    		
	    	} else {
	    		throw new Exception("Désolé, vous n'avez pas les droits pour accéder à ce contenu.");
	    		
	    	}

	    	
	    }

	}


	else {
		if (isset($_GET['count']) && $_GET['count'] >= 0) {

	    		$start = $_GET['count']*6;
	    		listPosts($start);

	    	} else {

	    		$start = 0;
	    		listPosts($start);
	    	}
	}

}
catch (Exception $e){

	$errorMessage = $e->getMessage();
	require_once('view/front/errorView.php');

}


	



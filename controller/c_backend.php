<?php 
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/loginManager.php');
require_once ("bootstrap/js/transition.php");

use \Alexandre\Blog\Model\PostManager;
use \Alexandre\Blog\Model\CommentManager;
use \Alexandre\Blog\Model\LoginManager;


function displayBackend()
{
	require_once('view/back/backendView.php');
}

function connect($login,$password)
{

	$loginManager = new LoginManager();

	$authLvl = $loginManager -> checkPassword($login,$password);

	if($authLvl != "master"){
		throw new Exception ("Impossible de vous connecter, désolé");
	}else{
		$_SESSION['connected'] = 1;
		$_SESSION['authLvl'] = "master";
		header ("Location: index.php?action=done");
	}


}

function disconnect(){
	$_SESSION['connected'] = 0;
	header("Location: index.php");	
}

function showAddPost(){
	require_once("view/back/newPostView.php");
}

function showPosts($start){
	$postManager = new PostManager();
	$count = $postManager -> countAll();
	$totalPage = getPages($count);
	$posts = $postManager -> getPosts($start);
	require_once("view/back/listPostBackView.php");

}

function editPost(){
	$postManager = new PostManager();
	$post = $postManager -> getPost($_GET['editId']);
	require_once('view/back/editPostView.php');
}

function editing($title,$content){
	$postManager = new PostManager();
	$postManager -> updatePost($title,$content,$_GET['editId']);
	header("Location: index.php?action=done");


}



function addPost($title,$content){

	$PostManager = new PostManager();
	
	$affectedPosts = $PostManager -> addPost($title,$content);
	if($affectedPosts == false){
		throw new Exception("Impossible d'ajouter le post, désolé.");
	}else{
		header("Location: index.php?action=done");
	}
  	

}

function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
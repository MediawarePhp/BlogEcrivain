<?php 
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/loginManager.php');
require_once ("bootstrap/js/transition.php");

use \Alexandre\Blog\Model\PostManager;
use \Alexandre\Blog\Model\CommentManager;
use \Alexandre\Blog\Model\LoginManager;

function listPosts($start)
{
	$postManager = new PostManager();
	$count = $postManager -> countAll();
	$totalPage = getPages($count);
	$posts = $postManager -> getPosts($start);
	require_once("view/front/listPostView.php");
}

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	$post = $postManager -> getPost($_GET['id']);
	$comments = $commentManager -> getComments($_GET ['id']);
	
	require_once('view/front/postView.php');
}

function addComment($postId,$author,$comment)
{
	$commentManager = new CommentManager();

	$affectedLines = $commentManager -> postComment($postId,$author,$comment);
	
	if($affectedLines == false){
		throw new Exception("Impossible d'ajouter votre commentaire, désolé");
	}else{
		header("Location: index.php?action=post&id=".$postId);
	}

}


function getPages($count)
{
		$totalPage = ($count/6);
		return $totalPage;
	
}


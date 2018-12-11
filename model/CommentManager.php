<?php
namespace Alexandre\Blog\Model;
require_once('Manager.php');


class CommentManager extends Manager
{
	

	function getComments($postId)
	{

		
		$db = $this -> dbConnect();
		$query = "SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%imin%ss') AS date_commentaire_fr FROM commentaires WHERE id_billet = ?  AND validation = 1 ORDER BY date_commentaire DESC";
		$comments = $db->prepare($query) or trigger_error($db->error."[$query]");
		$comments -> execute (array($postId));
		return $comments;


	}


	function getUnvalidatedComment(){
		$db = $this -> dbConnect();
		$query = "SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%imin%ss') AS date_commentaire_fr FROM commentaires WHERE validation IS NULL ORDER BY date_commentaire DESC";
		$comments = $db -> prepare($query) or trigger_error($db->error."[$query]");
		$comments -> execute();
		return $comments;

	}

	function postComment($postId,$author,$comment)
	{

		$db = $this -> dbConnect();
		$query = "INSERT INTO commentaires ( id_billet, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())";
		$comments = $db -> prepare($query);
		$affectedLines = $comments -> execute(array($postId,$author,$comment));
		return $affectedLines;


	}

}
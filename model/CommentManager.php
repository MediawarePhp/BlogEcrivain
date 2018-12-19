<?php
namespace Alexandre\Blog\Model;
require_once('Manager.php');


class CommentManager extends Manager
{
	

	public function getComments($postId,$start)
	{

		
		$db = $this -> dbConnect();
		$query = "SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%i') AS date_commentaire_fr FROM commentaires WHERE id_billet = ?  AND validation = 1 ORDER BY date_commentaire DESC LIMIT $start, 6";
		$comments = $db->prepare($query) or trigger_error($db->error."[$query]");
		$comments -> execute (array($postId));
		return $comments;


	}


	public function getUnvalidatedComment($start){
		$db = $this -> dbConnect();
		$query = "SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%i') AS date_commentaire_fr FROM commentaires WHERE validation IS NULL ORDER BY date_commentaire DESC LIMIT $start, 6";
		$comments = $db -> prepare($query) or trigger_error($db->error."[$query]");
		$comments -> execute();
		return $comments;

	}


	public function getValidatedComment($start){

		$db = $this -> dbConnect();
		$query ="SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%i') AS date_commentaire_fr FROM commentaires WHERE validation = 1 ORDER BY date_commentaire DESC LIMIT $start, 6";
		$comments = $db -> prepare($query) or trigger_error($db->error."[$query]");
		$comments -> execute();
		return $comments;
		
	}

	public function postComment($postId,$author,$comment)
	{

		$db = $this -> dbConnect();
		$query = "INSERT INTO commentaires ( id_billet, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())";
		$comments = $db -> prepare($query);
		$affectedLines = $comments -> execute(array($postId,$author,$comment));
		return $affectedLines;


	}


	public function countPostCommentary($postId)
	{
		$db = $this -> dbConnect();

		$query = "SELECT COUNT(*) FROM commentaires WHERE id_billet = ? AND validation = 1";
		$req = $db->prepare($query);
		$req-> execute(array($postId));
		$count = $req ->fetchColumn();
		return $count;
	}

	public function countUnvalidatedComment()
	{
		$db = $this -> dbConnect();

		$query = "SELECT COUNT(*) FROM commentaires WHERE  validation IS NULL";
		$req = $db->prepare($query);
		$req-> execute();
		$count = $req ->fetchColumn();
		return $count;
	}

	public function countValidatedComment()
	{
		$db = $this -> dbConnect();

		$query = "SELECT COUNT(*) FROM commentaires WHERE  validation = 1";
		$req = $db->prepare($query);
		$req-> execute();
		$count = $req ->fetchColumn();
		return $count;
	}


	public function deleteComment($commentId)
	{
		$db = $this -> dbConnect();
		$query = "DELETE FROM commentaires WHERE id = ?";
		$req = $db->prepare($query) or trigger_error($db->error."[$query]");
		$req -> execute(array($commentId));
	}

	public function validateComment($commentId)
	{
		$db = $this -> dbConnect();
		$query = "UPDATE commentaires SET validation = 1 WHERE id = ?";
		$req = $db ->prepare($query) or trigger_error($db->error."[$query]");
		$req -> execute(array($commentId));

	}





}
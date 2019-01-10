<?php
namespace Alexandre\Blog\Model;
require_once('Manager.php');



class PostManager extends Manager
{
	public function getPosts($start) // Show every posts
	{

		$db = $this -> dbConnect();

		$query = "SELECT billets.id, billets.titre, billets.contenu, DATE_FORMAT(billets.date_creation, '%d/%m/%Y à %Hh%i') 
			AS date_creation_fr, COUNT(commentaires.id) AS countCommentaire 
			FROM billets  LEFT JOIN commentaires  ON billets.id = commentaires.id_billet
			AND validation = 1 GROUP BY billets.id ORDER BY date_creation DESC LIMIT $start, 6";
		$req = $db->query($query) or trigger_error($db->error."[$query]");
		return $req;

	}

	public function addPost($titre,$contenu) // Add one post
	{
		$db = $this -> dbConnect();

		$query = "INSERT INTO billets ( titre, contenu, date_creation) VALUES (?, ?, NOW())";
		$req = $db->prepare($query);
		$affectedPost = $req -> execute(array($titre,$contenu));
		return $affectedPost;

	}

	public function updatePost($titre,$contenu,$postId) // Update one post
	{
		$db = $this -> dbConnect();
		$query = "UPDATE billets SET titre=? , contenu=? WHERE id=?";
		$req = $db -> prepare($query) or trigger_error($db->error."[$query]");
		$post = $req->execute(array($titre,$contenu,$postId));
		$db = null;
	}


	public function getPost($postId) // Show one post
	{
		$db = $this -> dbConnect();

		$query = "SELECT id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%i') AS date_creation_fr FROM billets WHERE id = ?";
		$req = $db->prepare($query) or trigger_error($db->error."[$query]");
		$post = $req -> execute (array($postId));
		$post = $req -> fetch();
		return $post;

	}

	public function countAll() // Count the number of posts
	{
		$db = $this -> dbConnect();

		$query = "SELECT COUNT(*) FROM billets";
		$req = $db->prepare($query);
		$req-> execute();
		$count = $req ->fetchColumn();
		return $count;
	}

	public function deletePost($postId) // delete a post
	{

		$db = $this -> dbConnect();
		$query = "DELETE FROM Billets where id = ?";
		$req = $db->prepare($query) or trigger_error($db->error."[$query]");
		$req -> execute(array($postId));
	}

	

}
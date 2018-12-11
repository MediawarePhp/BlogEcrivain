<?php
namespace Alexandre\Blog\Model;
Class Manager
{
	protected function dbConnect()
	{
		
		$db = new \PDO('mysql:host=localhost;dbname=blog_ecrivain;charset=utf8','root','');
		return $db;
	}
}
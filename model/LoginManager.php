<?php
namespace Alexandre\Blog\Model;
require_once('Manager.php');

class LoginManager extends Manager
{
	public function checkPassword($login,$password)
	{
		
		$authLvl = "";
		$db = $this -> dbConnect();
		$query = "SELECT password FROM user WHERE login = ?";
		$req = $db->prepare($query) or trigger_error($db->error."[$query]");
		$hashedPwd = $req -> execute (array($login));
		$hashedPwd = $req -> fetch();
		$hashedPwd = $hashedPwd['password'];
		$userPwd =  crypt($password,'$1$E_A_32ZJ8SZ$');
		if(  hash_equals($hashedPwd,$userPwd) ){
			$authLvl = "master";
			return $authLvl;
		} else {
			throw new \Exception("Désolé,". $password . " n'est pas un mot de passe valide.");
		}

	}
	

}
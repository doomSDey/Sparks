<?php

class DbOperations{

	private $con;

	function __construct(){

		require_once dirname(__FILE__).'/DbConnect.php';

		$db = new DbConnect();

		$this->con = $db->connect();

	}

public function getcredits($name){
	$stmt=$this->con->prepare("SELECT * FROM `users` WHERE name=?");
	$stmt->bind_param("s",$name);
	$stmt->execute();
	return $stmt->get_result()->fetch_assoc();
}

public function setcredits($name,$credit){
	$stmt = $this->con->prepare("UPDATE `users` SET credit=? WHERE name = ?");
	$stmt->bind_param("ss",$credit,$name);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}

public function adduser($name,$email,$credit){
	$stmt=$this->con->prepare("INSERT INTO `users`(`name`,`email`,`credit`)VALUES(?,?,?)");
	$stmt->bind_param("sss",$name,$email,$credit);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}

public function remuser($name){
	$stmt=$this->con->prepare("DELETE FROM `users` WHERE  name=?");
	$stmt->bind_param("s",$name);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}

}

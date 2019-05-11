<?php

class DbOperations{

	private $con;

	function __construct(){

		require_once dirname(__FILE__).'/DbConnect.php';

		$db = new DbConnect();

		$this->con = $db->connect();

	}

public function get($name){
	$stmt=$this->con->prepare("SELECT * FROM `user` WHERE name=?");
	$stmt->bind_param("s",$name);
	$stmt->execute();
	return $stmt->get_result()->fetch_assoc();
}

public function set($name,$email,$desg){
	$stmt = $this->con->prepare("UPDATE `user` SET desg=?,email=? WHERE name = ?");
	$stmt->bind_param("sss",$desg,$email,$name);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}

public function add($name,$email,$id,$desg){
	$stmt=$this->con->prepare("INSERT INTO `user`(`name`,`email`,`id`,`desg`)VALUES(?,?,?,?)");
	$stmt->bind_param("ssss",$name,$email,$id,$desg);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}

public function rem($name){
	$stmt=$this->con->prepare("DELETE FROM `user` WHERE  name=?");
	$stmt->bind_param("s",$name);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}

}

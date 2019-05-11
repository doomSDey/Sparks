<?php

class DbOperations{

	private $con;

	function __construct(){

		require_once dirname(__FILE__).'/DbConnect.php';

		$db = new DbConnect();

		$this->con = $db->connect();

	}

public function get($name){
	$stmt=$this->con->prepare("SELECT * FROM `dept` WHERE name=?");
	$stmt->bind_param("s",$name);
	$stmt->execute();
	return $stmt->get_result()->fetch_assoc();
}

public function set($name,$strength,$head,$headid){
	$stmt = $this->con->prepare("UPDATE `dept` SET head=?,strength=?,headid=? WHERE name = ?");
	$stmt->bind_param("ssss",$head,$strength,$headid,$name);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}


public function add($name,$strength,$id,$head,$headid){
	$stmt=$this->con->prepare("INSERT INTO `dept`(`name`,`strength`,`id`,`head`,`headid`)VALUES(?,?,?,?,?)");
	$stmt->bind_param("sssss",$name,$strength,$id,$head,$headid);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}
public function rem($name){
	$stmt=$this->con->prepare("DELETE FROM `dept` WHERE  name=?");
	$stmt->bind_param("s",$name);
	if($stmt->execute())
	return 1;
	else {
		return 2;
	}
}

}

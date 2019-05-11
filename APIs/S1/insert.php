<?php

require_once 'includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['credit']) ){
		$db = new DbOperations();

		if($db->adduser($_POST['name'], $_POST['email'],$_POST['credit'])){
			$response['message'] = "Success";
		}
		else {
			$response['message'] = "Error";
		}

	}else{
		$response['error'] = true;
		$response['message'] = "Required fields are missing";
	}
}

echo json_encode($response);

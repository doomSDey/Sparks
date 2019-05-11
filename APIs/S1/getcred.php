<?php

require_once 'includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['name']) ){
		$db = new DbOperations();

		$user=$db->getcredits($_POST['name']);
    $response['name']=$user['name'];
    $response['email']=$user['email'];
    $response['credit']=$user['credit'];

	}else{
		$response['error'] = true;
		$response['message'] = "Required fields are missing";
	}
}

echo json_encode($response);

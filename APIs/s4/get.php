<?php

require_once 'includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['name']) ){
		$db = new DbOperations();

		$dept=$db->get($_POST['name']);
		$response['id']=$dept['id'];
    $response['name']=$dept['name'];
    $response['strength']=$dept['strength'];
    $response['head']=$dept['head'];
		$response['headid']=$dept['headid'];

	}else{
		$response['error'] = true;
		$response['message'] = "Required fields are missing";
	}
}

echo json_encode($response);

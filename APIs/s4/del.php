<?php

require_once 'includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['name']) ){
		$db = new DbOperations();

		if($db->rem($_POST['name'])){
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

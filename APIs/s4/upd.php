<?php

require_once 'includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['name']) and isset($_POST['strength']) and isset($_POST['head']) and isset($_POST['headid'])){
		$db = new DbOperations();

		if($db->set($_POST['name'],$_POST['strength'],$_POST['head'],$_POST['headid'])){
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

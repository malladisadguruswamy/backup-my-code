<?php 
if (isset($_POST) && isset($_POST['last_name']) && isset($_POST['email'])) {
    require("lib.php");

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    // echo '<pre>';print_r($_POST);
     // echo '<pre>';print_r($_FILES);
    // exit;
    if(isset($_FILES) && !empty($_FILES['file']['tmp_name']) ){
    	$tmpFilePath = $_FILES['file']['tmp_name'];
    	if ($tmpFilePath != ""){
		    //Setup our new file path
    		$store_path = 'uploads/';
    		if (!file_exists($store_path)) {
			    mkdir($store_path, 0777, true);
			}
		     $newFilePath = $store_path. $_FILES['file']['name'];
		     move_uploaded_file($tmpFilePath, $newFilePath);
		    //File is uploaded to temp dir
		    // if(move_uploaded_file($tmpFilePath, $newFilePath)) {
		    //     //Other code goes here
		    // }else{
		    // 	$_FILES["file"]["error"];
		    // }
		}
    }


    

    $object = new CRUD();

    $object->Create($first_name, $last_name, $email);
}
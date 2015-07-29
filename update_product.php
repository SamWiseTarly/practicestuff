UPDATE_PRODUCT.PHP
<?php

	/*
	*update product information
	*A product is identified by product id (pid)
	*/

	//array for JSON response
	$response = array();

	//check for required fields
	if (isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])){
 
    	$pid = $_POST['pid'];
    	$name = $_POST['name'];
    	$price = $_POST['price'];
    	$description = $_POST['description'];

    	//include connect class
    	require_once __DIR__ . 'db_connect.php';

    	//connect to db
    	$db = new DB_CONNECT();

    	// mysql update row with matched pid
    	$result = mysql_query("UPDATE products SET name = '$name', price = '$price', description = '$description' WHERE pid = $pid");

    	//check if row insert or not
    	if($result){
    		//successfully updated
    		$resposne["success"] = 1;
    		$response["message"] = "Product successfully updated.";

    		//echo Json response
    		echo json_encode($response);
    	}
    	else{}
    }
	else{
		//required field is missing
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";

		//echo Json response
    	echo json_encode($response);
	}
?>

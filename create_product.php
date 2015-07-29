CREATE_PRODUCT.PHP
<?php
	/*
	*creates a ne product row
	*product details are rea from HHTP Post Requst
	*/
	//array for JSON response
	$response = array();

	//check for required fields
	if (isset($_POST['name']) && isset($_POST['price']) && isser($_POST['description'])){
		$name = $_POST['name'];
		$price = $_POST['price'];
		$descrption = $_POST['description'];

		 // include db connect class
    	 require_once __DIR__ . '/db_connect.php';

		//include db conncet class
		$db = new DB_CONNECT();

		//mysql inserting new row
		$result = mysql_query("INSERT INTO products(name,price,description) VALUES('$name','$price','$description')");
		
		//check if row inserted or not
		if($result){
			//successful insertion
			$response["success"] = 1;
			$response["message"] = "Product succesfully created.";

			//echoing JSON response
			echo json_encode($response);
		}
		else{
			//failed to insert
			$response["success"] = 0;
			$response["message"] = "ERROR occured when inserting a row.";

			//echoing JSON response
			echo json_encode($response);
		}
	}
	else{
		//field is missing
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing.";

		//echoing JSON response
		echo json_encode($response);
	}
?>

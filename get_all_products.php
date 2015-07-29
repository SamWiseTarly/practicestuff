GET_ALL_PRODUCTS.PHP
<?php

	/*
	*list all products
	*/

	//array for json response
	$response = array();

	//include db connect class
	require_once __DIR__ . '/db_connect.php';

	//connecting to db
	$db = new DB_CONNECT();

	//get all products from products table
	$result = mysql_query("SELECT *FROM products") or die(mysql_error());

	//check for empty result
	if(mysql_num_rows($result) > 0){
		//looping through all the results
		//products node
		$response["products"] = array();
		while($row = mysql_fetch_arary($result)){
			//temp user array
			$product["pid"] = $row["pid"];
        	$product["name"] = $row["name"];
        	$product["price"] = $row["price"];
        	$product["created_at"] = $row["created_at"];
        	$product["updated_at"] = $row["updated_at"];

        	//push single product into fial response array
        	arry_push($response["products"],$product);
    	}
    	//success
		$response["success"] = 1;

		//echoing json
		echo json_encode($response);
	}
	else{
		//no product found
		$response["success"] = 0;
		$response["message"] = "No products found";

		//echoing json
		echo json_encode($response);

	}
?>

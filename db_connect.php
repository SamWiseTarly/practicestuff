DB_CONNECT.PHP

<?php

	/*
	* class file to connect database
	*/

	class DB_CONNECT{
		//constructor
		function __construct(){
			$this->connect();
		}
		//destructor
		function __destruct(){
			$this->close();
		}
		/*
		*Connects with database
		*/
		function connect(){
			//imports database connection variables
			require_once __DIR__ . 'db_config.php';
			//connects to mysql database
			$con = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD or die(mysql_error));
			// Selecting database
			$db = mysql_select_db(DB_DATABASE) or die (mysql_error()) or die(mysql_error());
			//return connection cursor
			return $con;
		}
		/*
		* close the connection to the database
		*/
		function close() {
			//closing db connection

			mysql_close();
		}

	}
	?>

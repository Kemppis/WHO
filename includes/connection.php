<?php
	
	//$dbServername = "mysli.oamk.fi";
	//$dbUsername = "t6keil00";
	//$dbPassword = "n7r4eq4tY9Axrcpa";
	//$dbName = "opisk_t6keil00";

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "salasana";
	$dbName = "who";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	try
	{
	 //$conn_string = "mysql:host=mysli.oamk.fi;dbname=opisk_t6keil00";
		$conn_string = "mysql:host=localhost;dbname=who";
	 //$db = new PDO ($conn_string, "t6keil00", "n7r4eq4tY9Axrcpa");
		$db = new PDO ($conn_string, "root", "salasana");
	 $db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e)
	{
	 print ("Cannot connect to server\n");
	 print ("Error code: " . $e->getCode () . "\n");
	 print ("Error message: " . $e->getMessage () . "\n");
	}

?>
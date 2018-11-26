<?php

	$servername = "mysql.hostinger.com";
	$database = "u381963613_uhdlm";
	$username = "u381963613_cs332";
	$password = "uhd123";

	// Create connection

	$conn = mysqli_connect($servername, $username, $password, $database);
	
	// Check connection

	if (!$conn) {

  	  die("Connection failed: " . mysqli_connect_error());

	}
    echo "Connected successfully";
	//mysqli_close($conn);
	?>

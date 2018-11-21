<?php
//// ($dbServername, $dbUsername$dbPassword, $dbName)
$conn=mysqli_connect("localhost", "id7807200_uhd","uhd1234", "id7807200_uhd");
if(!$conn){
	echo "not connected";
}else{
	echo "connected succesfully to the project database ";
}
?>
<?php

$servername ="localhost";
$serverusername="root";
$serverpassword="";
$databasename="lms";

$conn=mysqli_connect($servername,$serverusername,$serverpassword,$databasename);

if($conn){
	//echo "connected";
}

else {
	echo "error";
}

?>

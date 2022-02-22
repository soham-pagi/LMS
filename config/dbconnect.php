<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'root', '', 'library');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	} else {
		// echo 'Connection successful.';
	}
?>

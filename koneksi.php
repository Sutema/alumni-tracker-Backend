<?php

	$server		= "localhost"; 
	$user		= "id3578347_sutemadb"; 
	$password	= "11112017abc"; 
	$database	= "id3578347_sutema_db"; 
	
	$con = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	} else {
	    echo "berhasil";
	} 

?>
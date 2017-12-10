<?php

include_once "koneksi.php";

	class usr{};
    
    $email = $_POST["email"];
	$password = $_POST["password"];
	
    
	if ((empty($email))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom email tidak boleh kosong";
		die(json_encode($response));
	} else if ((empty($password))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom password tidak boleh kosong";
		die(json_encode($response));
	} else {
			$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='".$email."'"));

			if ($num_rows == 0){
				$query = mysqli_query($con, "INSERT INTO users (email, password) VALUES('".$email."','".$password."')");

				if ($query){
					$response = new usr();
					$response->success = 1;
					$response->message = "Register berhasil, silahkan login.";
					die(json_encode($response));

				} else {
					$response = new usr();
					$response->success = 0;
					$response->message = "users sudah ada";
					die(json_encode($response));
				}
			} else {
				$response = new usr();
				$response->success = 0;
				$response->message = "users sudah ada";
				die(json_encode($response));
			}
		}

	mysqli_close($con);
	
	
	?>
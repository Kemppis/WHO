<?php

session_start();

if (isset($_POST['submit'])) {
	
	include_once 'connection.php';

	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)) {
		header("Location: ../index.php?signup=empty");
		exit();
	} else {
		if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
			header("Location: ../index.php?signup=invalid");
			exit();
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				print_r($info);
				header("Location: ../index.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM profile WHERE username='$username'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../index.php?signup=usertaken");
					exit();
				} else {
					//hashin'
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

					$sql = "INSERT INTO profile (firstname, lastname, email, username, password) VALUES ('$firstname','$lastname','$email','$username','$hashedPassword');";

					$result = mysqli_query($conn, $sql);

					header("Location: ../index.php?signup=success");
					exit();
				}
			}
		}
	}
	
} else {
	header("Location: ../index.php");
	exit();
}

?>
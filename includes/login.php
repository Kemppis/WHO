<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'connection.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($username) || empty($password)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM profile WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=login_error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hash
				$hashedPasswordCheck = password_verify($password, $row['password']);
				
				if ($hashedPasswordCheck == false) {
					header("Location: ../index.php?login=login_error");
					exit();
				} elseif ($hashedPasswordCheck == true) {
					$_SESSION['session_id'] = $row['profile_id'];
					$_SESSION['session_firstname'] = $row['firstname'];
					$_SESSION['session_lastname'] = $row['lastname'];
					$_SESSION['session_email'] = $row['email'];
					$_SESSION['session_username'] = $row['username'];
					$_SESSION['logged_in'] = true;

					header("Location: ../home.php?login=success");
					exit();
				}				
			}
		}
	}
}
?>
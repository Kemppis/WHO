<?php
	include_once 'connection.php';
	include 'login.php';

	$post = mysqli_real_escape_string($conn, $_POST['newPost']);

	if(empty($post)) {
		header("Location: ../home.php?new_post=empty");
		exit();
	} else {
		$profile_id = $_SESSION['session_id'];
		
		$sql = "INSERT INTO post (profile_id, post)
		VALUES ('$profile_id','$post')";

		if ($conn->query($sql) === TRUE) {
	    	header("Location: ../home.php?new_post=success");
			exit();
		} else {
	 	   //echo "Error: " . $sql . "<br>" . $conn->error;

			header("Location: ../home.php?new_post=fail");
			exit();
		}
	}
?>
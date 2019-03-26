<?php

	include_once 'connection.php';
	include 'login.php';

	$comment = mysqli_real_escape_string($conn, $_POST['newComment']);

	if(empty($comment)) {
		header("Location: ../home.php?new_comment=empty");
		exit();
	} else {
		$profile_id = $_SESSION['session_id'];

		$post_id = $_POST['postId'];
		
		$sql = "INSERT INTO comment (post_id, profile_id, comment)
		VALUES ('$post_id','$profile_id','$comment')";

		if ($conn->query($sql) === TRUE) {
	    	header("Location: ../home.php?new_comment=success");
			exit();
		} else {
			header("Location: ../home.php?new_comment=fail");
			exit();
		}
	}
?>
<?php

	include_once 'connection.php';
	include 'login.php';
	
	$profile_id = $_SESSION['session_id'];

	$friend_id = mysqli_real_escape_string($conn, $_POST['friendId']);
		
	$sql = "INSERT INTO friends (profile_id, friend_id)
	VALUES ('$profile_id','$friend_id')";

	if ($conn->query($sql) === TRUE) {
	   	header("Location: ../home.php?new_friend=success");
		exit();
	} else {
		header("Location: ../home.php?new_comment=fail");
		exit();
	}

?>
<?php 
include 'includes/header.php'; 

session_start();

if (!isset($_SESSION['logged_in'])){ 
    header("Location:index.php");
    exit();
}

?>

<style>
	#homeButton {
		background-color: #33bbff;	
	}
</style>

<body>
	<nav>
		<button onclick="location.href = 'home.php';" id="homeButton"; class="home">
			Home</button>
	
		<form class="search-form" action="search.php" method="POST">
			<input type="text" name="newSearch" id="searchText" placeholder="New search";>
			<button type="submit" name="post" placeholder="Post" id="searchButton";>Search</button>
		</form>
		
		<button onclick="location.href = 'profile.php';" id="profileButton"; class="profile">
			Profile</button>		
		<button onclick="location.href = 'settings.php';" id="settingsButton"; class="settings">
			Settings</button>
	</nav> <br><br><br><br><br>

<br><br>
<form class="post-form" action="includes/new_post.php" method="POST">
	<input type="text" name="newPost" required placeholder="New post";>
	<br>
	<button type="submit" name="post" required placeholder="Post" id="newPostButton";>Post</button>
</form>	

<br><br>
<?php
/*

$sql3 = "DELETE FROM history 
WHERE systemidentifier = '$systemIdentifier'
and dbTimestamp < 
(select * from (SELECT dbTimestamp 
FROM history
where systemidentifier = '$systemIdentifier'
ORDER BY dbTimestamp desc LIMIT 1 OFFSET 49) as t)";
*/



$sql="SELECT * FROM post ORDER BY post_id DESC";




/*
	  WHERE profile_id = ".$_SESSION['session_id']; "or (SELECT * FROM friends WHERE profile_id = ".$_SESSION['session_id'];
		
	  //= ".$row['post_id'];
*/

$result=$db->query($sql);

foreach ($result as $row) {
?>

<table class="table table-hover table-bordered table-striped">
<table border="1">
	<tr class="table table-info">
	<?php
	
		if($row['profile_id'] == $_SESSION['session_id']){
		echo '<th>'.'Me: '.'</th>';
	} else { echo '<th>'.'Friend Who: '.'</th>';}
		
	?>
		
	</tr>

<?php

	echo '<tr>';
		echo '<td>'.$row['post'].'</td>';
	echo '</tr>';

	$commentsql="SELECT * FROM comment WHERE post_id = ".$row['post_id'];
	$comments=$db->query($commentsql);
	
foreach ($comments as $postcomment) {

	echo '<tr>';
		echo '<td>'.'____'.$postcomment['comment'].'</td>';
	echo '</tr>';
}
	echo '<br>';

	$post_id = $row['post_id'];
?>
	<tr>
		<td>
		<form class="comment-form" action="includes/new_comment.php" method="POST";>
			<input type="hidden" name="postId" value="<?php echo $post_id; ?>">
 			<input type="text" name="newComment" required placeholder="New comment";>
 			<button type="submit" name="Comment" >Comment</button>
 		</form>
 		</td>
 	</tr>
</table>

<?php 
}
include 'includes/footer.php'; ?>
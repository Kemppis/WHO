<?php
include 'includes/header.php';
include 'includes/login.php';
?>

<style>
	#profileButton {
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
	</nav> <br><br><br><br><br><br>
	<b>My informantions:</b>
	<table class="table table-hover table-bordered table-striped">
	<table border="1">
	<tr class="table table-info">
		<th>profile_id</th><th>firstname</th><th>lastname</th><th>email</th><th>username</th>
	</tr>

	<?php
	echo '<tr>';
	echo '<td>'.$_SESSION['session_id'].'</td>';
	echo '<td>'.$_SESSION['session_firstname'].'</td>';
	echo '<td>'.$_SESSION['session_lastname'].'</td>';
	echo '<td>'.$_SESSION['session_email'].'</td>';
	echo '<td>'.$_SESSION['session_username'].'</td>';
	echo '</tr>';


	
	?>
	</table>
	<br><br>
	<b>My Posts:</b><br>

	<?php

	$postsql="SELECT * FROM post WHERE profile_id = ".$_SESSION['session_id']." ORDER BY post_id DESC";
	$myposts=$db->query($postsql);

	foreach ($myposts as $posts) {
		?>

		<table class="table table-hover table-bordered table-striped">
		<table border="1">

		<?php
		echo '<tr>';
			echo '<td>'.$posts['post'].'</td>';
		echo '<tr>';

		?>

		</table><br>
		
		<?php

		}

	 include 'includes/footer.php';
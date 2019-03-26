<?php
include 'includes/header.php';
include 'includes/connection.php';
include 'includes/login.php';
?>

<style>
	#settingsButton {
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

	<button onclick="location.href = 'includes/logout.php';" id="logoutButton"; method="POST"; name="logout">
			Log out</button>

<?php include 'includes/footer.php'; ?>
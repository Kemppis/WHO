<?php 
include 'includes/header.php';

session_start();

if (!isset($_SESSION['logged_in'])){ 
    header("Location:index.php");
    exit();
}

?>

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

<?php

$name = mysqli_real_escape_string($conn, $_POST['newSearch']);
//$name = $_POST['newSearch'];

$search = "SELECT * FROM profile WHERE firstname LIKE '$name' OR lastname LIKE '$name' OR username LIKE '$name'";

$results=$db->query($search);

foreach ($results as $row) {
?>

<table class="table table-hover table-bordered table-striped">
<table border="1">

<tr>
	<td>First name:</td><td>Last name:</td><td>User name:</td>
</tr>

<?php

	echo '<tr>';
		echo '<td>'.$row['firstname'].'</td>' . '<td>'.$row['lastname'].'</td>'. '<td>'.$row['username'].'</td>';
	
	$friend_id = $row['profile_id'];

?>
		<td>
			<form class="friend-form" action="includes/new_friend.php" method="POST">
				<input type="hidden" name="friendId" value="<?php echo $friend_id; ?>">
				<button type="submit" name="AddFriend">Add to your list</button>
			</form>
		</td>
	</tr>
</table>
<?php 
}

include 'includes/footer.php';    
?>
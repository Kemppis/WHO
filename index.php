<?php 
	include 'includes/header.php'
?>

<body>
	<nav>
	<form class="login-form" action="includes/login.php" method="POST">
		<input type="text" name="username" required placeholder="Username">
		<input type="password" name="password" required placeholder="Password">
		<button type="submit" name="submit">Log in</button>
	</form>	
	
	</nav>

<br><br><br><br>

<script>

var x = location.search;
if(x=='?signup=email'){
	alert('email is invalid!');
} 
if(x=='?signup=empty'){
	alert('Some field(s) was empty!');
}
if(x=='?signup=usertaken'){
	alert('Username already taken!');
}
if(x=='?signup=success'){
	alert('Great! You can now log in!');
}
if(x=='?signup=invalid'){
	alert('First name or lastname was invalid');
}

</script>

	<section>
		<div>
			<h2>Sign up</h2>
			<form class="signup-form" action="includes/signup.php" method="POST">
				<input type="text" name="firstname" placeholder="First name"><br>
				<input type="text" name="lastname" placeholder="Last name"><br>
				<input type="text" name="email" placeholder="Email"><br>
				<input type="text" name="username" placeholder="Username"><br>
				<input type="password" name="password" placeholder="Password"><br><br>
				<button type="submit" name="submit">Sign up</button>
			</form>
		</div>
	</section>

	

<?php 
include 'includes/footer.php'	?>
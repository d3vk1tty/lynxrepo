<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

$ch = curl_init("http://www.example.com/");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
                <h1><a href="home.php">Website Title</a></h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="dashboard.php">Dashboard</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<div class="card">
			<img src="https://www.w3schools.com/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%;">
			<h1>Tailored Jeans</h1>
			<p class="price">$19.99</p>
			<p>Some text about the jeans..</p>
			<p><button>Add to Cart</button></p>
			</div>  
		</div>

		
		
	</body>
	
</html>
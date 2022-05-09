<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT productname, price, minpurchase, stock FROM marketlistings WHERE sellerid = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($productname, $price, $minpurchase, $stock);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
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
			<h2>Market Dashboard</h2>
            <p>
			<td><?=$productname?> | <?=$price?> | <?=$stock?> | <?=$minpurchase?></td> </br>
            </p>
            <form>
		    <input type="text" name="productname" placeholder="product name" id="prdouctname" required>
			<input type="text" name="price" placeholder="price" id="price" required>
			<input type="text" name="stock" placeholder="stock" id="stock" required>
			<input type="text" name="minpurchase" placeholder="minpurchase" id="minpurchase" required>
            <input type="submit" value="Create Listing">
            </form>
            
		</div>
	</body>
</html>
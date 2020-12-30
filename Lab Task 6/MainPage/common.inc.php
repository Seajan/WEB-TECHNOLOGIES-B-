<?php
	include "../db/db_connect.inc.php";

	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: ../login/index.php");
	} else {
		$uname = $utype = $ufname =$type = $name= "";
		$uname = $_SESSION['username'];
		$sql = "SELECT * FROM login WHERE username='$uname'";
		$result = mysqli_query($conn, $sql);
	
		while ($row = mysqli_fetch_assoc($result)) {
			setcookie('name',$row['name'],time()+3600);
			setcookie('type',$row['type'],time()+3600);
			$type=($_COOKIE['type']);
			$name=($_COOKIE['name']);
		}
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="common.css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</head>
	<body>
		<input type="checkbox" id="check">
		<label for="check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>
		</label>
		<nav class="sidebar">
			<header><a href="index.php">Dashboard</a></header>
			<ul class="pop">
				<li><a href="#"><i class="fas fa-user-circle"></i>Profile<span class="sub_arrow"></span></a>
					<ul>
						<li><a href="viewprofile.php"><i class="fas fa-address-card"></i>View Profile</a></li>
						<li><a href="editprofile.php"><i class="fas fa-user-edit"></i>Edit Profile</a></li>
						<li><a href="changepassword.php"><i class="fas fa-key"></i>Change Password</a></li>
						<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
					</ul>
				</li>	
			</ul>
			<div class="social_media">
				<a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
				<a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
				<a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
			</div>
		</nav>
		<div class="unknown" class="boxp">
			<p>Hello, <?php echo strtoupper($name); ?></p>
			<p>Username: <?php echo $_SESSION['username']; ?></p>
			<p>User Type: <?php echo $type; ?></p>
		</div>	
	</body>
</html>
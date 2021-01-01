<?php

include "../db/db_connect.inc.php";

$name = $email = $mobile = $username = $password = $result = "";
$usernameErr = $passErr = $uNameInDBerr = $success=$uNameInDB = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST['name'])) {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
	}
	if (!empty($_POST['email'])) {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
	} 
	if (!empty($_POST['mobile'])) {
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
	} 
	if (!empty($_POST['username'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
	} 
	if (!empty($_POST['password'])) {
		$password = mysqli_real_escape_string($conn, $_POST['password']);
	} 
	$sqlUserCheck = "SELECT username FROM login WHERE username = '$username'";
	$result = mysqli_query($conn, $sqlUserCheck);

	while ($row = mysqli_fetch_assoc($result)) {
		$uNameInDB = $row['username'];
	}

	if (!empty($name) && !empty($email) && !empty($mobile) && !empty($username) && !empty($password)) {
		if ($uNameInDB == $username) {
			$uNameInDBerr = "Username already taken!";
		} else {
			$sql = "INSERT INTO login (name, email, mobile, username, password, type) 
		VALUES ('$name', '$email', '$mobile', '$username', '$password', 'lecturer');";
			mysqli_query($conn, $sql);

			$name = $email = $mobile = $username = $password = $result = "";
			$success = "Successfully Submitted.";
		}
	}
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Registration</title>
	<link rel="stylesheet" href="signup.css">
	<script src="validSignup.js"></script>
</head>

<body>
	<div class="wrap">
		<h2>Sign Up Here</h2>
		<form action="index.php" method="POST" name="myForm" onsubmit="return validateForm()">
			<input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
			<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
			<input type="text" name="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>">
			<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"><span style="color:red;"> <?php echo $uNameInDBerr; ?><?php echo $usernameErr; ?> </span>
			<input type="Password" name="password" placeholder="Password">
			<span style="color:green;"> <?php echo $success; ?> </span>
			<input type="submit" value="Submit"><br>
			<p><b>Or Log In <a href="../login/index.php">here</a></b></p>

		</form>
	</div>
</body>

</html>
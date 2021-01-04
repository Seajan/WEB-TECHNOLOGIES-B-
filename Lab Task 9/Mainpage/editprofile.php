<?php
include "../mainpage/common.inc.php";


$name = $email =  $message = $mobile = "";
$nameErr = $emailErr = $mobileErr = "";

$username = $_SESSION['username'];

$sql = "SELECT name,email,mobile from login WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);

if ($rowCount < 1) {
    $message = "User does not exist!";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['name'])){
        $nameErr = "name Cannot be empty.";
    } else{
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }
    if(empty($_POST['email'])){
        $mobileErr = "Email Cannot be empty.";
    } else{
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }
    if(empty($_POST['mobile'])){
        $mobileErr = "mobile Cannot be empty.";
    } else{
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    }

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile'])){
    $sql = "UPDATE login SET name='$name', email='$email', mobile='$mobile' WHERE username='$username'";
	mysqli_query($conn, $sql);
    $message = "Information Successfully changed. :)";
    }

}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="editprofile.css">
</head>

<body>
    <div class="box">
        <form action="editprofile.php" method="post">
            <h1>Edit Your Profile <i class="fas fa-pen"></i></h1>
            <p>Name</p><br>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>
            <p>Email Address <i class="far fa-envelope"></i></p><br>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            <p>Mobile</p><br>
            <input type="text" name="mobile" value="<?php echo $mobile; ?>"><br>
            <input type="submit" value="Confirm"><br>
        </form>
    </div>
</body>

</html>
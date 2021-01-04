<?php

include "../mainpage/common.inc.php";


$name = $email = $mobile = $type = $message = "";
$username = $_SESSION['username'];

$sql = "SELECT name, email, mobile, type from login WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);

if ($rowCount < 1) {
    $message = "User does not exist!";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $type = $row['type'];
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="viewprofile.css">

</head>

<body>
    <div class="box">
        <form action="showprofile.php">
            <h1>Profile Info <i class="fas fa-users"></i></h1>
            <p>Name</p><br>
            <input type="text" name="firstname" disabled value="<?php echo $name; ?>"><br>
            <p>Email Address <i class="far fa-envelope"></i></p><br>
            <input type="email" name="email" disabled value="<?php echo $email; ?>"><br>
            <p>Mobile</p><br>
            <input type="text" name="mobile" disabled value="<?php echo $mobile; ?>"><br>
            <p>Type</p><br>
            <input type="text" name="type" disabled value="<?php echo $type; ?>"><br>
        </form>
    </div>
</body>

</html>
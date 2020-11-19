<!DOCTYPE HTML>
<?php
$name = $email = $gender = $dob = '';
$nameErr = $emailErr = $genderErr = $dobErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (str_word_count($name) < 2) {
            $nameErr = "Must contain at least two words";
            $name = "";
        } else {
            if (!preg_match("/^[a-zA-Z]/", $name)) {
                $nameErr = "Must start with a letter";
                $name = "";
            } else {
                if (!preg_match("/^[a-zA-Z -]*$/", $name)) {
                    $nameErr = "Must be letters or periods or dashs";
                    $name = "";
                }
            }
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "E-mail is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email = "";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
        $month = date('m', strtotime($dob));
        $day = date('d', strtotime($dob));
        $year = date('Y', strtotime($dob));
        if (($day >= 1 && $day <= 31) && ($month >= 1 && $month <= 12) && ($year >= 1953 && $year <= 1998)) {
            $dob = test_input($_POST["dob"]);
        } else {
            $dobErr = "Invalid Date (Year must be between 1953-1998)";
            $dob = "";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>
<style>
    .error {color: #FF0000;}
</style>

<head>
    <title>Dashboard</title>
</head>

<body>
    <div style="max-width: fit-content; margin-left: auto; margin-right:auto">
        <table style="width: fit-content; border: 2px solid #000; border-collapse: collapse;">
            <tr>
                <td colspan="2" style="border: 2px solid #000; border-collapse: collapse;">
                    <?php include 'header2.php'; ?>
                </td>
            </tr>
            <tr>
                <td style="border: 2px solid #000; border-collapse: collapse; " width="20%">
                    <?php include 'sidebar.php'; ?>
                </td>
                <td>
                    <table width="75%">
                        <tr>
                            <td colspan="3">
                                <h2>PROFILE</h2>
                            </td>
                        </tr>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                        <tr>
                            <td style="width: fit-content;">
                                <p align="margin-left">
                                    Name
                                    <br><br>
                                    E-mail <br>
                                    <br>
                                    Gender <br>
                                    <br>
                                    Date of Birth <br>
                                    <br>
                                </p>
                            </td>
                            <td style="width: fit-content;">
                                <p align="margin-left">
                                    : <input type="text" name="name"><span class="error">* <?php echo $nameErr; ?></span>
                                    <br><br>
                                    : <input type="text" name="email"><span class="error">* <?php echo $emailErr; ?></span>
                                    <br><br>
                                    : <input type="radio" name="gender" value="Male">Male
                                    <input type="radio" name="gender" value="Female">Female
                                    <input type="radio" name="gender" value="Other">Other
                                    <span class="error">* <?php echo $genderErr; ?></span>
                                    <br><br>
                                    : <input type="date" name="dob"><span class="error">* <?php echo $dobErr; ?></span>
                                    <br><br>
                                </p>
                            </td>
                            <td align="center" width="30%">
                                <img style="border: 3px solid #555 " width="130" height="130" src="Profile.png" alt="Profile Icon">
                                <br><br>
                                <a href="ChangePP.php">Change</a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit" name="save" value="Save">
                                <br><br>
                            </td>
                        </tr>
                        </form>
                        <tr>
                            <td colspan="3">
                                <?php
								echo "<h2>Inputs:</h2>";
								echo "<b>Name:</b> ".$name;
								echo "<br><br>";
								echo "<b>E-mail:</b> ".$email;
								echo "<br><br>";
								echo "<b>Gender:</b> ".$gender;
								echo "<br><br>";
								echo "<b>Date of Birth:</b> ".$dob;
								echo "<br><br>";
							    ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border: 2px solid #000; border-collapse: collapse;">
                    <?php include 'footer.php'; ?>
                </td>
            </tr>
        </table>
        <div>
</body>

</html>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Registration Page</title>
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	<body>  

		<?php

			$nameErr= $emailErr= $usernameErr= $pwdNErr= $pwdRErr= $genderErr= $dobErr=  "";
			$month = $day = $year ="";
			$name= $email= $username= $pwdN= $pwdR= $gender= $dob=  "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				if (empty($_POST["name"])) 
			  	{
			  		$nameErr = "Name is required";
			  	}
			  	else
			  	{
			  		$name = test_input($_POST["name"]);
			  		if (str_word_count($name)<2)
			  		{
			  			$nameErr = "Must contain at least two words";
			  			$name = "";
			  		}
			  		else
			  		{
			  			if (!preg_match("/^[a-zA-Z]/",$name)) 
			  			{
	      					$nameErr = "Must start with a letter";
	      					$name = "";
	    				}
	    				else
	    				{
	    					if (!preg_match("/^[a-zA-Z -]*$/",$name))
	    					{
	    						$nameErr = "Must be letters or periods or dashs";
	    						$name = "";
	    					}
	    				}

			  		}
			  	}

				if (empty($_POST["email"])) 
			  	{
			  		$emailErr = "E-mail is required";
			  	}
			  	else
			  	{
			  		$email = test_input($_POST["email"]);
			  		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			  		{
	  					$emailErr = "Invalid email format";
	  					$email = "";
	  				}
	  			}

	  			if (empty($_POST["username"])) 
			  	{
			  		$usernameErr = "Name is required";
			  	}
			  	else
			  	{
			  		$username = test_input($_POST["username"]);
			  		if (!preg_match("/^[a-zA-Z._-]*$/",$username))
			  		{
			  			$usernameErr = "Must be alpha numeric characters, period, dash or underscore";
			  			$username = "";
			  		}
			  		
			  		elseif (strlen($username)<2) 
			  		{
	      				$usernameErr = "Must contain at least two (2) characters";
	      				$username = "";
	    			}
			  	}

			  	if (empty($_POST["pwdN"])) 
			  	{
			  		$pwdNErr = "Password is required";
			  	}
			  	else
			  	{
			  		$pwdN = test_input($_POST["pwdN"]);	
			  		if (strlen($pwdN)<8) 
			  		{
	      				$pwdNErr = "Must not be less than eight (8) characters";
	      				$pwdN = "";
	    			}
	    			elseif(strpos($_POST["pwdN"], "$") == false && strpos($_POST["pwdN"], "@") == false && strpos($_POST["pwdN"], "%") == false &&strpos($_POST["pwdN"], "#") == false)
	    			{
	    				$pwdNErr = "Must contain at least one of the special characters (@, #, $, %)";
	    				$pwdN = "";
			  		}
			  	}

			  	if (empty($_POST["pwdR"])) 
			  	{
			  		$pwdRErr = "Please retype Password";
			  		$pwdN = "";
			  	}
			  	else
			  	{
			  		$pwdR = test_input($_POST["pwdR"]);	
			  		if ($pwdN != $pwdR) 
			  		{
	      				$pwdRErr = "Retyped Password must match with the password";
	      				$pwdR = "";
	      				$pwdN = "";
	    			}
			  	}

	  			if (empty($_POST["gender"])) 
			  	{
			  		$genderErr = "Gender is required";
			  	}
			  	else
			  	{
			  		$gender = test_input($_POST["gender"]);
			  	}

	  			if (empty($_POST["dob"])) 
			  	{
			  		$dobErr = "Date of Birth is required";
			  	}
			  	else
			  	{
			  		$dob = test_input($_POST["dob"]);
			  		$month = date('m', strtotime($dob));
			  		$day = date('d', strtotime($dob));
			  		$year = date('Y', strtotime($dob));
			  		if (($day>=1 && $day<=31) && ($month>=1 && $month<=12) && ($year>=1953 && $year<=1998)) 
			  		{
			  			$dob = test_input($_POST["dob"]);
			  		}
			  		else
			  		{
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

		<div style="max-width:1000px; margin-left: auto; margin-right:auto">
			<table style="width: 1000px; border: 2px solid #000; border-collapse: collapse;">
				<tr>
					<td style="border: 2px solid #000; border-collapse: collapse;">
						<?php include 'header.php';?>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<div style="width:fit-content; margin-left:auto; margin-right:auto; text-align: left;">
							<h2>Registration</h2>
							<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
								Name: <input type="text" name="name">
								<span class="error">* <?php echo $nameErr;?></span>
								<br><br>
								E-mail: <input type="text" name="email">
								<span class="error">* <?php echo $emailErr;?></span>
								<br><br> 
								User Name: <input type="text" name="username">
								<span class="error">* <?php echo $usernameErr;?></span>
								<br><br>
								Password:<input type="Password" name="pwdN">
								<span class="error">* <?php echo $pwdNErr;?></span>
								<br><br>
								Confirm Password: </font><input type="Password" name="pwdR">
								<span class="error">* <?php echo $pwdRErr;?></span>
								<br><br>  
								Gender:
								<input type="radio" name="gender" value="Male">Male
								<input type="radio" name="gender" value="Female">Female
								<input type="radio" name="gender" value="Other">Other
								<span class="error">* <?php echo $genderErr;?></span>
								<br><br> 
								</b>Date of Birth: <input type="date" name="dob">
								<span class="error">* <?php echo $dobErr;?></span>
								<br><br>
								<input type="submit" name="submit1" value="Submit">  
							</form>

							<?php
								echo "<h2>Inputs:</h2>";
								echo "<b>Name:</b> ".$name;
								echo "<br><br>";
								echo "<b>E-mail:</b> ".$email;
								echo "<br><br>";
								echo "<b>User Name:</b> ".$username;
								echo "<br><br>";
								echo "<b>Password:</b> ".$pwdN;
								echo "<br><br>";
								echo "<b>Confirm Password:</b> ".$pwdR;
								echo "<br><br>";
								echo "<b>Gender:</b> ".$gender;
								echo "<br><br>";
								echo "<b>Date of Birth:</b> ".$dob;
								echo "<br><br>";
							?>
						</div>
				</tr>
				<tr>
					<td style="border: 2px solid #000; border-collapse: collapse;">
						<?php include 'footer.php';?>
					</td>
			</table>
		<div>
	</body>
</html>

<!DOCTYPE HTML>
<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	<body>  

		<?php

			$pwd= $pwdN= $pwdR= "";
			$pwdErr= $pwdNErr= $pwdRErr= ""; 

			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
			  	if (empty($_POST["pwd"])) 
			  	{
			  		$pwdErr = "Current password is required";
			  	}
			  	else
			  	{
			  		$pwd = test_input($_POST["pwd"]);
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
			  		elseif ($pwd == $pwdN)
	    			{
	    				$pwdNErr = "New Password should not be same as the Current Password";
	    				$pwdN = "";
			  		}
			  		
			  	}

			  	if (empty($_POST["pwdR"])) 
			  	{
			  		$pwdRErr = "Please retype New Password";
			  		$pwdN = "";
			  	}
			  	else
			  	{
			  		$pwdR = test_input($_POST["pwdR"]);	
			  		if ($pwdN != $pwdR) 
			  		{
	      				$pwdRErr = "Retyped Password must match with the New Password";
	      				$pwdR = "";
	      				$pwdN = "";
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
		<div style="max-width: 1000px; margin-left: auto; margin-right:auto">
			<table style="width: 1000px; border: 2px solid #000; border-collapse: collapse;">
				<tr>
					<td colspan="2" style="border: 2px solid #000; border-collapse: collapse;">
						<?php include 'header2.php';?>
					</td>
				</tr>
				<tr>
					<td style="border: 2px solid #000; border-collapse: collapse; " width="20%">
						<?php include 'sidebar.php';?>
					</td>
					<td>
						<div style="max-width:790px; margin-left: auto; margin-right:auto">
							<h2>CHANGE PASSWORD</h2>
							<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">    
								Current Password: <input type="Password" name="pwd">
								<span class="error">* <?php echo $pwdErr;?></span>
								<br><br>
								<font color="green">New Password: </font><input type="Password" name="pwdN">
								<span class="error">* <?php echo $pwdNErr;?></span>
								<br><br>
								<font color="red">Retype New Password: </font><input type="Password" name="pwdR">
								<span class="error">* <?php echo $pwdRErr;?></span>
								<br><br>
								<input type="submit" name="submit" value="Submit">  
							</form>

							<?php
								echo "<h2>Inputs:</h2>";
								echo "<b>Current Password:</b> ".$pwd;
								echo "<br><br>";
								echo "<b>New Password:</b> ".$pwdN;
								echo "<br><br>";
								echo "<b>Retyped Password:</b> ".$pwdR;
								echo "<br><br>";
							?>
						</div>
					</td>
				</tr>
			</table>
		<div>
	</body>
</html>

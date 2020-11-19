<!DOCTYPE HTML>
<html>
	<head>
		<title>Forgot Password</title>
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	<body>  
		<?php

			$emailErr= "";
			$email= "";

			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
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
            }
            
			function test_input($data) 
			{
	 			$data = trim($data);
	 			$data = stripslashes($data);
	  			$data = htmlspecialchars($data);
	  			return $data;
			}
			
		?>

		<div style="max-width:fit-content; margin-left: auto; margin-right:auto">
			<table style="width: fit-content; border: 2px solid #000; border-collapse: collapse;">
				<tr>
					<td style="border: 2px solid #000; border-collapse: collapse;">
						<?php include 'header.php';?>
					</td>
				</tr>
				<tr>
					<td>
						<div style="max-width:fit-content; margin-left: auto; margin-right:auto">
							<h2>FORGOT PASSWORD</h2>
							<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
								E-mail: <input type="text" name="email">
								<span class="error">* <?php echo $emailErr;?></span>
								<br><br>  
								<input type="submit" name="submit1" value="Submit">
							</form>

							<?php
								echo "<h2>Inputs:</h2>";
								echo "<b>E-mail:</b> ".$email;
								echo "<br><br>";
							?>
						</div>
					</td>
				</tr>
				<tr>
					<td style="border: 2px solid #000; border-collapse: collapse;">
						<?php include 'footer.php';?>
					</td>
			</table>
		<div>
	</body>
</html>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>
		<div style="max-width: fit-content; margin-left: auto; margin-right:auto">
			<table style="width: fit-content; border: 2px solid #000; border-collapse: collapse;">
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
						<table style="width: fit-content;">
							<tr>
								<td colspan="3">
									<h2>PROFILE</h2>
								</td>
							</tr>
							<tr>
								<td width="30%">
									<p align="margin-left">
										Name <br>
										<br>
										E-mail <br>
										<br>
										Gender <br>
										<br>
										Date of Birth <br>
										<br>
									</p>
								</td>
								<td width="300px">
									<p align="margin-left">
										: Bob <br>
										<br>
										: bob@aiub.edu <br>
										<br>
										: Male <br>
										<br>
										: 19/09/1998 <br>
										<br>
									</p>
								</td>
								<td align="center" width="30%">
									<img style="border: 3px solid #555 " width="130"height="130" src="Profile.png" alt="Profile Icon">
									<br><br>
									<a href="ChangePP.php">Change</a>
								</td>
							</tr>
							<tr>
								<td align="margin-left" colspan="3">
									<a href="Edit_Profile.php"> Edit Profile</a>
									<br><br>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="border: 2px solid #000; border-collapse: collapse;">
						<?php include 'footer.php';?>
					</td>
				</tr>
			</table>
		<div>
	</body>
</html>
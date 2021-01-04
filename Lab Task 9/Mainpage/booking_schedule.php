<?php 
include('common.inc.php');
	$con=mysqli_connect("localhost","root","","bus");
	function showdata()
	{
		global $con;
		$query = "select * from schedule";
		$run = mysqli_query($con,$query);
		if($run == TRUE)
		{
			?>
			<table border="1" width="80%" id="customers" >
				<h1>Schedule Information</h1>
				<tr>
					<th>Bus Name</th>
					<th>Route</th>
					<th>Date</th>
					<th>Time</th>
					<th>Place</th>
				</tr>
			<?php
			while ($data = mysqli_fetch_assoc($run)) 
			{	
				?>
				
				</tr>
					<tr align="center">
					<td><?php echo $data['busname']; ?></td>
					<td><?php echo $data['route']; ?></td>
					<td><?php echo $data['busdate']; ?></td>
					<td><?php echo $data['bustime']; ?></td>
					<td><?php echo $data['placename']; ?></td>
					
				</tr>
				<?php 
			}
			?>
			</table>
			<?php
		}
		
		else
		{
			echo "Error!!!";
		}
	
	
	}

	showdata();
?>


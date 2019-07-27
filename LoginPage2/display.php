<?php
include_once("connection.php");
$query="select * from wishlist";
$result=mysqli_query($con,$query);
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>

<table>
	<tr>
		<th><h2>Wishlist</h2></th>
	</tr>
		<t>
		<th>Item</th>
		<th>Link</th>
		</t>
		<?php
		while($rows=mysqli_fetch_assoc($result))
		{
		?>
			<tr>
			<td><?php echo $rows['Item'];?></td>
			<td><?php echo $rows['Link'];?></td>
			</tr>
		<?php
		}
		?>
</table>
<form action="homepage.php" method="post">
			<div class="inner_container">
				<button class="logout_button" type="submit">Back</button>	
			</div>
		</form>

</body>
</html>
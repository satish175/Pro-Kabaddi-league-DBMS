<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

$query="Select * from player";
$result=mysqli_query($con,$query);
?>
<!doctype html>
<html>
<body>
<h1 align="center">PLAYER DETAILS</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Player_Id</th>
<th>Player_Name</th>
<th>Date_Of_Birth</th>
<th>Nationality</th>
<th>Skill</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{	
?>
	<tr>

	<td><?php echo $row['Player_Id']; ?></td>
	
	<td><?php echo $row['Player_Name']; ?></td>
	
	<td><?php echo $row['Date_Of_Birth']; ?></td>

	<td><?php echo $row['Nationality']; ?></td>

	<td><?php echo $row['Skill']; ?></td>

	<td><a href="edit.php?edit_id=<?php echo $row['Player_Id']; ?>" alt="edit">Edit</a></td>
	</tr>
	<?php
}
?>
</body>
</html>
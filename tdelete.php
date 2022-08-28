<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/menu1.html\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

$query="Select * from team";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body>
<h1 align="center">TEAM DETAILS</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Team_Acronym</th>
<th>Team_Name</th>
<th>Located</th>
<th>Titles</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{	
	
	echo "<tr>";

	echo "<td>".$row['Team_Acronym']."</td>";
	
	echo "<td>".$row['Team_Name']."</td>";
	
	echo "<td>".$row['Located']."</td>";

	echo "<td>".$row['Titles']."</td>";
	
	?>
	<td><a href="tdelete.php?delete_id=<?php echo $row['Team_Acronym']; ?>" onclick="return confirm('Are you sure?');"> Delete</a></td>
	</tr>
	<?php
}?>
</table>
</body>
</html>

<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

if(isset($_GET['delete_id']))
{
	$did=$_GET['delete_id'];
	mysqli_query($con,"DELETE FROM team WHERE Team_Acronym='$did'");
	header("location:tdelete.php");
}
?>



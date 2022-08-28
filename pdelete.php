<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");



$query="Select * from player";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body style="background:url(help1.jpg);background-repeat:no-repeat ;background-size:100%,100%">
<font color="Aqua"><h1 align="center">PLAYER DETAILS</h1></font>
<table bgcolor="Aqua" border="1" align="center" style="line-height:25px;">
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
	echo "<tr>";

	echo "<td>".$row['Player_Id']."</td>";
	
	echo "<td>".$row['Player_Name']."</td>";
	
	echo "<td>".$row['Date_Of_Birth']."</td>";

	echo "<td>".$row['Nationality']."</td>";

	echo "<td>".$row['Skill']."</td>";
	?>
	<td><a href="pdelete.php?delete_id=<?php echo $row['Player_Id']; ?>" onclick="return confirm('Are you sure?');"> Delete</a></td>
	</tr>
	<?php
}
?>
</table>
<?php
echo "<center>";
echo "<form action=\"http://localhost:8080/project/menu1.html\">";
echo "<input type=\"submit\"style=\"color:Aqua;background-color:black;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
echo "</center>";
?>
</body>
</html>


<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

if(isset($_GET['delete_id']))
{
	$did=$_GET['delete_id'];
	mysqli_query($con,"DELETE FROM player WHERE Player_Id='$did'");
	header("location:pdelete.php");
}
?>
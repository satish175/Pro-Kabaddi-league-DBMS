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
	<td><a href="t1edit.php?tedit_id=<?php echo $row['Team_Acronym'];?>"alt="edit">Edit</a></td>
	</tr>
	<?php
}
?>
</table>
</body>
</html>


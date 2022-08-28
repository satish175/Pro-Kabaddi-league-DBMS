<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/menu1.html\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

$query="Select * from pplay_details";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body>
<h1 align="center">PLAYER PLAY DETAILS</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Season_No</th>
<th>Player_Id</th>
<th>Team_Acronym</th>
<th>Bid_Amount</th>
<th>Jersey_No</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>";

	echo "<td>".$row['Season_No']."</td>";
	
	echo "<td>".$row['Player_Id']."</td>";
	
	echo "<td>".$row['Team_Acronym']."</td>";

	echo "<td>".$row['Bid_Amount']."</td>";

	echo "<td>".$row['Jersey_No']."</td>";

	?>
	<td><a href="ppedit1.php?ppedit_id=<?php echo $row['Season_No']; ?>&ppedit1_id=<?php echo $row['Player_Id']; ?>"alt="edit">Edit</a></td>
	</tr>
	<?php
}
?>
</table>
</body>
</html>

	

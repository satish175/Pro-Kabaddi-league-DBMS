<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/menu1.html\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

$query="Select * from pkl_match";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body>
<center>
<br><br><h1>MATCH DETAILS</h1>
<table width="600"  border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Match_Id</th>
<th>Season_No</th>
<th>Team1_Acronym</th>
<th>Team2_Acronym</th>
<th>Match_Date</th>
<th>Match_Time</th>
<th>Match_Venue</th>
<th>Match_Result</th>
<tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>";

	echo "<td>".$row['Match_Id']."</td>";

	echo "<td>".$row['Season_No']."</td>";
	
	echo "<td>".$row['Team1_Acronym']."</td>";

	echo "<td>".$row['Team2_Acronym']."</td>";

	echo "<td>".$row['Match_Date']."</td>";

	echo "<td>".$row['Match_Time']."</td>";

	echo "<td>".$row['Match_Venue']."</td>";

	echo "<td>".$row['Match_Result']."</td>";

	echo "</tr>";
}

?>
</table>
</center>
</body>
</html>
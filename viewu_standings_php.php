<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");


$query="Select * from team";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body style="background:url(trophy.gif);background-repeat:no-repeat ;background-size:100%,100%">
<center>
<br><br><h1>TEAM STANDINGS</h1>
<table width="600" bgcolor="MistyRose" border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Team_Acronym</th>
<th>Team_Name</th>
<th>Wins</th>
<tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>";

	echo "<td>".$row['Team_Acronym']."</td>";
	
	echo "<td>".$row['Team_Name']."</td>";
	
	echo "<td>".$row['Wins']."</td>";

	echo "</tr>";
}
?>
</table>
<?php
echo "<form action=\"http://localhost:8080/project/umore.html\">";
echo "<input type=\"submit\"style=\"color:MistyRose;background-color:black;height:25px;width:225px;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
?>


</center>
</body>

</html>


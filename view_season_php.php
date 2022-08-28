<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost8080/project/menu1.html\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

$query="Select * from season";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body>
<br><br><h1>SEASON DETAILS</h1>
<table width="600" border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Season_No</th>
<th>Year</th>
<th>Title_Sponsor</th>
<tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>";

	echo "<td>".$row['Season_No']."</td>";
	
	echo "<td>".$row['Year']."</td>";
	
	echo "<td>".$row['Title_Sponsor']."</td>";

	echo "</tr>";
}

?>
</table>
</body>
</html>
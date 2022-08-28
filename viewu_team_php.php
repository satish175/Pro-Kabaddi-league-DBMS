<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");



$query="Select * from team";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body style="background:url(ut1.jpg);background-repeat:no-repeat ;background-size:100%,100%">
<center>
<font color="lightgreen"><br><br><h1>TEAM DETAILS</h1></font>
<table width="600" border="1" bgcolor="lightgreen" cellpadding="1" cellspacing="1">
<tr>
<th>Team_Acronym</th>
<th>Team_Name</th>
<th>Located</th>
<th>Titles</th>
<tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>";

	echo "<td>".$row['Team_Acronym']."</td>";
	
	echo "<td>".$row['Team_Name']."</td>";
	
	echo "<td>".$row['Located']."</td>";

	echo "<td>".$row['Titles']."</td>";

	echo "</tr>";
}

?>

</table>
<?php
echo "<form action=\"http://localhost:8080/project/menu_user.html\">";
echo "<input type=\"submit\" style=\"color:chartreuse;background-color:black;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
?>
</center>
</body>
</html>
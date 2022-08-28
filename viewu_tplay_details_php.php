<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");



$query="Select * from tplay_details";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body style="background:url(utp.jpg);background-repeat:no-repeat ;background-size:100%,100%">
<center>
<font color="lightgreen"><br><br><h1>TEAM PLAY DETAILS</h1></font>
<table width="600" border="1" bgcolor="lightgreen"  cellpadding="1" cellspacing="1">
<tr>
<th>Season_No</th>
<th>Team_Acronym</th>
<th>Captain_Id</th>
<th>Coach</th>
<th>Owner</th>
<tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>";

	echo "<td>".$row['Season_No']."</td>";
	
	echo "<td>".$row['Team_Acronym']."</td>";

	echo "<td>".$row['Captain_Id']."</td>";

	echo "<td>".$row['Coach']."</td>";

	echo "<td>".$row['Owner']."</td>";

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
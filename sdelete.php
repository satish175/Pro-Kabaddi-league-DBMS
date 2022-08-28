<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/menu1.html\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

$query="Select * from season";
$result=mysqli_query($con,$query);
?>

<html>
<head>
</head>
<body>
<h1 align="center">SEASON DETAILS</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Season_No</th>
<th>Year</th>
<th>Title_Sponsor</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>";

	echo "<td>".$row['Season_No']."</td>";
	
	echo "<td>".$row['Year']."</td>";
	
	echo "<td>".$row['Title_Sponsor']."</td>";

	?>
	<td><a href="sdelete.php?delete_id=<?php echo $row['Season_No']; ?>" onclick="return confirm('Are you sure?');"> Delete</a></td>
	</tr>
	<?php
}
?>
</table>
</body>
</html>

<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

if(isset($_GET['delete_id']))
{
	$did=$_GET['delete_id'];
	mysqli_query($con,"DELETE FROM season WHERE Season_No='$did'");
	header("location:sdelete.php");
}
?>

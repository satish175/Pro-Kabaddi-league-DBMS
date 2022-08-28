<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/sedit.php\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

if(isset($_GET['sedit_id']))
{
	$sql="select * from season where Season_No=".$_GET['sedit_id'];
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
}
if(isset($_POST['btn_update']))
{
	$year=$_POST['year'];
	$t_sp=$_POST['title_sponsor'];
	$update="UPDATE season SET Year='$year',Title_Sponsor='$t_sp' WHERE Season_No=".$_GET['sedit_id'];
	$up=mysqli_query($con,$update);
	if(!isset($sql))
	{
		die ("Error $sql" .mysqli_connect_error());
	}
	else
	{
		header("location: sedit.php");
	}
	
}
?>
<!doctype html>
<html>
<body>
<form method="post">
<h1>EDIT SEASON INFORMATION</h1>
YEAR:<br><select name="year">
<option disabled selected value> - - select an option - - </option>
<option
value="2014"

<?php
if($row["Year"]=='2014')
{
	echo "selected";
}
?>

>2014</option>
<option
value="2015"

<?php
if($row["Year"]=='2015')
{
	echo "selected";
}
?>

>2015</option>
<option
value="2016"

<?php
if($row["Year"]=='2016')
{
	echo "selected";
}
?>

>2016</option>
<option
value="2017"

<?php
if($row["Year"]=='2017')
{
	echo "selected";
}
?>

>2017</option>
</select>
<br><br>
TITLE_SPONSOR:<br><input type="text"name="title_sponsor" value="<?php echo $row['Title_Sponsor']; ?>">
<br><br>
<button type="submit" name="btn_update" id="btn_update" onClick="update()"><strong>Update</strong></button>
<a href="sedit.php"><button type="button" value="button">Cancel</button></a>
</form>

<script>
function update()
{
	var x;
	if(confirm("Updated data Successfully")== true)
	{
		x="update";
	}
}
</script>
</body>
</html>
<br><br>

<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/tedit.php\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

if(isset($_GET['tedit_id']))
{
	$sql="select * from team where Team_Acronym='".$_GET['tedit_id']."'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
}
if(isset($_POST['btn_update']))
{
	$tname=$_POST["team_name"];
	$loc=$_POST["located"];
	$titles=$_POST["titles"];
	$update="UPDATE team SET Team_Name='$tname',Located='$loc',Titles='$titles' WHERE Team_Acronym='".$_GET['tedit_id']."'";
	$up=mysqli_query($con,$update);
	if(!isset($sql))
	{
		die ("Error $sql" .mysqli_connect_error());
	}
	else
	{
		header("location: tedit.php");
	}
	
}
?>
<!doctype html>
<html>
<body>
<form method="post">
<h1>EDIT TEAM INFORMATION</h1>
TEAM_NAME:<input type="text"name="team_name" value="<?php echo $row['Team_Name']; ?>"><br><br>
LOCATED:<input type="text"name="located" value="<?php echo $row['Located']; ?>"><br><br>
TITLES:<select name="titles">
<option disabled selected value> - - select an option - - </option>
<option
value="0"

<?php
if($row["Titles"]=='0')
{
	echo "selected";
}
?>

>0</option>
<option
value="1"

<?php
if($row["Titles"]=='1')
{
	echo "selected";
}
?>

>1</option>
<option
value="2"

<?php
if($row["Titles"]=='2')
{
	echo "selected";
}
?>

>2</option>
<option
value="3"

<?php
if($row["Titles"]=='3')
{
	echo "selected";
}
?>

>3</option>
<option
value="4"

<?php
if($row["Titles"]=='4')
{
	echo "selected";
}
?>

>4</option>
<option
value="5"

<?php
if($row["Titles"]=='5')
{
	echo "selected";
}
?>

>5</option>
</select>
<br><br>
<button type="submit" name="btn_update" id="btn_update" onClick="update()"><strong>Update</strong></button>
<a href="tedit.php"><button type="button" value="button">Cancel</button></a>
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


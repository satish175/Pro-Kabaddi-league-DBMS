<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");



if(isset($_GET['edit_id']))
{
	$sql="select * from player where Player_Id=".$_GET['edit_id'];
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
}
if(isset($_POST['btn_update']))
{
	
	$pname=$_POST['player_name'];
	$dob=$_POST['date_of_birth'];
	$nation=$_POST['nationality'];
	$skills=$_POST['skill'];
	$update="UPDATE player SET Player_Name='$pname',Date_Of_Birth='$dob',Nationality='$nation',Skill='$skills' WHERE Player_Id=".$_GET['edit_id'];
	$up=mysqli_query($con,$update);
	if(!isset($sql))
	{
		die ("Error $sql" .mysqli_connect_error());
	}
	else
	{
		header("location: pedit.php");
	}
	
}
?>
<!doctype html>
<html>
<body style="background:url(help2.jpg);background-repeat:no-repeat ;background-size:100%,100%">

<form method="post">
<font color="Aqua"> <h1>EDIT PLAYER INFORMATION</h1>
PLAYER_NAME:<input type="text"name="player_name" value="<?php echo $row['Player_Name']; ?>"><br><br>
Date_Of_Birth:<input type="date"name="date_of_birth"value="<?php echo $row['Date_Of_Birth']; ?>"><br><br>
Nationality:<input type="radio"name="nationality"value="India"

<?php
if($row["Nationality"]=='India')
{
	echo "checked";
}
?>

>INDIA
<input type="radio"name="nationality"value="Overseas"

<?php
if($row["Nationality"]=='Overseas')
{
	echo "checked";
}
?>


>OVERSEAS<br><br>

SKILLS:<select name="skill" >
<option disabled selected value> - - select an option - - </option>
<option
value="Raider"

<?php
if($row["Skill"]=='Raider')
{
	echo "selected";
}
?>


>RAIDER</option>
<option
value="Defender"

<?php
if($row["Skill"]=='Defender')
{
	echo "selected";
}
?>

>DEFENDER</option>
<option
value="Allrounder"

<?php
if($row["Skill"]=='Allrounder')
{
	echo "selected";
}
?>


>ALLROUNDER</option>
</select>
<br><br>
<button type="submit"style="color:Aqua;background-color:black;border-radius:10px;"  name="btn_update" id="btn_update" onClick="update()"><strong>Update</strong></button>
<a href="pedit.php"><button type="button"style="color:Aqua;background-color:black;border-radius:10px;" value="button">Cancel</button></a>
</form>
<br><br>

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
<?php
echo "<form action=\"http://localhost:8080/project/pedit.php\">";
echo "<input type=\"submit\"style=\"color:Aqua;background-color:black;border-radius:10px;\"  name=\"button\" value=\"back\">";
echo "</form>";
?>
</font>
</body>
</html>
<br><br>

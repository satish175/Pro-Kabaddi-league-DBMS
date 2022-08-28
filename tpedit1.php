<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/tpedit.php\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

if(isset($_GET['tpedit_id']))
{
	if(isset($_GET['tpedit1_id']))
	{
	$tp0=$_GET['tpedit_id'] ;
	$tp1=$_GET['tpedit1_id'] ;	
	$sql="select * from tplay_details where Season_No='$tp0' and Team_Acronym='$tp1'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	}
}
if(isset($_POST['btn_update']))
{
	$cid=$_POST["captain_id"];
	$coach=$_POST["coach"];
	$owner=$_POST["owner"];
	$val1=mysqli_query($con,"select * from player where Player_Id='$cid'");
	$vali=mysqli_query($con,"select * from pplay_details where season_no='$tp0' and player_id='$cid'");
	$valii=mysqli_query($con,"select * from tplay_details where season_no='$tp0' and captain_id='$cid'");
	if((mysqli_num_rows($val1)>0)and(mysqli_num_rows($vali)>0)and(mysqli_num_rows($valii)<0))
	{
		$update="UPDATE tplay_details SET Captain_Id='$cid',Coach='$coach',Owner='$owner' WHERE Season_No='$tp0' and  Team_Acronym='$tp1'";
		$up=mysqli_query($con,$update);
		if(!isset($sql))
		{
			die ("Error $sql" .mysqli_connect_error());
		}
		else
		{
			header("location: tpedit.php");
		}
	}
	else
	{
		echo "PLAYER_ID doesnot exist in the parent table(foreign key constraint violated)!!!!!";
	}
	
	
}
?>
<!doctype html>
<html>
<body>
<form method="post">
<h1>EDIT TEAM PLAY INFORMATION</h1>
CAPTAIN_ID:<input type="number"min="1"max="1000"name="captain_id" value="<?php echo $row['Captain_Id']; ?>"><br><br>
<br><br>
COACH:<input type="text"name="coach"value="<?php echo $row['Coach']; ?>"><br><br>
<br><br>
OWNER:<input type="text"name="owner"value="<?php echo $row['Owner']; ?>"><br><br>
<br><br>
<button type="submit" name="btn_update" id="btn_update" onClick="update()"><strong>Update</strong></button>
<a href="tpedit.php"><button type="button" value="button">Cancel</button></a>
</form>

<script>
function update()
{
	var x;
	if(confirm("Update data?")== true)
	{
		x="update";
	}
}
</script>
</body>
</html>
<br><br>


	

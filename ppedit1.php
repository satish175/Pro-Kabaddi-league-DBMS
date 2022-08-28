<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/ppedit.php\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

if(isset($_GET['ppedit_id']))
{
	if(isset($_GET['ppedit1_id']))
	{
	$pp0=$_GET['ppedit_id'] ;
	$pp1=$_GET['ppedit1_id'] ;	
	$sql="select * from pplay_details where Season_No='$pp0' and Player_Id='$pp1'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	}
}
if(isset($_POST['btn_update']))
{
	$tac=$_POST["team_acronym"];
	$bid=$_POST["bid_amount"];
	$jno=$_POST["jersey_no"];
	$val1=mysqli_query($con,"select * from team where team_acronym='$tac'");
	$vali=mysqli_query($con,"select * from tplay_details where season_no='$pp0' and team_acronym='$tac'");

	if((mysqli_num_rows($val1)>0)and(mysqli_num_rows($vali)>0))
	{
		$update="UPDATE pplay_details SET Team_Acronym='$tac',Bid_Amount='$bid',Jersey_No='$jno' WHERE Season_No='$pp0' and  Player_Id='$pp1'";
		$up=mysqli_query($con,$update);
		if(!isset($sql))
		{
			die ("Error $sql" .mysqli_connect_error());
		}
		else
		{
			header("location: ppedit.php");
		}
	}
	else
	{
		echo "TEAM_ACRONYM doesnot exist in the parent table(foreign key constraint violated)!!!!!";
	}
	
	
}
?>
<!doctype html>
<html>
<body>
<form method="post">
<h1>EDIT PLAYER PLAY INFORMATION</h1>
TEAM_ACRONYM:<input type="text"name="team_acronym" value="<?php echo $row['Team_Acronym']; ?>"><br><br>
<br><br>
BID_AMOUNT:<input type="number"min="10000"max="10000000"name="bid_amount"value="<?php echo $row['Bid_Amount']; ?>"><br><br>
<br><br>
JERSEY_NO:<input type="number"min="1"max="1000"name="jersey_no"value="<?php echo $row['Jersey_No']; ?>"><br><br>
<br><br>
<button type="submit" name="btn_update" id="btn_update" onClick="update()"><strong>Update</strong></button>
<a href="ppedit.php"><button type="button" value="button">Cancel</button></a>
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


	
	
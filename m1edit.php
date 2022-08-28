<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

echo "<form action=\"http://localhost:8080/project/medit.php\">";
echo "<input type=\"submit\" name=\"button\" value=\"back\">";
echo "</form>";

	

if(isset($_GET['medit_id']))
{	
	
	$sql="select * from pkl_match where Match_Id=".$_GET['medit_id'];
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$t1ac=$row['Team1_Acronym'];
	$t2ac=$row['Team2_Acronym']; 
	
}
if(isset($_POST['btn_update']))
{
	$sno=$_POST["season_no"];
	$team1_acronym=$_POST["team1_acronym"];
	$team2_acronym=$_POST["team2_acronym"];
	$mdate=$_POST["match_date"];
	$mtime=$_POST["match_time"];
	$mvenue=$_POST["match_venue"];
	$mresult=$_POST["match_result"];
$val1=mysqli_query($con,"select * from season where season_no='$sno'");
$val2=mysqli_query($con,"select * from team where team_acronym='$team1_acronym'");
$val3=mysqli_query($con,"select * from team where team_acronym='$team2_acronym'");
$vali=mysqli_query($con,"select * from tplay_details where season_no='$sno' and team_acronym='$team1_acronym'");
$valii=mysqli_query($con,"select * from tplay_details where season_no='$sno' and team_acronym='$team2_acronym'");

if((mysqli_num_rows($val1)>0)and(mysqli_num_rows($val2)>0)and(mysqli_num_rows($val3)>0)and(mysqli_num_rows($vali)>0)and(mysqli_num_rows($valii)>0))
{
	
	if($team1_acronym==$team2_acronym)
	{
		echo "THE TWO TEAMS MUST BE DIFFERENT!!!!!";
	}
	else
	{
		$update="UPDATE pkl_match SET Season_No='$sno',Team1_Acronym='$team1_acronym',Team2_Acronym='$team2_acronym',Match_Date='$mdate',Match_Time='$mtime',Match_Venue='$mvenue',Match_Result='${$mresult}' WHERE Match_Id=".$_GET['medit_id'];
	$up=mysqli_query($con,$update);
	if(!isset($sql))
	{
		die ("Error $sql" .mysqli_connect_error());
	}
	else
	{
		header("location: medit.php");
	}
	
		
	}
}
else
{
	echo "SEASON_NO (or/and)TEAM_ACRONYM doesnot exist in the parent table(foreign key constraint violated)!!!!!";

}
}
?>
<!doctype html>
<html>
<body>
<form method="post" >
<h1>EDIT MATCH INFORMATION</h1>

SEASON_NO:<select name="season_no">
<option disabled selected value> - - select an option - - </option>
<option
value="1"

<?php
if($row["Season_No"]=='1')
{
	echo "selected";
}
?>

>1</option>
<option
value="2"

<?php
if($row["Season_No"]=='2')
{
	echo "selected";
}
?>


>2</option>
<option
value="3"

<?php
if($row["Season_No"]=='3')
{
	echo "selected";
}
?>


>3</option>
<option
value="4"

<?php
if($row["Season_No"]=='4')
{
	echo "selected";
}
?>


>4</option>
<option
value="5"

<?php
if($row["Season_No"]=='5')
{
	echo "selected";
}
?>


>5</option>
</select>
<br><br>
TEAM1_ACRONYM:<input type="text"name="team1_acronym" value="<?php echo $row['Team1_Acronym']; ?>">
<br><br>
TEAM2_ACRONYM:<input type="text"name="team2_acronym" value="<?php echo $row['Team2_Acronym']; ?>">
<br><br>
MATCH_DATE:<input type="date"name="match_date"value="<?php echo $row['Match_Date']; ?>">
<br><br>
MATCH_TIME:<input type="time"name="match_time"value="<?php echo $row['Match_Time']; ?>">
<br><br>
MATCH_VENUE:<input type="text"name="match_venue"value="<?php echo $row['Match_Venue']; ?>">
<br><br>
MATCH_RESULT:<input type="radio"name="match_result"value="team1_acronym"

<?php
if($row["Match_Result"]==$t1ac)
{
	echo "checked";
}
?>

>TEAM1
<input type="radio"name="match_result"value="team2_acronym"

<?php
if($row["Match_Result"]==$t2ac)
{
	echo "checked";
}
?>

>TEAM2
<input type="radio"name="match_result"value="DRAW"

<?php
if($row["Match_Result"]=='NULL')
{
	echo "checked";
}
?>

>DRAW<br><br>
<button type="submit" name="btn_update" id="btn_update" onClick="update()"><strong>Update</strong></button>
<a href="medit.php"><button type="button" value="button">Cancel</button></a>
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

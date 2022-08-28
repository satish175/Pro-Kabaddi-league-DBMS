<html>
<?php

$sno=$_GET["season_no"];
$tac=$_GET["team_acronym"];
$cid=$_GET["captain_id"];
$coach=$_GET["coach"];
$owner=$_GET["owner"];

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");


$val1=mysqli_query($con,"select * from season where season_no='$sno'");
$val2=mysqli_query($con,"select * from player where player_id='$cid'");
$val3=mysqli_query($con,"select * from team where team_acronym='$tac'");
$vali=mysqli_query($con,"select * from pplay_details where season_no='$sno' and player_id='$cid'");
$valii=mysqli_query($con,"select * from tplay_details where season_no='$sno' and captain_id='$cid'");
if((mysqli_num_rows($val1)>0)and(mysqli_num_rows($val2)>0)and(mysqli_num_rows($val3)>0)and(mysqli_num_rows($vali)>0)and(mysqli_num_rows($valii)<0))
{
	$val4=mysqli_query($con,"select * from tplay_details where season_no='$sno' and team_acronym='$tac'");
	if(mysqli_num_rows($val4)>0)
	{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
		echo "THIS DETAIL EXISTS(tuple exists)!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/tplay_details.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
	}
	else
	{
		$val=mysqli_query($con,"insert into tplay_details values('$sno','$tac','$cid','$coach','$owner')");
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"lightGreen\">";
echo "<b>";
echo "<u>";
		echo "INSERTED";
echo "<br>";;
echo "<br>";
echo "<form action=\"http://localhost:8080/project/tplay_details.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:lightGreen;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
	}
}
else
{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
	echo "SEASON_NO (or/and)TEAM_ACRONYM (or/and) CAPTAIN_IDdoesnot exist in the parent table(foreign key constraint violated)!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/tplay_details.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";

}
?>
</html>


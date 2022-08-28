<html>
<?php

$mid=$_GET["match_id"];
$sno=$_GET["season_no"];
$team1_acronym=$_GET["team1_acronym"];
$team2_acronym=$_GET["team2_acronym"];
$mdate=$_GET["match_date"];
$mtime=$_GET["match_time"];
$mvenue=$_GET["match_venue"];
$mresult=$_GET["match_result"];
$DRAW='NULL';

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");



$val1=mysqli_query($con,"select * from season where season_no='$sno'");
$val2=mysqli_query($con,"select * from team where team_acronym='$team1_acronym'");
$val3=mysqli_query($con,"select * from team where team_acronym='$team2_acronym'");
$vali=mysqli_query($con,"select * from tplay_details where season_no='$sno' and team_acronym='$team1_acronym'");
$valii=mysqli_query($con,"select * from tplay_details where season_no='$sno' and team_acronym='$team2_acronym'");


if((mysqli_num_rows($val1)>0)and(mysqli_num_rows($val2)>0)and(mysqli_num_rows($val3)>0)and(mysqli_num_rows($vali)>0)and(mysqli_num_rows($valii)>0))
{
	$val4=mysqli_query($con,"select * from pkl_match where match_id='$mid'");
	if(mysqli_num_rows($val4)>0)
	{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
		echo "MATCH_ID EXISTS!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/pkl_match.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
	}
	else if($team1_acronym==$team2_acronym)
	{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
		echo "THE TWO TEAMS MUST BE DIFFERENT!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/pkl_match.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
	}
	else
	{
		$val=mysqli_query($con,"insert into pkl_match values('$mid','$sno','$team1_acronym','$team2_acronym','$mdate','$mtime','$mvenue','${$mresult}')");
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"lightGreen\">";
echo "<b>";
echo "<u>";
		echo "INSERTED!!!!!";
echo "<br>";;
echo "<br>";
echo "<form action=\"http://localhost:8080/project/pkl_match.html\">";
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
	echo "SEASON_NO (or/and)TEAM_ACRONYM doesnot exist in the parent table(foreign key constraint violated)!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/pkl_match.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
}
?>
</html>





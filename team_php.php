<html>
<?php

$tac=$_GET["team_acronym"];
$tname=$_GET["team_name"];
$loc=$_GET["located"];
$titles=$_GET["titles"];

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");



$val1=mysqli_query($con,"select * from team where team_acronym='$tac'");
if(mysqli_num_rows($val1)>0)
{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>"; 
echo "TEAM EXISTS!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/team.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>"
}
else
{
$val=mysqli_query($con,"insert into team values('$tac','$tname','$loc','$titles')");
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"lightGreen\">";
echo "<b>";
echo "<u>";
echo "INSERTED";
echo "<br>";;
echo "<br>";
echo "<form action=\"http://localhost:8080/project/team.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:lightGreen;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
}
?>
</html>

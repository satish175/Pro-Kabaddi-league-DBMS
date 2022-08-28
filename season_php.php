<html>
<?php

$sno=$_GET['season_no'];
$year=$_GET["year"];
$t_sp=$_GET["title_sponsor"];

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");
$val1=mysqli_query($con,"select * from season where season_no='$sno'");
if(mysqli_num_rows($val1)>0)
{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
echo "SEASON_NO EXISTS!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/season.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
}
else
{
$val=mysqli_query($con,"insert into season values('$sno','$year','$t_sp')");
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"lightGreen\">";
echo "<b>";
echo "<u>";
echo "INSERTED";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/season.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:lightGreen;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
}
?>
</html>

<html>
<?php

$pid=$_GET["player_id"];
$pname=$_GET["player_name"];
$dob=$_GET["date_of_birth"];
$nation=$_GET["nationality"];
$skills=$_GET["skill"];

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");




$val1=mysqli_query($con,"select * from player  where player_id='$pid'");
if(mysqli_num_rows($val1)>0)
{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
echo "PLAYER_ID EXISTS!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/player.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
}
else
{
$val=mysqli_query($con,"insert into player values('$pid','$pname','$dob','$nation','$skills')");
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"lightGreen\">";
echo "<b>";
echo "<u>";
echo "INSERTED";
echo "<br>";;
echo "<br>";
echo "<form action=\"http://localhost:8080/project/player.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:lightGreen;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
}


?>
</html>

<html>
<?php
echo "<body bgcolor =\"MistyRose\">";
$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

switch($_REQUEST['button'])
{
case 'TEAM STANDINGS':
include('viewu_standings_php.php');
break;
case 'VIEW THE MOST PAID PLAYER IN ANY SEASON':
include('Sseason_php.php');
break;
case 'VIEW PLAYERS LIST BY THEIR TEAMS IN DIFFERENT SEASONS':
include('stp_php.php');
break;
}
?>
</html>
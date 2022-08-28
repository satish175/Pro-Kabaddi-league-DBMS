<html>
<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

switch($_REQUEST['button'])
{
case 'VIEW SEASON DETAILS':
include('viewu_season_php.php');
break;
case 'VIEW PLAYER DETAILS':
include('viewu_player_php.php');
break;
case 'VIEW TEAM DETAILS':
include('viewu_team_php.php');
break;
case 'VIEW PLAYER PLAY DETAILS':
include('viewu_pplay_details_php.php');
break;
case 'VIEW TEAM PLAY DETAILS':
include('viewu_tplay_details_php.php');
break;
case 'VIEW MATCH DETAILS':
include('viewu_pkl_match_php.php');
break;
}
?>
</html>
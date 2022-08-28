<html>
<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

switch($_REQUEST['button'])
{
case 'ADD SEASON DETAILS':
include('season.html');
break;
case 'VIEW SEASON DETAILS':
include('view_season_php.php');
break;
case 'EDIT SEASON DETAILS':
include('sedit.php');
break;
case 'DELETE SEASON DETAILS':
include('sdelete.php');
break;
case 'ADD PLAYER DETAILS':
include('player.html');
break;
case 'VIEW PLAYER DETAILS':
include('view_player_php.php');
break;
case 'EDIT PLAYER DETAILS':
include('pedit.php');
break;
case 'DELETE PLAYER DETAILS':
include('pdelete.php');
break;
case 'ADD TEAM DETAILS':
include('team.html');
break;
case 'VIEW TEAM DETAILS':
include('view_team_php.php');
break;
case 'EDIT TEAM DETAILS':
include('tedit.php');
break;
case 'DELETE TEAM DETAILS':
include('tdelete.php');
break;
case 'ADD PLAYER PLAY DETAILS':
include('pplay_details.html');
break;
case 'VIEW PLAYER PLAY DETAILS':
include('view_pplay_details_php.php');
break;
case 'EDIT PLAYER PLAY DETAILS':
include('ppedit.php');
break;
case 'DELETE PLAYER PLAY DETAILS':
include('ppdelete.php');
break;
case 'ADD TEAM PLAY DETAILS':
include('tplay_details.html');
break;
case 'VIEW TEAM PLAY DETAILS':
include('view_tplay_details_php.php');
break;
case 'EDIT TEAM PLAY DETAILS':
include('tpedit.php');
break;
case 'DELETE TEAM PLAY DETAILS':
include('tpdelete.php');
break;
case 'ADD MATCH DETAILS':
include('pkl_match.html');
break;
case 'VIEW MATCH DETAILS':
include('view_pkl_match_php.php');
break;
case 'EDIT MATCH DETAILS':
include('medit.php');
break;
case 'DELETE MATCH DETAILS':
include('delete_pkl_match.php');
break;
}
?>
</html>

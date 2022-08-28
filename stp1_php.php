<?php
echo "<body style=\"background:url(stpimage.jpg);background-repeat:no-repeat ;background-size:100%,100%\">";
$sn=$_GET["sseason"];
$tn=$_GET["steam"];
$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

$qry=mysqli_query($con,"select p.Player_Name from player p,pplay_details p1 where p1.Season_No='$sn' and p1.Team_Acronym='$tn' and p1.Player_Id=p.Player_Id");
$qry1=mysqli_query($con,"select Team_Name from team where Team_Acronym='$tn'");
while($row1=mysqli_fetch_array($qry1))
{
echo "<center>";
echo "<font color=\"lime\" size=\"25\">";
$t1=$row1['Team_Name'];
echo "$t1";
echo "</font>";
echo "</center>";
}
echo "<br>";
echo "<br>";
$vali=mysqli_query($con,"select * from pplay_details where season_no='$sn' and team_acronym='$tn'");
if(mysqli_num_rows($vali)>0)
{
while($row=mysqli_fetch_array($qry))
{
echo "<center>";
echo "<font color=\"lime\" size=\"12\">";

echo "<br>";
$pn=$row['Player_Name'];

echo "$pn";
echo "</font>";
echo "</center>";

}
}
else
{
echo "<center>";
echo "<font color=\"lime\" size=\"25\">";
echo "NO PLAYERS!!!!!";
echo "</font>";
echo "</center>";
}
echo "<center>";
echo "<form action=\"http://localhost:8080/project/stp_php.php\">";
echo "<input type=\"submit\" style=\"color:lime;background-color:black;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
echo "</center>";
?>
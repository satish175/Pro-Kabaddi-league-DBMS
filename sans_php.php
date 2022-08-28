<?php
echo "<body style=\"background:url(cur1.gif);background-repeat:no-repeat ;background-size:100%,100%\">";
$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");

$sn=$_GET["sseason"];
$qry=mysqli_query($con,"select p.Player_Name,p1.Bid_Amount from player p,pplay_details p1 where p1.Season_No='$sn' and p1.Player_Id=p.Player_Id and p1.Bid_Amount in(select Max(Bid_Amount) from pplay_details where Season_No='$sn' group by(Season_No))");
$vali=mysqli_query($con,"select * from pplay_details where season_no='$sn'");
if(mysqli_num_rows($vali)>0)
{
while($row=mysqli_fetch_array($qry))
{

$pn=$row['Player_Name'];
echo "<br><br><br><br><br><br>";
echo "<center>";
echo "<font color=\"FireBrick\" size=\"70\">";
echo "<b>";

echo "$pn";
echo "<br>";

$ba=$row['Bid_Amount'];
echo "$ba";

echo "</b>";
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
echo "<form action=\"http://localhost:8080/project/Sseason_php.php\">";
echo "<input type=\"submit\" style=\"color:FireBrick;background-color:black;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
echo "</center>";
?>

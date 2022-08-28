
<?php
$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");
echo "<form action=\"http://localhost:8080/project/sans_php.php\">";
echo "<body style=\"background:url(ubid.gif);background-repeat:no-repeat ;background-size:100%,100%\">";

$qry=mysqli_query($con,"select Season_No from Season");
echo "<center>";
echo "</br></br><h1>SELECT SEASON</h1></br></br>";
echo "<select name=\"sseason\" required=\"true\">";
echo "<option disabled selected value> - - select an option - - </option>";
while($row=mysqli_fetch_array($qry))
{
$sno=$row['Season_No'];
echo "<option value=\"$sno\">$sno</option>";
}
echo "</select>";
echo "<br><br>";
echo "<input type=\"submit\"style=\"color:LightCoral;background-color:black;border-radius:10px;\" name=\"button\" value=\"submit\" >";
echo "</form>";
echo "<br><br>";

echo "<form action=\"http://localhost:8080/project/umore.html\">";
echo "<input type=\"submit\"style=\"color:LightCoral;background-color:black;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
?>


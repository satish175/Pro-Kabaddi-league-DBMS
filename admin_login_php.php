<html>

<?php
$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");
$aname=$_POST['admin_name'];
$apass=$_POST['apassword'];
$val=mysqli_query($con,"select * from adminlogin where admin_name='$aname'and apassword='$apass'");


if(mysqli_num_rows($val)==1)
{
include('menu1.html');
}
else
{

echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
echo "INVALID CREDENTIALS!!!!!";
echo "<br>";
echo "<br>";
echo "<form action=\"http://localhost:8080/project/admin_login.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
}


?>
</body>
</html>
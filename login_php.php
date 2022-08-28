<html>
<?php
$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");
$uname=$_POST['user_name'];
$pass=$_POST['password'];
$val=mysqli_query($con,"select * from login where user_name='$uname' and password='$pass'");




if(mysqli_num_rows($val)==1)
{
include('menu_user.html');
}
else
{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
echo "INVALID CREDENTIALS";
echo "<form action=\"http://localhost:8080/project/login.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</form>";
}
?>
</html>
<html>
<?php
$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"project");
$uname=$_POST['user_name'];
$pass=$_POST['password'];
$val=mysqli_query($con,"select * from login where user_name='$uname'and password='$pass'");



if(mysqli_num_rows($val)>=1)
{
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"Red\">";
echo "<b>";
echo "<u>";
echo "USER ALREADY EXISTS!!!!!";
echo "</br>";
echo "</br>";
echo "<form action=\"http://localhost:8080/project/sign_up.html\">";
echo "<input type=\"submit\"style=\"color:black;background-color:red;border-radius:10px;\" name=\"button\" value=\"back\">";
echo "</center>";
echo "</form>";
}
else
{
echo "<center>";
$signup=mysqli_query($con,"insert into login (user_name,password) values('$uname','$pass')");
echo "<body bgcolor=\"black\">";
echo "<center>";
echo "<font size=\"8\" color=\"lightGreen\">";
echo "<b>";
echo "<u>";
echo "SUCCESSFUL REGISTRATION!!!!!";
echo "<br>";
echo "<br>";
echo "<br>";

echo "<form action=\"http://localhost:8080/project/menu_user.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:lightgreen;border-radius:10px;\"name=\"button\" value=\"login\">";
echo "</form>";
echo "<form action=\"http://localhost:8080/project/sign_up.html\">";
echo "<input type=\"submit\" style=\"color:black;background-color:lightgreen;border-radius:10px;\"name=\"button\" value=\"back\">";
echo "</center>";
echo "</form>";
}


?>
</html>

	

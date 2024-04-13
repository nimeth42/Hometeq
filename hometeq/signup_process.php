<?php 
session_start();
include("db.php");
$pagename="sign Up Results";
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

echo "<title>".$pagename."</title>"; 

echo "<body>";

include ("headfile.html"); 

echo "<h4>".$pagename."</h4>"; 
$fname=trim($_POST['r_firstname']);
$lname=trim($_POST['r_lastname']);
$address=trim($_POST['r_address']);
$postcode=trim($_POST['r_postcode']);
$telno=trim($_POST['r_telno']);
$email=trim($_POST['r_email']);
$password1=trim($_POST['r_password1']);
$password2=trim($_POST['r_password2']);

$SQL="insert into Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
values ('C','".$fname."','".$lname."','".$address."','".$postcode."', '".$telno."', '".$email."', '".$password1."')";

mysqli_query($conn, $SQL);

include("footfile.html"); 

echo "</body>";
?>
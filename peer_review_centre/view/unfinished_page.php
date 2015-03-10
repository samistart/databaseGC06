<!DOCTYPE html>
<HTML>

<?php 
require_once("../includes/initialise_student.php");
$password = 'password';
echo $password . "<br>";
$hashAndSalt = password_hash('password', PASSWORD_DEFAULT);
echo $hashAndSalt . "<br>";
$hashAndSalt = substr( $hashAndSalt, 0, 60 );
var_dump(password_verify($password, $hashAndSalt));
?>
page still under constuction or link not filled out yet
</HTML>
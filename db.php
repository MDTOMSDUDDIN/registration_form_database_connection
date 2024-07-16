<?php 

$hostname="localhost";
$hostusername="root";
$hostpass="";
$db_name="registration_information";

$db_connection= mysqli_connect($hostname,$hostusername,$hostpass,$db_name);

$_SESSION['success']='upload your registration information seccess !!!';

header('location:form.php');
?>
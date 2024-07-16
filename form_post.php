
<?php
session_start();
require'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$conform_password = $_POST['conform_password'];
$country = $_POST['country'];
$gender = $_POST['gender'];
$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[#,$,%,^,&,*]@', $password);

$flag=false;
if(empty($name)){
    $flag=true;
    $_SESSION['nam_err']="please enter your name ???";
}
else{
    $_SESSION['name']=$name ;
}

if(empty($email)){
    $flag=true;
    $_SESSION['email_err']="please enter your email ???";
}
else{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $flag=true;
        $_SESSION['email_err']="please send vaild email address ???";
    }
    else{
        $_SESSION['email']=$email ;
    }
}
if(empty($password)){
    $flag=true;
    $_SESSION['pass_err']="please enter your password ??";
}
else{
    if(!$upper || !$lower ||!$number || strlen($password) < 8){
        $flag=true;
        $_SESSION['pass_err']="1 letter uppercase, 1 digit lowercase,1 digit number ??";
    }
    else{
        $_SESSION['password']=$password ;
    }
}

if(empty($conform_password)){
    $flag=true;
    $_SESSION['conpass_err']="please conform password ??";
}
else{
    if($password!=$conform_password){
        $flag=true;
        $_SESSION['conform_password']="does not mass your password ??";
    }
    else{
        $_SESSION['conform_password']=$conform_password ;
    }
}
if(empty($country)){
    $flag=true;
    $_SESSION['country_err']="select your country ??";
}
else{
    $_SESSION['country']=$country;
}

if(empty($gender)){
    $flag=true;
    $_SESSION['gender_err']="Select your gender ??";
}
else{
    $_SESSION['gender']=$gender ;
}

if($flag){
    header('location:form.php');
}



else{
    //insert data database
     $insert="INSERT INTO users(name , email, password,country,gender) VALUE('$name','$email','$password','$country','$gender')";

 unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['conform_password']);
unset($_SESSION['country']);
unset($_SESSION['gender']);

mysqli_query($db_connection,$insert);
}
?>
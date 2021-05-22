<?php

session_start();

//User sign in

require_once "connection.php";

$logInEmail = $_POST['logInEmail'];
$logInPassword = $_POST['logInPassword'];

if (empty($logInEmail) || empty($logInPassword))
{
    echo 'please fill all fields';
    die();
}
if (!filter_var($logInEmail, FILTER_VALIDATE_EMAIL))
{
    echo "Invalid email format";
    die();
}

$run = mysqli_query($conn,"SELECT * FROM `persons` WHERE `email`='$logInEmail' && `password`='$logInPassword'");

if($run) {}else{echo mysqli_error($run);}

if (mysqli_num_rows($run) > 0) 
{ 
    $_SESSION['rando'] = $logInEmail;

    header("Location:welcome.php");
}
else
{
    die ("User not found or invalid credentials");
}
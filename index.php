<?php
session_start();

if(isset($_SESSION['rando'])){
    header('Location:welcome.php');
}

?>


Connect with the world.<br><br>
Please Log in <br>
<form action="logInUser.php" method="post">
    <input type="text" name ="logInEmail" placeholder="Email"><br>
    <input type="text" name ="logInPassword" placeholder="Password"><br>
    <input type="submit" value="logIn" placeholder="Sign In"><br>
</form><br>
Don't have an acount <a href="signUp.php">Sign Up</a>
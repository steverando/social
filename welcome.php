<?php

session_start();

if(!isset($_SESSION['rando'])){
    header('Location:index.php');
}

require_once('connection.php');

$query = mysqli_query($conn, "SELECT * FROM `persons` WHERE `email`='{$_SESSION['rando']}'");

$data = mysqli_fetch_array($query);

echo $data['name'];
echo "<br>";
echo $_SESSION['rando'];

?>
<br>
<a href="logout.php">Logout <?php echo $data['name']; ?></a>
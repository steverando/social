<?php
$conn = @mysqli_connect("localhost","root","","social");

if (!$conn){
    echo 'not connected'.mysqli_error($conn);
}else{
    //echo 'connected';
}
?>
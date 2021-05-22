<?php
require_once "connection.php";

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if (empty($name) || empty($email) || empty($password) ||
    empty($password2))
    {
        echo 'please fill all fields';
        die();
    }
    if(!preg_match("/^[a-zA-Z]*$/",$name))
    {
        echo 'use letters for name';
        die();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Invalid email format";
        die();
    }
    if(strlen($password) < 6)
    {
        echo 'password must have more than 6 characters';
        die();
    }
    if($password !== $password2)
    {
        echo 'passwords does not much';
        die();
    }
    
    // email confirmation
    $emailConfirmation = "SELECT * FROM `persons` WHERE `email`='$email'";

    if (mysqli_num_rows(mysqli_query($conn, $emailConfirmation)) > 0) 
    {
        echo "email has been taken.";
        die();
    }
    

    $sql    =   "INSERT INTO persons(`name`, `email`, `password`)
                VALUE('$name', '$email', '$password')";

    if (mysqli_query($conn,$sql))
    {
        echo "added successfully";
        die();
    }
    else
    {
        echo "ERROR: not able to execute $sql. " . mysqli_error ($conn);
    };

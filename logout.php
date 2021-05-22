<?php

session_start();
unset($_SESSION['rando']);

header('Location:index.php');
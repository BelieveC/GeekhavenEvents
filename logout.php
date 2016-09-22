<?php

//Start session

session_start();

unset($_SESSION[name]); // DELETES THE USERNAME KEY

//session_destroy(); Deletes all the keys

header('Location:login.php');

?>
<?php 

session_start();

session_destroy();

echo "<script>window.open('index.php', '_self')</script>";

// ../ means that it is out of directory

//when a person is registering a session is started 
//destroy session is to end it where the person needs to log in again

 ?>


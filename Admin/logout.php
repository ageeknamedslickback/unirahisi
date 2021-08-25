<?php 

	session_start();

	session_destroy();

	echo "<script>window.open('login.php?logged_out=Successfully logged out','_self')</script>";
 ?>
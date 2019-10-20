<?php

session_start();

if(isset($_SESSION['nim'])){
	$_SESSION['nim']='';
  	unset($_SESSION['nim']);
  	session_unset();
  	session_destroy();
  	header("location: loginUser.php");
 }
 elseif (isset($_SESSION['username'])) {
 	$_SESSION['username']='';
  	unset($_SESSION['username']);
  	session_unset();
  	session_destroy();
  	header("location: loginAdmin.php");
 }
  	
?>
<?php 
   include('inc/init.php'); 

   // Destroy Session
	$session->turnoff_session($_GET['user']);
	header('Location: index.php');
?>
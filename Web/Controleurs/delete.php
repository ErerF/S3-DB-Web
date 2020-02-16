<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');	
	//session_start();
	$num = $_GET["num"];
	//echo $num;
	//echo 'DELETE FROM enfant WHERE numEnfant = '.$num;
	$result = mysqli_query($co, "DELETE FROM enfant WHERE numEnfant = '$num'");
	
	header("location:../Vues/espace_utilisateur.php");
?>
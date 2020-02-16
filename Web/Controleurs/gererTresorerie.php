<?php 
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');	
	$dateAjrd= date("Y-m-d");
	$var=$_POST['varMontantT'];
	
	mysqli_query($co, "INSERT INTO tresorerie VALUES(null,'$dateAjrd',$var)");
	header('Location: ../Vues/espace_utilisateur_tresorerie.php');
?>
<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');
	$tel=$_POST['tel'];
	$adresse=$_POST['adresse'];
	$email=$_SESSION['email'];
	
	if($tel!=null)
		$result = mysqli_query($co, "UPDATE utilisateur SET tel='$tel' WHERE email='$email'");
	if($adresse!=null)
		$result = mysqli_query($co, "UPDATE utilisateur SET adresse='$adresse' WHERE email='$email'");
	
	header('Location: ../Vues/espace_utilisateur.php');
?>
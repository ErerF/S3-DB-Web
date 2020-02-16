<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');
	$utilisateur = new utilisateur($co,$email,$password);
	$utilisateur->deconnexion();
	//mysqli_close();
	header('Location: ../Vues/accueil.html');

?>
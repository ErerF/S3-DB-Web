<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');
	$nomE=$_POST['nomE'];
	$prenomE=$_POST['prenomE'];
	$dateN=$_POST['dateN'];
	$emailP=$_SESSION['email'];

	$result = mysqli_query($co, "INSERT INTO enfant VALUES (null,'$prenomE','$nomE','$dateN',0,'$emailP')");
	
	header('Location: ../Vues/espace_utilisateur.php');
?>
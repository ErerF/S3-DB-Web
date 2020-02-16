<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');
	
	/********************Snacks********************/
	$nbPaC=$_POST['nbPaC'];	
	if($nbPaC!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbPaC' WHERE nomCourse='Pain au Chocolat'");
	
	$nbSaC=$_POST['nbSaC'];	
	if($nbSaC!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbSaC' WHERE nomCourse='Sandwich au chocolat'");
	
	$nbBC=$_POST['nbBC'];	
	if($nbBC!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbBC' WHERE nomCourse='Barres chocolatee'");
	
	$nbBagu=$_POST['nbBagu'];	
	if($nbBagu!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbBagu' WHERE nomCourse='Baguette'");
	
	$nbBon=$_POST['nbBon'];	
	if($nbBon!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbBon' WHERE nomCourse='Bonbons'");
	
	$nbCookie=$_POST['nbCookie'];	
	if($nbCookie!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbCookie' WHERE nomCourse='Cookie'");
	
	/********************Boisson********************/
	$nbCafe=$_POST['nbCafe'];	
	if($nbCafe!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbCafe' WHERE nomCourse='Cafe'");
	
	$nbCC=$_POST['nbCC'];	
	if($nbCC!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbCC' WHERE nomCourse='Chocolat chaud'");
	
	$nbJdO=$_POST['nbJdO'];	
	if($nbJdO!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbJdO' WHERE nomCourse='Jus d'orange'");
	
	$nbCola=$_POST['nbCola'];	
	if($nbCola!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbCola' WHERE nomCourse='Cola'");
	
	/********************Menu********************/
	$nbMenu1=$_POST['nbMenu1'];	
	if($nbMenu1!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbMenu1' WHERE nomCourse='Menu1'");
	
	$nbMenu2=$_POST['nbMenu2'];	
	if($nbMenu2!=null)
		mysqli_query($co, "UPDATE stock SET prix='$nbMenu2' WHERE nomCourse='Menu2'");
	
	header('Location: ../Vues/espace_utilisateur_commander.php');
?>

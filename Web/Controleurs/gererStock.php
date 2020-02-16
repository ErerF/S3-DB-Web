<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');
	
	/********************Snacks********************/
	$nbPaC=$_POST['nbPaC'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Pain au chocolat'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];	
	if($nbPaC!=null && $nbPaC>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbPaC' WHERE nomCourse='Pain au Chocolat'");
	if($nbPaC!=null && $nbPaC<0)
	{
		if($nbCourse>=(-$nbPaC))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbPaC' WHERE nomCourse='Pain au Chocolat'");
		else
		{
			echo '<p>Erreur:Pas assez de pain au chocolat!</p>';
			exit;
		}			
	}	
	
	$nbSaC=$_POST['nbSaC'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Sandwich au chocolat'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbSaC!=null && $nbSaC>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbSaC' WHERE nomCourse='Sandwich au chocolat'");
	if($nbSaC!=null && $nbSaC<0)
	{
		if($nbCourse>=(-$nbSaC))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbSaC' WHERE nomCourse='Sandwich au chocolat'");
		else
		{
			echo '<p>Erreur:Pas assez de sandwich au chocolat!</p>';
			exit;
		}			
	}
	
	$nbBC=$_POST['nbBC'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Barres chocolatee'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbBC!=null && $nbBC>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbBC' WHERE nomCourse='Barres chocolatee'");
	if($nbBC!=null && $nbBC<0)
	{
		if($nbCourse>=(-$nbBC))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbBC' WHERE nomCourse='Barres chocolatee'");
		else
		{
			echo '<p>Erreur:Pas assez de barres chocolatee!</p>';
			exit;
		}			
	}
	
	
	$nbBagu=$_POST['nbBagu'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Baguette'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbBagu!=null && $nbBagu>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbBagu' WHERE nomCourse='Baguette'");
	if($nbBagu!=null && $nbBagu<0)
	{
		if($nbCourse>=(-$nbBagu))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbBagu' WHERE nomCourse='Baguette'");
		else
		{
			echo '<p>Erreur:Pas assez de baguette!</p>';
			exit;
		}			
	}
	
	
	$nbBon=$_POST['nbBon'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Bonbons'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbBon!=null && $nbBon>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbBon' WHERE nomCourse='Bonbons'");
	if($nbBon!=null && $nbBon<0)
	{
		if($nbCourse>=(-$nbBon))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbBon' WHERE nomCourse='Bonbons'");
		else
		{
			echo '<p>Erreur:Pas assez de bonbons!</p>';
			exit;
		}			
	}
	
	
	$nbCookie=$_POST['nbCookie'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cookie'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbCookie!=null && $nbCookie>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbCookie' WHERE nomCourse='Cookie'");
	if($nbCookie!=null && $nbCookie<0)
	{
		if($nbCourse>=(-$nbCookie))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbCookie' WHERE nomCourse='Cookie'");
		else
		{
			echo '<p>Erreur:Pas assez de cookie!</p>';
			exit;
		}			
	}
	
	
	/********************Boisson********************/
	$nbCafe=$_POST['nbCafe'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cafe'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbCafe!=null && $nbCafe>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbCafe' WHERE nomCourse='Cafe'");
	if($nbCafe!=null && $nbCafeC<0)
	{
		if($nbCourse>=(-$nbCafe))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbCafe' WHERE nomCourse='Cafe'");
		else
		{
			echo '<p>Erreur:Pas assez de cafe!</p>';
			exit;
		}			
	}
	
	
	$nbCC=$_POST['nbCC'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Chocolat chaud'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbCC!=null && $nbCC>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbCC' WHERE nomCourse='Chocolat chaud'");
	if($nbCC!=null && $nbCC<0)
	{
		if($nbCourse>=(-$nbCC))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbCC' WHERE nomCourse='Chocolat chaud'");
		else
		{
			echo '<p>Erreur:Pas assez de chocolat chaud!</p>';
			exit;
		}			
	}
	
	
	$nbJdO=$_POST['nbJdO'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Jus d\'orange'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbJdO!=null && $nbJdO>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbJdO' WHERE nomCourse='Jus d\'orange'");
	if($nbJdO!=null && $nbJdO<0)
	{
		if($nbCourse>=(-$nbJdO))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbJdO' WHERE nomCourse='Jus d\'orange'");
		else
		{
			echo '<p>Erreur:Pas assez de jus d\'orange</p>';
			exit;
		}			
	}
	
	
	$nbCola=$_POST['nbCola'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cola'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbCola!=null && $nbCola>0)
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbCola' WHERE nomCourse='Cola'");
	if($nbCola!=null && $nbCola<0)
	{
		if($nbCourse>=(-$nbCola))
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse+'$nbCola' WHERE nomCourse='Cola'");
		else
		{
			echo '<p>Erreur:Pas assez de Cola!</p>';
			exit;
		}			
	}
	
	header('Location: ../Vues/espace_utilisateur_stock.php');
?>

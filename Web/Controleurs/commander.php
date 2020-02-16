<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');
	
	/********************Snacks********************/
	$nbPaC=$_POST['nbPaC'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Pain au chocolat'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbPaC!=null && $nbCourse>=$nbPaC)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbPaC' WHERE nomCourse='Pain au Chocolat'");
	}
	else if($nbCourse<$nbPaC)
	{
		echo '<p>Erreur:Pas assez de pain au chocolat!</p>';
		exit;
	}
	
	$nbSaC=$_POST['nbSaC'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Sandwich au chocolat'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbSaC!=null && $nbCourse>=$nbSaC)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbSaC' WHERE nomCourse='Sandwich au chocolat'");
	}
	else if($nbCourse<$nbSaC)
	{
		echo '<p>Erreur:Pas assez de sandwich au chocolat!</p>';
		exit;
	}
	
	$nbBC=$_POST['nbBC'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Barres chocolatee'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbBC!=null && $nbCourse>=$nbBC)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbBC' WHERE nomCourse='Barres chocolatee'");
	}
	else if($nbCourse<$nbBC)
	{
		echo '<p>Erreur:Pas assez de barres chocolatee!</p>';
		exit;
	}
	
	$nbBagu=$_POST['nbBagu'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Baguette'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbBagu!=null && $nbCourse>=$nbBagu)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbBagu' WHERE nomCourse='Baguette'");
	}
	else if($nbCourse<$nbBagu)
	{
		echo '<p>Erreur:Pas assez de baguette!</p>';
		exit;
	}
	
	$nbBon=$_POST['nbBon'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Bonbons'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbBon!=null && $nbCourse>=$nbBon)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbBon' WHERE nomCourse='Bonbons'");
	}
	else if($nbCourse<$nbBon)
	{
		echo '<p>Erreur:Pas assez de bonbons!</p>';
		exit;
	}
	
	$nbCookie=$_POST['nbCookie'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cookie'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbCookie!=null && $nbCourse>=$nbCookie)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbCookie' WHERE nomCourse='Cookie'");
	}
	else if($nbCourse<$nbCookie)
	{
		echo '<p>Erreur:Pas assez de cookie!</p>';
		exit;
	}
	
	/********************Boisson********************/
	$nbCafe=$_POST['nbCafe'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cafe'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbCafe!=null && $nbCourse>=$nbCafe)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbCafe' WHERE nomCourse='Cafe'");
	}
	else if($nbCourse<$nbCafe)
	{
		echo '<p>Erreur:Pas assez de cafe!</p>';
		exit;
	}
	
	$nbCC=$_POST['nbCC'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Chocolat chaud'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbCC!=null && $nbCourse>=$nbCC)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbCC' WHERE nomCourse='Chocolat chaud'");
	}
	else if($nbCourse<$nbCC)
	{
		echo '<p>Erreur:Pas assez de chocolat chaud!</p>';
		exit;
	}
	
	$nbJdO=$_POST['nbJdO'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Jus d\'orange'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbJdO!=null && $nbCourse>=$nbJdO)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbJdO' WHERE nomCourse='Jus d\'orange'");
	}
	else if($nbCourse<$nbJdO)
	{
		echo '<p>Erreur:Pas assez de jus d\'orange!</p>';
		exit;
	}
	
	$nbCola=$_POST['nbCola'];	
	$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cola'");
	$row = mysqli_fetch_assoc($result);
	$nbCourse=$row['nbCourse'];
	if($nbCola!=null && $nbCourse>=$nbCola)
	{
		mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbCola' WHERE nomCourse='Cola'");
	}
	else if($nbCourse<$nbCola)
	{
		echo '<p>Erreur:Pas assez de cola!</p>';
		exit;
	}
	
	/********************Menu********************/
	
	$nbM=$_POST['nbMenu1'];
	if($nbM!=null)
	{
		/*================Gouter================*/
		$choixG=$_POST['gouterM'];
		if($choixG=='PaC')
		{
			$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Pain au chocolat'");
			$row = mysqli_fetch_assoc($result);
			$nbCourse=$row['nbCourse'];
			if($nbCourse>=$nbM)
			{
				mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbM' WHERE nomCourse='Pain au Chocolat'");
			}
			else if($nbCourse<$nbM)
			{
				echo '<p>Erreur:Pas assez de pain au chocolat!</p>';
				exit;
			}
		}
		
		if($choixG=='SaC')
		{
			$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Sandwich au chocolat'");
			$row = mysqli_fetch_assoc($result);
			$nbCourse=$row['nbCourse'];
			if($nbCourse>=$nbM)
			{
				mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbM' WHERE nomCourse='Sandwich au chocolat'");
			}
			else if($nbCourse<$nbM)
			{
				echo '<p>Erreur:Pas assez de sandwich au chocolat!</p>';
				exit;
			}
		}
		
		/*================Menu================*/
		$choixB=$_POST['boissonM'];
		if($choixB=='cafe')
		{
			$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cafe'");
			$row = mysqli_fetch_assoc($result);
			$nbCourse=$row['nbCourse'];
			if($nbCourse>=$nbM)
			{
				mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbM' WHERE nomCourse='Cafe'");
			}
			else if($nbCourse<$nbM)
			{
				echo '<p>Erreur:Pas assez de cafe!</p>';
				exit;
			}
		}
		
		if($choixB=='CC')
		{
			$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Chocolat chaud'");
			$row = mysqli_fetch_assoc($result);
			$nbCourse=$row['nbCourse'];
			if($nbCourse>=$nbM)
			{
				mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbM' WHERE nomCourse='Chocolat chaud'");
			}
			else if($nbCourse<$nbM)
			{
				echo '<p>Erreur:Pas assez de chocolat chaud!</p>';
				exit;
			}
		}	
		
		if($choixB=='JdO')
		{
			$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Jus d\'orange'");
			$row = mysqli_fetch_assoc($result);
			$nbCourse=$row['nbCourse'];
			if($nbCourse>=$nbM)
			{
				mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbM' WHERE nomCourse='Jus d\'orange'");
			}
			else if($nbCourse<$nbM)
			{
				echo '<p>Erreur:Pas assez de jus d\'orange!</p>';
				exit;
			}
		}
		
		if($choixB=='Cola')
		{
			$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cola'");
			$row = mysqli_fetch_assoc($result);
			$nbCourse=$row['nbCourse'];
			if($nbCourse>=$nbM)
			{
				mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbM' WHERE nomCourse='Cola'");
			}
			else
			{
				echo '<p>Erreur:Pas assez de cola!</p>';
				exit;
			}
		}
		
	}
	
	$nbM2=$_POST['nbMenu2'];
	if($nbM2!=null)
	{
		$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Sandwich au chocolat'");
		$row = mysqli_fetch_assoc($result);
		$nbCourse=$row['nbCourse'];
		if($nbCourse>=$nbM2*0.5)
		{
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbM2' WHERE nomCourse='Sandwich au chocolat'");
		}
		else
		{
			echo '<p>Erreur:Pas assez de sandwich au chocolat!</p>';
			exit;
		}
		
		$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Baguette'");
		$row = mysqli_fetch_assoc($result);
		$nbCourse=$row['nbCourse'];
		if($nbCourse>=$nbM2*0.5)
		{
			mysqli_query($co, "UPDATE stock SET nbCourse=nbCourse-'$nbM2' WHERE nomCourse='Baguette'");
		}
		else
		{
			echo '<p>Erreur:Pas assez de baguette!</p>';
			exit;
		}
	}
	
	$numE=$_POST['numE'];
	$prixT=$_POST['product-subtotal'];
	$result = mysqli_query($co, "SELECT solde FROM enfant WHERE numEnfant='$numE'");
	$row = mysqli_fetch_assoc($result);
	$solde=$row['solde'];
	if($prixT!=null && $prixT<=$solde)
	{
		$dateAjrd= date("Y-m-d");
		$var=$_POST['varMontantT'];
		mysqli_query($co, "UPDATE enfant SET solde=solde-'$prixT' WHERE numEnfant='$numE'");
		mysqli_query($co, "INSERT INTO commande  VALUES(null,'$dateAjrd',$numE,$prixT)");
	}
	
	header('Location: ../Vues/espace_utilisateur_commander.php');
?>

<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');
	$email = $_POST['email'];
	$password = $_POST['password'];

	$result = mysqli_query($co, "SELECT * FROM utilisateur WHERE email = '$email'");
	$nombre_user = mysqli_num_rows($result);
	if ($nombre_user == 1)
	{
		$row = mysqli_fetch_assoc($result);
		$resP=$row['password'];
		/*global $resN=$row['nom'];
		$resB=$row['benevole'];
		$resPre=$row['presdent'];
		$resT=$row['tel'];
		$resA=$row['adresse'];*/
		
		if($password==$resP)
		{
			
			if($_POST['remember']==true)
			{
				setcookie('email',$_POST['email'],time()+60);
				setcookie('password',$_POST['password'],time()+60);
			}
			$utilisateur = new utilisateur($co,$email,$password);
			$utilisateur->connexion();
			header('Location: ../Vues/espace_utilisateur.php');
		}
		else
		{
			/*echo "< script language=\"JavaScript\">\r\n"; */
			echo "<script> alert(\"Mot de passe incorrect.\nReessayez une fois svp.\");\r\n"; 
			echo " history.back();\r\n"; 
			echo "< /script>"; 
			exit; 
		}
		
	}
	else
	{
		echo "< script language=\"JavaScript\">\r\n"; 
		echo " alert(\"Utilisateur n'existe pas.\nVous vous inscrivez svp.\");\r\n"; 
		echo " history.back();\r\n"; 
		echo "< /script>"; 
		exit; 
	}


?>
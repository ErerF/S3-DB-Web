<?php
	require_once('../Modeles/utilisateur.php');
	require_once('../Controleurs/connect.php');
	$email = $_POST['email'];
	
	$result = mysqli_query($co, "SELECT * FROM utilisateur WHERE email = '$email'");
	if (mysqli_num_rows($result) >0)//si l'utilisateur est deja inscrit
	{
		echo "< script language=\"JavaScript\">\r\n"; 
		echo " alert(\"Cet adresse est deja inscrit!\nChangez un autre adresse email svp.\");\r\n"; 
		echo " history.back();\r\n"; 
		echo "< /script>"; 
		exit; 
	}
	else//si l'utilisateur n'est pas encore inscrit
	{
		if(!preg_match("#^.+@.+\.[a-zA-Z]{2,3}$#",$email))
			{
				echo "Error:l'email n'est pas dans le bon formule!<br>";
				exit;
			}
			
		else
		{
			$password = $_POST['password'];
			$nom = $_POST['nom'];
			$utilisateur = new utilisateur($co,$email,$password,$nom);
			$utilisateur->connexion();
			header('Location: ../Vues/login.php');
		}
		
	}
?>
<!doctype HTML>
<html>
	<head>
		<title>Bienvenue à APERO</title>
		<link rel="stylesheet" href="style/style_accueil.css" type="text/css"/>
		<link rel="stylesheet" href="style/style_espace.css" type="text/css"/>
	</head>
	
	<body>		
		<div class="contenu">
			<div class="header" >
				<div class="logo"><img src="../img/logo.png" alt="Logo" width="100" /></div>
				<div class="title"><h2>APERO</h2></div>
				
				<div class="menu">
					<a href="accueil.html">Accueil</a>
					<a href="produits.php">Produits</a>
					<a class="menuActive" href="login.php">Mon Compte</a>
					<a href="contactezNous.html">Contactez-nous</a>
				</div>
			</div>			
			
			<div class="bonjour">
				<h3>Bonjour, Mme./M. 
					<?php 
						require_once('../Modeles/utilisateur.php');
						require_once('../Controleurs/connect.php');	
						$email=$_SESSION['email'];
						$result = mysqli_query($co, "SELECT nom,benevole,president FROM utilisateur WHERE email = '$email'");
						$row = mysqli_fetch_assoc($result);
						$nom=$row['nom'];
						$benevole=$row['benevole'];
						$president=$row['president'];
						echo $nom;
					?>
				</h3>
				<hr align="left" width="90%"></hr>
			</div>
			<div class="logout">
				<a href="../Controleurs/deconnexion.php">Log out</a>
			</div>
			
			
			<div class="menu_gauche">
				<ul>
					<li><a href="espace_utilisateur.php">Compte</a></li>
					<li><a class="menuGActive" href="espace_utilisateur_info.php">Information</a></li>
					<?php
						if($benevole==TRUE && $president==FALSE)
						{
							echo '<li><a href="espace_utilisateur_commander.php">Demander</a></li>';
							echo '<li><a href="espace_utilisateur_stock.php">Stock</a></li>';
							echo '<li><a href="espace_utilisateur_tresorerie.php">Tresorerie</a></li>';
							echo '<br/><br/><br/><br/><br/><br/><br/><br/>';
						}						
						else if($president==TRUE)
						{
							echo '<li><a href="espace_utilisateur_commander.php">Demander</a></li>';
							echo '<li><a href="espace_utilisateur_stock.php">Stock</a></li>';
							echo '<li><a href="espace_utilisateur_tresorerie.php">Tresorerie</a></li>';
							echo '<li><a href="espace_utilisateur_modifier.php">Modifier prix</a></li>';
							echo '<br/><br/><br/><br/><br/><br/><br/>';
						}
						else
						{
							echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
						}
					?>
				</ul>
			</div>
			
			<div class="contenuP">
				<form action='../Controleurs/modifierInfo.php' method="post">
								
					<table>
						<tr>
							<td>Tel</td>
							<td><input type="text" Name="tel" <?php 
																	$result3 = mysqli_query($co, "SELECT tel,adresse FROM utilisateur WHERE email = '$email'");
																	$row3 = mysqli_fetch_assoc($result3);
																	$tel=$row3['tel'];
																	$adresse=$row3['adresse'];
																	if($tel != null)
																		echo 'placeholder='.$tel;?>	></td>
						</tr>
						<tr>
							<td>Adresse</td>
							<td><input type="text" Name="adresse" <?php if($adresse != null) echo 'placeholder='.$adresse;?>	></td>
						</tr>
					</table>
					</br></br></br>
					<input style='float:right;margin-right:15%' type="submit" value="Enregistrer">
				</form>
				
			</div>
			
			<br/><br/><br/>
			<div class="footerE">
				</br><hr/>
				<footer>
					<p>Copyright (c) 2018 APERO. All rights reserved.</p></br>
				</footer>
			</div>
		</div>
	

	
	
	
	</body>
</html>
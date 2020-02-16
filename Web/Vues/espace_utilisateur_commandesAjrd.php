<!doctype HTML>
<html>
	<head>
		<title>Bienvenue �ڧ� APERO</title>
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
					<li><a href="espace_utilisateur_info.php">Information</a></li>
					<?php
						if($benevole==TRUE && $president==FALSE)
						{
							echo '<li><a class="menuGActive" href="espace_utilisateur_commander.php">Demander</a></li>';
							echo '<li><a href="espace_utilisateur_stock.php">Stock</a></li>';
							echo '<li><a href="espace_utilisateur_tresorerie.php">Tresorerie</a></li>';
							echo '<br/><br/><br/><br/><br/><br/><br/><br/>';
						}						
						else if($president==TRUE)
						{
							echo '<li><a class="menuGActive" href="espace_utilisateur_commander.php">Demander</a></li>';
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
			
				<?php
					$dateAjrd= date("Y-m-d");
					$result2 = mysqli_query($co, "SELECT * FROM commande WHERE dateCommande = '$dateAjrd'");
					
					if(mysqli_num_rows($result2)==0)
						echo '<p>Il n\'y a pas de commandes aujourd\'hui.</p>';
					else if(mysqli_num_rows($result2)==1)
					{
						echo '<p>Voici le commande d\'aujourd\'hui :</p>';
						$row2 = mysqli_fetch_assoc($result2);
						$num=$row2['numCommande'];
						$numE=$row2['numEnfant'];
						$montant=$row2['montant'];
						echo 	'<table>
									<tr>
										<th>Numero</th>	
										<th>ID Enfant</th>										
										<th>Montant</th>
									</tr>
									<tr>
										<td>'.$num.'</td>
										<td>'.$numE.'</td>
										<td>'.$montant.'</td>
									</tr>
								</table>';
						echo '<h3>Chiffres d\'affaires:'.$montant.'</h3>';
						//echo '</br></br></br></br></br></br></br>';
					}						
					else if(mysqli_num_rows($result2)>1)
					{
						echo '<p>Voici les transactions d\'aujourd\'hui :</p>';
						echo 	'<table>
									<tr>
										<th>Numero</th>	
										<th>ID Enfant</th>										
										<th>Montant</th>
									</tr>';
						$solde=0;
						while($row2=mysqli_fetch_array($result2))
						{
							$num=$row2['numCommande'];
							$numE=$row2['numEnfant'];
							$montant=$row2['montant'];
							echo 	'<tr>
										<td>'.$num.'</td>
										<td>'.$numE.'</td>
										<td>'.$montant.'</td>
									</tr>';
							$solde=$solde+$montant;
						}
						echo '</table>';
						echo '<h3>Chiffres d\'affaires:'.$solde.'</h3>';
					}									
				?>				
			</div>
			
			</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
			<div class="footerE" style="margin-top:-5%;">
				</br><hr/>
				<footer >
					<p>Copyright (c) 2018 APERO. All rights reserved.</p></br>
				</footer>
			</div>
		</div>
	

	
	
	
	</body>
</html>
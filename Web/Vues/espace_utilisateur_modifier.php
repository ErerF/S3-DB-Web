<!doctype HTML>
<html>
	<head>
		<title>Bienvenue a APERO</title>
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
							echo '<li><a class="menuGActive" href="espace_utilisateur_modifier.php">Modifier prix</a></li>';
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
					require_once('../Modeles/utilisateur.php');
					require_once('../Controleurs/connect.php');
				
					/********************Snacks********************/
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Pain au chocolat'");
					$row = mysqli_fetch_assoc($result);
					$prixPaC=$row['prix'];
					
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Sandwich au chocolat'");
					$row = mysqli_fetch_assoc($result);
					$prixSaC=$row['prix'];
					
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Barres chocolatee'");
					$row = mysqli_fetch_assoc($result);
					$prixBC=$row['prix'];
						
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Baguette'");
					$row = mysqli_fetch_assoc($result);
					$prixBagu=$row['prix'];
					
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Bonbons'");
					$row = mysqli_fetch_assoc($result);
					$prixBon=$row['prix'];
					
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Cookie'");
					$row = mysqli_fetch_assoc($result);
					$prixCookie=$row['prix'];
					
					
					/********************Boisson********************/
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Cafe'");
					$row = mysqli_fetch_assoc($result);
					$prixCafe=$row['prix'];
					
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Chocolat chaud'");
					$row = mysqli_fetch_assoc($result);
					$prixCC=$row['prix'];
					
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Jus d\'orange'");
					$row = mysqli_fetch_assoc($result);
					$prixJdO=$row['prix'];
					
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Cola'");
					$row = mysqli_fetch_assoc($result);
					$prixCola=$row['prix'];
					
					/********************Menu********************/
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Menu1'");
					$row = mysqli_fetch_assoc($result);
					$prixMenu1=$row['prix'];
					
					$result = mysqli_query($co, "SELECT prix FROM stock WHERE nomCourse='Menu2'");
					$row = mysqli_fetch_assoc($result);
					$prixMenu2=$row['prix'];
				?>
			
				<form action='../Controleurs/modifierP.php' method="post">

					<h3>Snacks</h3>
						<table>
							<tr>
								<td>Pain au chocolat</td>
								<td><?php echo $prixPaC;?></td>
								<td><input type="number" step="0.01" name="nbPaC"/></td>
							</tr>
							<tr>
								<td>Sandwich au chocolat</td>
								<td><?php echo $prixSaC;?></td>
								<td><input type="number" step="0.01" name="nbSaC"/></td>
							</tr>
							<tr>
								<td>Barres chocolatee</td>
								<td><?php echo $prixBC;?></td>	
								<td><input type="number" step="0.01" name="nbBC"/></td>
							</tr>
							<tr>
								<td>Baguette</td>
								<td><?php echo $prixBagu;?></td>	
								<td><input type="number" step="0.01" name="nbBagu"/></td>
							</tr>
							<tr>
								<td>Bonbons</td>
								<td><?php echo $prixBon;?></td>
								<td><input type="number" step="0.01" name="nbBon"/></td>
							</tr>
							<tr>
								<td>Cookie</td>
								<td><?php echo $prixCookie;?></td>
								<td><input type="number" step="0.01" name="nbCookie"/></td>
							</tr>
						</table>
					
					
					<h3>Boisson</h3>
						<table>
							<tr>
								<td>Cafe</td>
								<td><?php echo $prixCafe;?></td>
								<td><input type="number" step="0.01" name="nbCafe"/></td>
							</tr>
							<tr>
								<td>Chocolat chaud</td>
								<td><?php echo $prixCC;?></td>
								<td><input type="number" step="0.01" name="nbCC"/></td>
							</tr>
							<tr>
								<td>Jus d'orange</td>
								<td><?php echo $prixJdO;?></td>
								<td><input type="number" step="0.01" name="nbJdO"/></td>
							</tr>
							<tr>
								<td>Cola</td>
								<td><?php echo $prixCola;?></td>
								<td><input type="number" step="0.01" name="nbCola"/></td>
							</tr>
						</table>
						
					<h3>Menu</h3>					
						<table style="font-size:13px;">
							<tr>
								<td>Pain/sandwich au chocolat + Boisson</td>
								<td>2.5</td>
								<td><input type="number" step="0.01" name="nbMenu1"></td>
							</tr>
							<tr>
								<td>1/2 Sandwich au chocolat + 1/2 Baguette</td>
								<td>1.5</td>
								<td><input type="number" step="0.01" name="nbMenu2"></td>
							</tr>
						</table>	
								
					<input style='float:right;margin-right:15%' type="submit" value="Enregistrer">
				</form>
				
			</div>
			
			</br></br></br></br>
			<div class="footerE" style="margin-top:-5%;">
				</br><hr/>
				<footer >
					<p>Copyright (c) 2018 APERO. All rights reserved.</p></br>
				</footer>
			</div>
		</div>
	

	
	
	
	</body>
</html>
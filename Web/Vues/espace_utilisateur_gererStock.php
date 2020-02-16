<!doctype HTML>
<html>
	<head>
		<title>Bienvenue ид APERO</title>
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
							echo '<li><a class="menuGActive" href="espace_utilisateur_stock.php">Stock</a></li>';
							echo '<li><a href="espace_utilisateur_tresorerie.php">Tresorerie</a></li>';
							echo '<br/><br/><br/><br/><br/><br/><br/><br/>';
						}						
						else if($president==TRUE)
						{
							echo '<li><a href="espace_utilisateur_commander.php">Demander</a></li>';
							echo '<li><a class="menuGActive" href="espace_utilisateur_stock.php">Stock</a></li>';
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
					require_once('../Modeles/utilisateur.php');
					require_once('../Controleurs/connect.php');
				
					/********************Snacks********************/
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Pain au chocolat'");
					$row = mysqli_fetch_assoc($result);
					$stockPaC=$row['nbCourse'];
					
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Sandwich au chocolat'");
					$row = mysqli_fetch_assoc($result);
					$stockSaC=$row['nbCourse'];
					
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Barres chocolatee'");
					$row = mysqli_fetch_assoc($result);
					$stockBC=$row['nbCourse'];
						
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Baguette'");
					$row = mysqli_fetch_assoc($result);
					$stockBagu=$row['nbCourse'];
					
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Bonbons'");
					$row = mysqli_fetch_assoc($result);
					$stockBon=$row['nbCourse'];
					
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cookie'");
					$row = mysqli_fetch_assoc($result);
					$stockCookie=$row['nbCourse'];
					
					
					/********************Boisson********************/
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cafe'");
					$row = mysqli_fetch_assoc($result);
					$stockCafe=$row['nbCourse'];
					
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Chocolat chaud'");
					$row = mysqli_fetch_assoc($result);
					$stockCC=$row['nbCourse'];
					
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Jus d\'orange'");
					$row = mysqli_fetch_assoc($result);
					$stockJdO=$row['nbCourse'];
					
					$result = mysqli_query($co, "SELECT nbCourse FROM stock WHERE nomCourse='Cola'");
					$row = mysqli_fetch_assoc($result);
					$stockCola=$row['nbCourse'];
					
				?>
			
				<form action='../Controleurs/gererStock.php' method="post">

					<h3>Snacks</h3>
						<table>
							<tr>
								<td>Pain au chocolat</td>
								<td><?php echo $stockPaC;?></td>
								<td><input type="number" step="0.01" name="nbPaC"/></td>
							</tr>
							<tr>
								<td>Sandwich au chocolat</td>
								<td><?php echo $stockSaC;?></td>
								<td><input type="number" step="0.01" name="nbSaC"/></td>
							</tr>
							<tr>
								<td>Barres chocolatee</td>
								<td><?php echo $stockBC;?></td>	
								<td><input type="number" step="0.01" name="nbBC"/></td>
							</tr>
							<tr>
								<td>Baguette</td>
								<td><?php echo $stockBagu;?></td>	
								<td><input type="number" step="0.01" name="nbBagu"/></td>
							</tr>
							<tr>
								<td>Bonbons/td>
								<td><?php echo $stockBon;?></td>
								<td><input type="number" step="0.01" name="nbBon"/></td>
							</tr>
							<tr>
								<td>Cookie</td>
								<td><?php echo $stockCookie;?></td>
								<td><input type="number" step="0.01" name="nbCookie"/></td>
							</tr>
						</table>
					
					
					<h3>Boisson</h3>
						<table>
							<tr>
								<td>Cafe</td>
								<td><?php echo $stockCafe;?></td>
								<td><input type="number" name="nbCafe"/></td>
							</tr>
							<tr>
								<td>Chocolat chaud</td>
								<td><?php echo $stockCC;?></td>
								<td><input type="number" name="nbCC"/></td>
							</tr>
							<tr>
								<td>Jus d'orange</td>
								<td><?php echo $stockJdO;?></td>
								<td><input type="number" name="nbJdO"/></td>
							</tr>
							<tr>
								<td>Cola</td>
								<td><?php echo $stockCola;?></td>
								<td><input type="number" name="nbCola"/></td>
							</tr>
						</table>
								
					<input style='float:right;margin-right:15%' type="submit" value="Enregistrer">
				</form>
				
			</div>
			
			</br></br></br></br></br></br></br>
			<div class="footerE" style="margin-top:-5%;">
				</br><hr/>
				<footer >
					<p>Copyright (c) 2018 APERO. All rights reserved.</p></br>
				</footer>
			</div>
		</div>
	

	
	
	
	</body>
</html>
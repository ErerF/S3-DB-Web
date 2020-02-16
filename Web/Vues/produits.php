<!doctype HTML>
<html>
	<head>
		<title>Bienvenue à APERO</title>
		<link rel="stylesheet" href="style/style_accueil.css" type="text/css"/>
		<link rel="stylesheet" href="style/style_produits.css" type="text/css"/>
	</head>
	
	<body>		
		<div class="contenu">
			<div class="header" >
				<div class="logo"><img src="../img/logo.png" alt="Logo" width="100" /></div>
				<div class="title"><h2>APERO</h2></div>
				
				<div class="menu">
					<a href="accueil.html">Accueil</a>
					<a class="menuActive" href="produits.php">Produits</a>
					<a href="login.php">Mon Compte</a>
					<a href="contactezNous.html">Contactez-nous</a>
				</div>
			</div>
			
			<div class="produits">
			
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
			
				<table>
					<tr>
						<td>
							<div class="gateau">
								</br></br>
								<fieldset>
									<legend>Snacks</legend>
									<table>
										<tr>
											<td>Pain au chocolat</td>
											<td><?php echo $prixPaC;?></td>
										</tr>
										<tr>
											<td>Sandwich au chocolat</td>
											<td><?php echo $prixSaC;?></td>
										</tr>
										<tr>
											<td>Barres chocolatee</td>
											<td><?php echo $prixBC;?></td>
										</tr>
										<tr>
											<td>Baguette</td>
											<td><?php echo $prixBagu;?></td>
										</tr>
										<tr>
											<td>Bonbons</td>
											<td><?php echo $prixBon;?></td>
										</tr>
										<tr>
											<td>Cookie</td>
											<td><?php echo $prixCookie;?></td>
										</tr>
									</table>
								</fieldset>
							</div>
						</td>
						
						<td>
							<div class="boisson">
								</br></br>
								<fieldset>
									<legend>BOISSON</legend>
									<table>
										<tr>
											<td>Cafe</td>
											<td><?php echo $prixCafe;?></td>
										</tr>
										<tr>
											<td>Chocolat chaud</td>
											<td><?php echo $prixCC;?></td>
										</tr>
										<tr>
											<td>Jus d'orange</td>
											<td><?php echo $prixJdO;?></td>
										</tr>
										<tr>
											<td>Cola</td>
											<td><?php echo $prixCola;?></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
										</tr>
									</table>
									</br></br>
								</fieldset>
							</div>
						</td>
					</tr>
				</table>
				
				<div class="menuP">
					</br></br>
					<fieldset>
						<legend>MENU</legend>
						<table>
							<tr>
								<td>Pain/sandwich au chocolat + Boisson</td>
								<td><?php echo $prixMenu1;?></td>
							</tr>
							<tr>
								<td>1/2 Sandwich au chocolat + 1/2 Baguette</td>
								<td><?php echo $prixMenu2;?></td>
							</tr>
						</table>
					</fieldset>
				</div>
				
				</br></br>

				
			</div>
			
			<div class="button">
				<a href='login.php'>
					<button name="button">Demander</button>
				</a>
			</div>
						
			</br></br></br></br></br></br></br></br></br></br></br>
			<div class="footer">
				</br><hr/>
				<footer>
					<p>Copyright (c) 2018 APERO. All rights reserved.</p></br>
				</footer>
			</div>
		</div>
	
		
	
	
	
	
	</body>
</html>
<!doctype HTML>
<html>
	<head>
		<title>Bienvenue a APERO</title>
		<link rel="stylesheet" href="style/style_accueil.css" type="text/css"/>
		<link rel="stylesheet" href="style/style_espace.css" type="text/css"/>
		<script type="text/javascript" src="../Controleurs/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="../Controleurs/calculerPrixT.js"></script>
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
			
			<div class="lienCAjrd">
				<a class='lien' style="float:right;margin-right:10%;margin-top:-41%;" href='espace_utilisateur_commandesAjrd.php'>Voir les commandes d'aujourd'hui</a>
			</div>
			
			<div class="contenuP">
			
				<?php
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
			
				<form action='../Controleurs/commander.php' method="post">
					<table style="table-layout:fixed;">
						<tr>
							<th style="text-align:left;" colspan="2">Numero d'enfant : <input type="text" name="numE"></input></th>
							<th>Quantite</th>
							<th>Prix Total</th>
						</tr>
					</table>
					<h3>Snacks</h3>
						<table style="table-layout:fixed;">
							<tr>
								<td>Pain au chocolat</td>
								<td class="prixCourse"><span><?php echo $prixPaC;?></span></td>
								<td><input class="nbCourse" name="nbPaC" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
							<tr>
								<td>Sandwich au chocolat</td>
								<td class="prixCourse"><span><?php echo $prixSaC;?></span></td>
								<td><input class="nbCourse" name="nbSaC" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
							<tr>
								<td>Barres chocolatee</td>
								<td class="prixCourse"><span><?php echo $prixBC;?></span></td>							
								<td><input class="nbCourse" name="nbBC" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
							<tr>
								<td>Baguette</td>
								<td class="prixCourse"><span><?php echo $prixBagu;?></span></td>							
								<td><input class="nbCourse" name="nbBagu" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
							<tr>
								<td>Bonbons</td>
								<td class="prixCourse"><span><?php echo $prixBon;?></span></td>					
								<td><input class="nbCourse" name="nbBon" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
							<tr>
								<td>Cookie</td>
								<td class="prixCourse"><span><?php echo $prixCookie;?></span></td>						
								<td><input class="nbCourse" name="nbCookie" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
						</table>
					
					
					<h3>Boisson</h3>
						<table>
							<tr>
								<td>Cafe</td>
								<td class="prixCourse"><span><?php echo $prixCafe;?></span></td>
								<td><input class="nbCourse" name="nbCafe" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
							<tr>
								<td>Chocolat chaud</td>
								<td class="prixCourse"><span><?php echo $prixCC;?></span></td>
								<td><input class="nbCourse" name="nbCC" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
							<tr>
								<td>Jus d'orange</td>
								<td class="prixCourse"><span><?php echo $prixJdO;?></span></td>
								<td><input class="nbCourse" name="nbJdO" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
							<tr>
								<td>Cola</td>
								<td class="prixCourse"><span><?php echo $prixCola;?></span></td>
								<td><input class="nbCourse" name="nbCola" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
						</table>
					<h3>Menu</h3>					
						<table style="font-size:13px;">
							<tr>
								<td>Pain/sandwich au chocolat + Boisson</td>
								<td class="prixCourse"><span><?php echo $prixMenu1;?></span></td>
								<td><input class="nbCourse" name="nbMenu1" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
						</table>	
						
						<table>
							<tr>
								<td><input name="gouterM" type="radio" value="PaC" checked="checked" />Pain au chocolat</td>								
								<td style="font-size:14px;" ><input name="gouterM" type="radio" value="SaC" />Sandwich au chocolat</td>
								<td></td>
								<td></td>								
							<tr>
								<td><input name="boissonM" type="radio" value="cafe" checked="checked" />Cafe</td>
								<td><input name="boissonM" type="radio" value="CC" />Chocolat chaud</td>
								<td><input name="boissonM" type="radio" value="JdO" />Jus d'orange</td>
								<td><input name="boissonM" type="radio" value="Cola" />Cola</td>
							</tr>
							<!--<tr>
								<td>
									<select name="gouterChoix" >
										<option value="PaC">Pain au chocolat</option>
										<option value="SaC">Sandwich au chocolat</option>
									</select>
								</td>
								<td>
									<select name="boissonChoix" >
										<option value="cafe">Cafe</option>
										<option value="CC">Chocolat chaud</option>
										<option value="JdO">Jus d'orange</option>
										<option value="Cola">Cola</option>
									</select>
								</td>
							</tr>-->
						</table>
						
						<table style="font-size:12px;">
							<tr>
								<td>1/2 Sandwich au chocolat + 1/2 Baguette</td>
								<td class="prixCourse"><span><?php echo $prixMenu2;?></span></td>
								<td><input class="nbCourse" name="nbMenu2" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"></td>
								<td class="rowTotal">
									<input type="text" class="rowTotal-input" id="turface-pro-league-row-total" disabled="disabled"></input>
								</td>
							</tr>
						</table>					
				
					<h3>Prix Total : <input type="text" class="total-box" id="product-subtotal" name="product-subtotal"  readonly = "readonly"></h3>
					
					<input style='float:right;margin-right:15%' type="submit" name="action" value="Demander">
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
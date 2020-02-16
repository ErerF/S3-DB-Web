<!doctype HTML>

<?php      
	require_once('../Controleurs/connect.php');
    session_start();  
	if(isset($_SESSION['email']))
	{
		$espacePer_url = 'espace_utilisateur.php';  
		header('Location: '.$espacePer_url);  
	}
?>  

<html>
	<head>
		<title>Bienvenue à APERO</title>
		<link rel="stylesheet" href="style/style_accueil.css" type="text/css"/>
		<link rel="stylesheet" href="style/style_login.css" type="text/css"/>
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
			
			</br></br>
			
			<div class="container">
				
				<div class="formLogin">
					<div class="login">
						</br>
						<h3>Log In</h3>
						<form action="../Controleurs/connexion.php" method="post">
							<input type="text" Name="email" placeholder="Adresse email" required="">
							<input type="password" Name="password" placeholder="Mot de passe" required="">
							<input type="checkbox" name="remember" /><label>Remember me</label></br></br></br>
						
							<div class="send-button">
								<input type="submit" value="Log In">							
							</div>
						</form>
					</div>
					<div class="register">
						</br>
						<h3>M'inscris</h3>
						<form action="../Controleurs/inscription.php" method="post">
							<input type="text" Name="email" placeholder="Adresse email" required="">
							<input type="password" Name="password" placeholder="Mot de passe" required="">
							<input type="text" Name="nom" style="text-transform:uppercase" placeholder="Nom de famille" required="">
						
						
						<div class="send-button">
							
							<input type="submit" value="M'inscris">
							
						</div>
						</form>
						<div class="clear"></div>
					</div>

					<div class="clear"></div>

				</div>	
			</div>
			
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
						
			<div class="footer">
				</br><hr/>
				<footer>
					<p>Copyright (c) 2018 APERO. All rights reserved.</p></br>
				</footer>
			</div>
		</div>
	</body>
</html>
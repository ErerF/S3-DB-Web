<?php
	session_start();
	class utilisateur {
		private $co;
		public $email;
		private $password;
		private $nom;
		private $tel;
		private $benevole;//1:TRUE	0:FALSE
		private $president;
		

		function __construct() {
			$nbArgs = func_num_args();
			$argv = func_get_args();

			switch ($nbArgs) {				
				case 3:
					//Si le membre est déjà dans la base de données
					$co = $argv[0];
					$email = $argv[1];
					$password = $argv[2];
					
					$requete = "SELECT nom,tel,benevole,president FROM utilisateur WHERE email = '$email' AND password = '$password'";
					$resultat = mysqli_query($co,$requete) or die("Erreur SELECT");

					$row = mysqli_fetch_assoc($resultat);
				
					$this->co = $co;
					$this->email = $email;
					$this->password = $password;
					$this->nom = $row['nom'];
					$this->tel = $row['tel'];
					$this->benevole = $row['benevole'];
					$this->president = $row['president'];
					
					
					mysqli_close($co);

					break;
				
				case 4:
					//Si le membre n'est pas dans la base de données
					$co = $argv[0];
					$email = $argv[1];
					$password = $argv[2];
					$nom=$argv[3];
					
					$resultat = mysqli_query($co,"INSERT INTO utilisateur(email,password,nom) VALUES ('$email','$password','$nom')")or die("Erreur INSERT");
					
					$this->co = $co;
					$this->email = $email;
					$this->password = $password;
					$this->nom = $nom;
					
					mysqli_close($co);        		
					break;

		
			}


		}
		public function connexion ()
		{
			session_start();
			$_SESSION["email"]= $this->email;
			$_SESSION['password'] = $this->password;
		}
		public function deconnexion ()
		{
			session_destroy();
			setcookie('email','',0);
			setcookie('password','',0);
			mysqli_close($co);
		}
		public function modif_mdepasse ($newPassword)
		{
			$maj_result = mysqli_query($co,"UPDATE membres SET mdpasse = '$newPassword' WHERE email = '$email'");
		}
	}
?>
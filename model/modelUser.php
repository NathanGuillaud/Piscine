<?php
	require_once File::buildPath(array('library', 'usefull.php'));
	require_once File::buildPath(array('model', 'model.php'));

	class ModelUser {
		
		private $login;
	    private $password;
	    private $email;
	    
	    function getLoginUser() {
	        return $this->login;
	    }
	    
	    function getMdpUser(){
	        return $this->password;
	    }
	            
	    function getMailUser() {
	        return $this->email;
	    }

	    //constructeur
	    function __construct($login = NULL, $password = NULL, $email = NULL) {
	        

	        if (!is_null($login) && !is_null($password) && !is_null($email)) {

	                $this->login = $login;
	                $this->password = $password;
	                $this->email = $email;

	        }
	    }
			

		// Retourne un utilisateur par son id
		public static function getUserID($idUser) {
			$sql = "SELECT * from user WHERE idUser=:idUser";
	        try {
	            // Préparation de la requête
	            $req_prep = Model::$pdo->prepare($sql);

	            $values = array(
	                "idUser" => $idUser,
	            );
	            // On donne les valeurs et on exécute la requête	 
	            $req_prep->execute($values);

	            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
	            $tab_prod = $req_prep->fetchAll();
	        } catch (PDOException $e) {
	            echo('Error tout casse ( /!\ method getUserID() /!\ )');
        	}

        	// Attention, si il n'y a pas de résultats, on renvoie false
	        if (empty($tab_prod)) {
	            return false;
	        }

	        return $tab_prod[0];
		}

		// Retourne un utilisateur par son login ou false si aucun utilisateur n'est trouvé
		public static function getUserLogin($login) {
			$sql = "SELECT * from user WHERE login=:login";
	        try {
	            // Préparation de la requête
	            $req_prep = Model::$pdo->prepare($sql);

	            $values = array(
	                "login" => $login,
	            );
	            // On donne les valeurs et on exécute la requête	 
	            $req_prep->execute($values);

	            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
	            $tab_prod = $req_prep->fetchAll();
	        } catch (PDOException $e) {
	            echo('Error tout casse ( /!\ method getUserLogin() /!\ )');
        	}

        	// Attention, si il n'y a pas de résultats, on renvoie false
	        if (empty($tab_prod)) {
	            return false;
	        }

	        return $tab_prod[0];
		}

		// Retourne un utilisateur par son email
		public static function getUserEmail($email) {
			$sql = "SELECT * from user WHERE email=:email";
	        try {
	            // Préparation de la requête
	            $req_prep = Model::$pdo->prepare($sql);

	            $values = array(
	                "email" => $email,
	            );
	            // On donne les valeurs et on exécute la requête	 
	            $req_prep->execute($values);

	            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
	            $tab_prod = $req_prep->fetchAll();
	        } catch (PDOException $e) {
	            echo('Error tout casse ( /!\ method getUserEmail() /!\ )');
        	}

        	// Attention, si il n'y a pas de résultats, on renvoie false
	        if (empty($tab_prod)) {
	            return false;
	        }

	        return $tab_prod[0];
		}

		// Vérifie les conditions d'inscriptions
		public static function checkRegister($login, $password, $passwordRetype, $email) {
			// Le login est trop court
			if (strlen($login) < 3) {
				throw new Exception('Le login doit être d\' au moins 4 caractères');
			}

			// Le login est trop long
			if (strlen($login) > 20) {
				throw new Exception('Le login doit faire moins de 20 caractères !');
			}

			// Le mot de passe est trop court
			if (strlen($password) < 4) {
				throw new Exception('Le mot de passe doit être d\' au moins 5 caractères !');
			}

			// Le mot de passe est trop long
			if (strlen($password) > 32) {
				throw new Exception('Le mot de passe doit faire moins de 32 caractères !');
			}

			// Les mots de passe ne correspondent pas
			if ($password != $passwordRetype) {
				throw new Exception('Mot de passe différents !');
			}

			// Vérifie que le nom d'utilisateur n'est pas déjà utilisé
			if (ModelUser::getUserLogin($login)) {
				throw new Exception('Login déjà utilisé !');
			}

			if (strlen($email) > 300) {
				throw new Exception('Le mail doit faire moins de 300 caractères !');
			}

			// Vérifie que l'adresse email est valide
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				throw new Exception('Format de mail invalide !');
			}

			// Vérifie que l'adresse email n'est pas déjà utilisé
			if (ModelUser::getUserEmail($email)) {
				throw new Exception('Ce mail est déjà utilisé !');
			}

			return true;
		}

		public function saveUser() {

			$sql = "INSERT INTO user (login, password, email) VALUES (:login_tag, :password_tag, :email_tag)";

			//On crypte le mdp en sha256 avec une seed
			$passwordCrypt = Usefull::crypt($this->getMdpUser());

			try {
				$req_prep = Model::$pdo->prepare($sql);
				$values = array(
					"login_tag" => $this->getLoginUser(),
					"password_tag" => $passwordCrypt,
					"email_tag" => $this->getMailUser(),
				);
				$req_prep->execute($values);
			} catch (PDOException $e) {
				echo('Error tout casse ( /!\ methode saveUser /!\ )' . $e);
			}
		}

		// Vérifie si il est possible de trouver un utilisateur avec ce login / mot de passe
		public static function checkConnection($login, $password) {
			// On crypte le mot de passe
			$passwordCrypt = Usefull::crypt($password);

			$sql = "SELECT * from user WHERE login=:login AND password=:password";
	        try {
	            // Préparation de la requête
	            $req_prep = Model::$pdo->prepare($sql);

	            $values = array(
	                "login" => $login,
	                "password" => $passwordCrypt,
	            );
	            // On donne les valeurs et on exécute la requête	 
	            $req_prep->execute($values);

	            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
	            $tab_prod = $req_prep->fetchAll();
	        } catch (PDOException $e) {
	            echo('Error tout casse ( /!\ method getUserEmail() /!\ )');
        	}

        	// Attention, si il n'y a pas de résultats, on renvoie false
	        if (empty($tab_prod)) {
	            return false;
	        }	      

	        return $tab_prod[0];		
		}

		// Connecte réellement l'utilisateur
		public static function connect($user) {
			// Démarre la session
			$_SESSION['id'] = $user->idUser;
			$_SESSION['login'] = $user->login;
		}

		// Vérifie que l'utilisateur est connecté
		public static function isConnected() {
			return isset($_SESSION['id']);
		}

		// Vérifie que le login est bien l'utilisateur connecté
		public static function isUser($idUser) {
			return (isset($_SESSION['id']) && ($_SESSION['id'] == $idUser));
		}
	}
?>
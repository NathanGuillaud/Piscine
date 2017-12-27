<?php
	require_once File::buildPath(array('model', 'modelUser.php'));

	class ControllerUser {

		// Affiche un formulaire d'inscription
		public static function viewRegister() {
			$controller = 'user';
			$view       = 'register';
			$title      = 'Enregistrement';

			require_once File::buildPath(array('view', 'view.php'));
		}

		// Enregistre l'utilisateur dans la base de données
		public static function actionRegister() {
			$login          = $_POST['login'];
			$password       = $_POST['password'];
			$passwordRetype = $_POST['passwordRetype'];
			$email          = $_POST['email'];

			$controller = 'user';
			$view       = 'register';
			$title      = 'Enregistrement';

			// Vérifie que les informations soit valides
			try {
				ModelUser::checkRegister($login, $password, $passwordRetype, $email);
			} catch (Exception $e) {
				$error = $e->getMessage();
				require_once File::buildPath(array('view', 'view.php'));
				return false;
			}
			
			// Ajoute l'utilisateur dans la base de données
			try {
				$user = new ModelUser($login, $password, $email);
				$user->saveUser();
				$controller = 'user';
				$view       = 'connect';
				$title      = 'Connexion';
				require_once File::buildPath(array('view', 'view.php'));
			} catch (PDOException $exception) {
				if (Conf::$debug) {
					echo $exception->getMessage();
					die();
				}
				$error = 'Désolé nous ne pouvons pas vous enregistrer maintenant !';
				require_once File::buildPath(array('view', 'view.php'));
				return false;
			}
		}

		// Affiche un formulaire de connexion
		public static function viewConnect() {
			$controller = 'user';
			$view       = 'connect';
			$title      = 'Connexion';
			
			if (ModelUser::isConnected()){
				$controller = 'accueil';
				$view       = 'home';
				$title      = 'Accueil';
			}
			
			require_once File::buildPath(array('view', 'view.php'));	
		}

		// Vérifie la connexion
		public static function actionConnect() {
			if(ModelUser::isConnected()){
				$controller = 'accueil';
				$view       = 'home';
				$title      = 'Accueil';
				require_once File::buildPath(array('view', 'view.php'));
				return true;
			}
			
			$login    = $_POST['login'];
			$password = $_POST['password'];

			$controller = 'user';
			$view       = 'connect';
			$title      = 'Connexion';

			// Essaye de connecter l'utilisateur
			try {
				$user = ModelUser::checkConnection($login, $password);
			} catch (PDOException $exception) {
				if (Conf::$debug) {
					echo $exception->getMessage();
					die();
				}
				$error = 'Désolé nous ne pouvons pas vous enregistrer maintenant !';
				require_once File::buildPath(array('view', 'view.php'));
				return false;
			}

			// On n'a pas trouvé l'utilisateur
			if (!$user) {
				$error = 'Login ou mot de passe incorrect !';
				require_once File::buildPath(array('view', 'view.php'));
				return false;
			}
			
			$controller = 'accueil';
			$view       = 'home';
			$title      = 'Accueil';

			// Sinon on connecte l'utilisateur
			ModelUser::connect($user);
			require_once File::buildPath(array('view', 'view.php'));
		}
		
		// Déconnecte un utilisateur
		public static function actionDisconnect() {
			// Vérifie que l'utilisateur est déconnecté
			$controller = 'user';
			$view       = 'connect';
			$title      = 'Connexion';
			if (ModelUser::isConnected()) {
				session_unset();
				session_destroy();
				setcookie(session_name(), '', time() - 1);
			}
			require_once File::buildPath(array('view', 'view.php'));
		}
	}
?>
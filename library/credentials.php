<?php

	class Credentials {

		// Nom de l'hôte de la base de donnée
		private static $databaseHostname = 'localhost';
		// Nom de la base de données
		private static $databaseName = 'piscine';
		// Nom d'utilisateur de la base de donnée
		private static $databaseLogin = 'root';
		// Mot de passe de la base de donnée
		private static $databasePassword = 'root';

		static function getDataBaseHostname(){
			return self::$databaseHostname;
		}

		static function getDataBaseName(){
			return self::$databaseName;
		}

		static function getDataBaseLogin(){
			return self::$databaseLogin;
		}

		static function getDataBasePassword(){
			return self::$databasePassword;
		}

	}
?>

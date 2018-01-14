<?php

require_once File::buildPath(array("library", "credentials.php"));

class Model {

    public static $pdo;
    private $hostanme;
    private $database_name;
    private $login;
    private $password;

    public static function Init() {
        $hostname = Credentials::getDataBaseHostname();
        $database_name = Credentials::getDataBaseName();
        $login = Credentials::getDataBaseLogin();
        $password = Credentials::getDataBasePassword();

        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage(); // affiche un message d'erreur        
        }
    }
}

Model::Init();
?>
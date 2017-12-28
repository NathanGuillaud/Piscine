<?php
require_once File::buildPath(array('library', 'usefull.php'));
require_once File::buildPath(array('model', 'model.php'));

class ModelContact {
	private $numContact;	
	private $estPrivilegie;
	private $nomContact;
	private $prenomContact;
	private $mailContact;	
	private $poste;
	private $telContact;
	private $numEditeur;
	
	public function getNumContact(){
		return $this->numContact;
	}

	public function getNumEditeur(){
		return $this->numEditeur;
	}
	
	public function getNomContact(){
		return $this->nomContact;
	}
	
	public function getMailContact(){
		return $this->mailContact;
	}
	
	public function getTelContact(){
		return $this->telContact;
	}
	
	public function getPoste(){
		return $this->poste;
	}
	
	public function getPrenomContact(){
		return $this->prenomContact;
	}

	public function getEstPrivilegie(){
		return $this->estPrivilegie;
	}
	
	// un constructeur
	public function __construct($estPrivilegie = NULL, $nomContact = NULL, $prenomContact = NULL, $mailContact = NULL, $poste = NULL, $telContact = NULL, $numEditeur = NULL) {
		if (!is_null($estPrivilegie) && !is_null($nomContact) && !is_null($prenomContact) && !is_null($mailContact) && !is_null($poste) && !is_null($telContact) && !is_null($numEditeur)) {
			$this->estPrivilegie = $estPrivilegie;
			$this->nomContact = $nomContact;
			$this->prenomContact = $prenomContact;
			$this->mailContact = $mailContact;
			$this->poste = $poste;
			$this->telContact = $telContact;
			$this->numEditeur = $numEditeur;
		}
	}

	//methode d'affichage de tous les contacts d'un editeur !
	static public function getAllContact($numEditeur) {
		$sql = "SELECT * from contact WHERE numEditeur=:num_editeur";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_editeur" => $numEditeur,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelContact');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllContact() /!\ )');
		}

		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod;
	}		
	
	static public function getContactByNum($numContact) {
		$sql = "SELECT * from contact WHERE numContact=:num_contact";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_contact" => $numContact,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelContact');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getContactByNum() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}
	
	public function save() {

		$sql = "INSERT INTO contact (estPrivilegie, nomContact, prenomContact, mailContact, poste, telContact, numEditeur) VALUES (:estPrivilegie_tag, :nom_tag, :prenom_tag, :mail_tag, :poste_tag, :tel_tag, :num_editeur)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"estPrivilegie_tag" => $this->getEstPrivilegie(),
				"nom_tag" => $this->getNomContact(),
				"prenom_tag" => $this->getPrenomContact(),
				"mail_tag" => $this->getMailContact(),
				"poste_tag" => $this->getPoste(),
				"tel_tag" => $this->getTelContact(),
				"num_editeur" => $this->getNumEditeur(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save /!\ )' . $e);
		}
	}
	
	public function deleteContact() {
		$sql = "DELETE FROM contact WHERE contact.numContact = :numContact_tag";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"numContact_tag" => $this->getNumContact(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method delete /!\ )');
		}
	} 
}

?>
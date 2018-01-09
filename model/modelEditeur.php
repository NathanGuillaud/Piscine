<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelEditeur {
	private $numEditeur;
	private $nomEditeur;
	private $mailEditeur;
	private $telEditeur;
	private $siteEditeur;
	private $commentaire;

	public function getNumEditeur(){
		return $this->numEditeur;
	}

	public function getNomEditeur(){
		return $this->nomEditeur;
	}

	public function getMailEditeur(){
		return $this->mailEditeur;
	}

	public function getTelEditeur(){
		return $this->telEditeur;
	}

	public function getSiteEditeur(){
		return $this->siteEditeur;
	}

	public function getComEditeur(){
		return $this->commentaire;
	}

		// un constructeur
	public function __construct($nomEditeur = NULL, $mailEditeur = NULL, $telEditeur = NULL, $siteEditeur = NULL, $commentaire = NULL) {
		if (!is_null($nomEditeur) && !is_null($mailEditeur) && !is_null($telEditeur) && !is_null($siteEditeur) && !is_null($commentaire)) {
			$this->nomEditeur = $nomEditeur;
			$this->mailEditeur = $mailEditeur;
			$this->telEditeur = $telEditeur;
			$this->siteEditeur = $siteEditeur;
			$this->commentaire = $commentaire;
		}
	}

		//methode d'affichage de tous les editeurs
	static public function getAllEditeurs() {
		try {
			$rep = Model::$pdo->query('SELECT * FROM editeur');
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelEditeur');
			$tab_prod = $rep->fetchAll();
			return $tab_prod;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllEditeurs() /!\ )');
		}
	}

	static public function getEditeurByNum($numEditeur) {
		$sql = "SELECT * from editeur WHERE numEditeur=:num_editeur";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_editeur" => $numEditeur,
			);
	            // On donne les valeurs et on exécute la requête
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEditeur');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getEditeurByNum() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

	public function save() {
		$sql = "INSERT INTO editeur (nomEditeur, mailEditeur, telEditeur, siteEditeur, commentaire) VALUES (:nom_tag, :mail_tag, :tel_tag, :site_tag, :com_tag)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nom_tag" => $this->getNomEditeur(),
				"mail_tag" => $this->getMailEditeur(),
				"tel_tag" => $this->getTelEditeur(),
				"site_tag" => $this->getSiteEditeur(),
				"com_tag" => $this->getComEditeur(),
			);
			$req_prep->execute($values);

			$numEditeur = Model::$pdo->lastInsertId();
			$sql2 = "INSERT INTO suivi (datePremierContact, relanceContact, compteRendu, interesse, estPresent, commentaire, numEditeur, facture) VALUES (:datePremierContact, :relanceContact, :compteRendu, :interesse, :estPresent, :commentaire, :numEditeur, :facture)";

			try {
				$dateCourante = new DateTime();
				$dateRelance = new DateTime("+ 2 weeks");
				$dateCR = new DateTime("+ 4 weeks");
				$req_prep2 = Model::$pdo->prepare($sql2);
				$values2 = array(
					"datePremierContact" => $dateCourante->format('Y-m-d'),
					"relanceContact" => $dateRelance->format('Y-m-d'),
					"compteRendu" => $dateCR->format('Y-m-d'),
					"interesse" => 0,
					"estPresent" => 0,
					"commentaire" => "",
					"numEditeur" => $numEditeur,
					"facture" => 0,
				);
				$req_prep2->execute($values2);
			} catch (PDOException $e2) {
				echo('Error tout casse ( /!\ methode save /!\ )' . $e2);
			}

		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save /!\ )' . $e);
		}
	}

	public function deleteEditeur() {
		$sql = "DELETE FROM editeur WHERE editeur.numEditeur = :numEditeur_tag";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"numEditeur_tag" => $this->getNumEditeur(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method delete /!\ )');
		}
	}

	public function update($numEditeur){
		$sql = "UPDATE editeur SET editeur.nomEditeur = :nom_tag,
								   editeur.mailEditeur = :mail_tag,
								   editeur.telEditeur = :tel_tag,
								   editeur.siteEditeur = :site_tag,
								   editeur.commentaire = :com_tag
							 WHERE editeur.numEditeur = :num_editeur";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"num_editeur" => $numEditeur,
				"nom_tag" => $this->getNomEditeur(),
				"mail_tag" => $this->getMailEditeur(),
				"tel_tag" => $this->getTelEditeur(),
				"site_tag" => $this->getSiteEditeur(),
				"com_tag" => $this->getComEditeur(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update /!\ )');
		}
	}

}

?>

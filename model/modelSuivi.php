<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelSuivi {
	private $numSuivi;
	private $date;
	private $relance;
	private $cr;
	private $interesse;
	private $present;
	private $commentaire;
	private $numEditeur;

	public function getNumSuivi(){
		return $this->numSuivi;
	}

	public function getDateSuivi(){
		return $this->datePremierContact;
	}

	public function getRelance(){
		return $this->relanceContact;
	}

	public function getCR(){
		return $this->compteRendu;
	}

	public function getInteresse(){
		return $this->interesse;
	}

	public function getEstPresent(){
		return $this->estPresent;
	}

	public function getCommentaire(){
		return $this->commentaire;
	}

	public function getEditeur(){
		return $this->numEditeur;
	}

	// un constructeur
	public function __construct($date = NULL, $relance = NULL, $cr = NULL, $interesse = NULL, $present = NULL, $commentaire = NULL, $numEditeur = NULL) {
		if (!is_null($date) && !is_null($relance) && !is_null($cr) && !is_null($interesse) && !is_null($present) && !is_null($commentaire) && !is_null($numEditeur)) {
			$this->datePremierContact = $date;
			$this->relanceContact = $relance;
			$this->compteRendu = $cr;
			$this->interesse = $interesse;
			$this->estPresent = $present;
		    $this->commentaire = $commentaire;
		    $this->numEditeur = $numEditeur;
		}
	}

	static public function getSuiviByNum($numSuivi) {
		$sql = "SELECT * from suivi WHERE numSuivi=:num_suivi";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_suivi" => $numSuivi,
			);
	            // On donne les valeurs et on exécute la requête
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelSuivi');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getSuiviByNum() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

	public function save() {
		$sql = "INSERT INTO suivi (datePremierContact, relanceContact, compteRendu, interesse, estPresent, commentaire, numEditeur) VALUES (:datePremierContact_tag, :relanceContact_tag, :compteRendu_tag, :interesse_tag, :estPresent_tag, :commentaire_tag, :num_Editeur)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"datePremierContact_tag" => $this->getDateSuivi(),
				"relanceContact_tag" => $this->getRelance(),
				"compteRendu_tag" => $this->getCR(),
				"interesse_tag" => $this->getInteresse(),
        "estPresent_tag" => $this->getEstPresent(),
        "commentaire_tag" => $this->getCommentaire(),
				"num_Editeur" => $this->getNumEditeur(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save /!\ )' . $e);
		}
	}

	public function deleteSuivi() {
		$sql = "DELETE FROM suivi WHERE suivi.numSuivi = :num_suivi";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"num_suivi" => $this->getNumSuivi(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method delete /!\ )');
		}
	}

	public function update($numSuivi){
		$sql = "UPDATE suivi SET suivi.datePremierContact = :datePremierContact_tag,
								   suivi.relanceContact = :relanceContact_tag,
								   suivi.compteRendu = :compteRendu_tag,
								   suivi.interesse = :interesse_tag,
								   suivi.estPresent = :estPresent_tag,
                   suivi.commentaire = :commentaire_tag,
                   suivi.numEditeur = :num_Editeur
							 WHERE suivi.numSuivi = :num_suivi";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
        "datePremierContact_tag" => $this->getDateSuivi(),
				"relanceContact_tag" => $this->getRelance(),
				"compteRendu_tag" => $this->getCR(),
				"interesse_tag" => $this->getInteresse(),
				"estPresent_tag" => $this->getEstPresent(),
				"commentaire_tag" => $this->getCommentaire(),
        "num_Editeur" => $this->getNumEditeur(),
				"num_suivi" => $numSuivi,
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update /!\ )' . $e);
		}
	}

	public static function getLastNumSuivi(){
		try {
			$rep = Model::$pdo->query('SELECT MAX(numSuivi) FROM suivi');
			$maxNum = $rep->fetch();
			return $maxNum;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllEditeurs() /!\ )');
		}
	}
}

?>

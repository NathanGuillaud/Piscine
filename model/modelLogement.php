<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelLogement {
	private $numLogement;
	private $veutLogement;
	private $aEuLogement;
	private $cbPersonnes;
    private $numEditeur;
	private $commentaire;
    
   
    
	public function getNumLogement(){
		return $this->numLogement;
	}

	public function getVeutLogement(){
		return $this->veutLogement;
	}

    public function getAEuLogement(){
		return $this->aEuLogement;
	}
    
    public function getCbPersonnes(){
        return $this->cbPersonnes;
    }

     public function getNumEditeur(){
		return $this->numEditeur;
	}
    
	public function getCommentaire(){
		return $this->villeLogement;
	}
    
    
		// un constructeur
	public function __construct($veutLogement = NULL, $aEuLogement = NULL, $cbPersonnes = NULL, $numEditeur = NULL, $commentaire = NULL) {
		if (!is_null($veutLogement) && !is_null($aEuLogement) && !is_null($cbPersonnes) && !is_null($numEditeur) && !is_null($commentaire)) {
			$this->veutLogement = $veutLogement;
			$this->aEuLogement = $aEuLogement;
			$this->cpPersonnes = $cbPersonnes;
			$this->numEditeur = $numEditeur;
			$this->commentaire = $commentaire;
		}
	}

		//methode d'affichage de tous les Logements
	static public function getLogement($numEditeur) {
		try {
			$rep = Model::$pdo->query('SELECT * from logement WHERE numEditeur=:num_editeur');
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelLogement');
			$tab_prod = $rep->fetchAll();
			return $tab_prod;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllLogements() /!\ )');
		}
	}
    
    
	public function save() {
		$sql = "INSERT INTO logement (veutLogement, aEuLogement, cbPersonnes, numEditeur commentaire) VALUES (:veutLogement_tag, :aEuLogement_tag, :cbPersonnes_tag, :numEditeur_tag, :commentaire_tag)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"veutLogement_tag" => $this->getVeutLogement(),
				"aEuLogement_tag" => $this->getAEuLogement(),
				"CbPersonnes_tag" => $this->getCbPersonnes(),
				"numEditeur_tag" => $this->getNumEditeur(),
				"commentaire_tag" => $this->getCommentaire(),
			);
			$req_prep->execute($values);

			$numLogement = Model::$pdo->lastInsertId();

		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save Logement /!\ )' . $e);
		}
	}

	public function deleteLogement($numLogement) {
		$sql = "DELETE FROM logement WHERE logement.numLogement = :num_tag";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"num_tag" => $this->getNumLogement(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method delete Logement /!\ )');
		}
	}

	public function update($numLogement){
		$sql = "UPDATE logement SET logement.veutLogement = veutLogement_tag,
								    logement.aEuLogement = :aEuLogement_tag,
								    logement.cbPersonnes = :cbPersonnes_tag,
								    logement.numEditeur = :numEditeur_tag,
								    logement.commentaire = :commentaire_tag,
							 WHERE logement.numLogement = :num_Logement";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"veutLogement_tag" => $this->getVeutLogement(),
				"aEuLogement_tag" => $this->getAEuLogement(),
				"cbPersonnes_tag" => $this->getCbPersonnes(),
				"numEditeur_tag" => $this->getNumEditeur(),
				"commentaire_tag" => $this->getCommentaire(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update Logement/!\ )');
		}
	}

}

?>

<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelLogement {
	private $numLogement;
	private $nomLogement;
	private $rueLogement;
	private $villeLogement;
	private $CPLogement;
	private $mailLogement;
    private $telLogement; 
    private $siteLogement;
	private $payeParFestival;
    
    
	public function getNumLogement(){
		return $this->numLogement;
	}

	public function getNomLogement(){
		return $this->nomLogement;
	}

    public function getRueLogement(){
		return $this->rueLogement;
	}

	public function getVilleLogement(){
		return $this->villeLogement;
	}
    
    public function getCPLogement(){
		return $this->$CPLogement;
	}
    
    public function getmailLogement(){
        return $this->$mailLogement;
    }
	
    public function getTelLogement(){
        return $this->$telLogement;
    }
    
	public function getSiteLogement(){
		return $this->siteLogement;
	}
    
    public function getPayeParFestival(){
        return $this->payeParFestival;
    }


		// un constructeur
	public function __construct($nomLogement = NULL, $rueLogement = NULL, $villeLogement = NULL, $CPLogement = NULL, $mailLogement = NULL, $siteLogement = NULL, $payeParFestival = NULL) {
		if (!is_null($nomLogement) && !is_null($rueLogement) && !is_null($villeLogement) && !is_null($CPLogement) && !is_null($mailLogement) && !is_null($telFestival) && !is_null($siteLogement) && !is_null($payeParFestival)) {
			$this->nomLogement = $nomLogement;
			$this->rueLogement = $rueLogement;
			$this->villeLogement = $villeLogement;
			$this->CPLogement = $CPlogement;
			$this->mailLogement = $mailLogement;
            $this->telLogement = $telLogement;
			$this->siteLogement = $siteLogement;
			$this->payeParFestival = $payeParFestival;
		}
	}

		//methode d'affichage de tous les Logements
	static public function getAllLogements() {
		try {
			$rep = Model::$pdo->query('SELECT * FROM logement');
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelLogement');
			$tab_prod = $rep->fetchAll();
			return $tab_prod;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllLogements() /!\ )');
		}
	}

	static public function getLogementByNum($numLogement) {
		$sql = "SELECT * from logement WHERE numLogement=:num_logement";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_logement" => $numLogement,
			);
	            // On donne les valeurs et on exécute la requête
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelLogement');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getLogementByNum() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

       
	public function save() {
		$sql = "INSERT INTO logement (nomLogement, rueLogement, villeLogement, CPLogement, mailLogement, telLogement, siteLogement, payeParLogement) VALUES (:nom_tag, :rue_tag, :ville_tag, CP_tag, mail_tag :tel_tag, :site_tag, :paye_tag)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nom_tag" => $this->getNomLogement(),
				"rue_tag" => $this->getRueLogement(),
				"ville_tag" => $this->getVilleLogement(),
				"CP_tag" => $this->getCPLogement(),
				"mail_tag" => $this->getMailLogement(),
				"tel_tag" => $this->getTelLogement(),
				"site_tag" => $this->getSiteLogement(),
				"paye_tag" => $this->getPayeParFestival(),
			);
			$req_prep->execute($values);

			$numLogement = Model::$pdo->lastInsertId();

		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save Logement /!\ )' . $e);
		}
	}

	public function deleteLogement() {
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
		$sql = "UPDATE logement SET logement.nomLogement = :nom_tag,
								    logement.rueLogement = :rue_tag,
								    logement.villeLogement = :ville_tag,
								    logement.CPLogement = :CP_tag,
								    logement.mailLogement = :mail_tag,
								    logement.telLogement = :tel_tag,
								    logement.siteLogement = :site_tag,
								    logement.payeParFestival = :paye_tag,
                                   
							 WHERE logement.numLogement = :num_Logement";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nom_tag" => $this->getNomLogement(),
				"rue_tag" => $this->getRueLogement(),
				"ville_tag" => $this->getVilleLogement(),
				"CP_tag" => $this->getCPLogement(),
				"mail_tag" => $this->getMailLogement(),
				"tel_tag" => $this->getTelLogement(),
				"site_tag" => $this->getSiteLogement(),
				"paye_tag" => $this->getPayeParFestival(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update Logement/!\ )');
		}
	}

}

?>

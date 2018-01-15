<?php
$numEditeur = $_GET['numEditeur'];
$veutLogement = $logement->getVeutLogement();
$aEuLogement = $logement->getAEuLogement();
$nbPersonnes = $logement->getNbPersonnes();
$commentaire = $logement->getCommentaire();
$editeur = ModelEditeur::getEditeurByNum($numEditeur);
$nomEditeur = $editeur->getNomEditeur();
if (isset($logement) && !empty($logement)){
    if($logement->getVeutLogement()){
        $veutLogement = "Oui";
    }else{
        $veutLogement = "Non";
    }

    if($logement->getAEuLogement()){
        $aEuLogement = "Oui";
    }else{
        $aEuLogement = "Non";
    }

    echo "<div class='infos'>



    <h2> Logement pour l'editeur" . htmlspecialchars($nomEditeur) . "</h2><br/><p>L'editeur veut-il un logement:     " . htmlspecialchars($veutLogement) . "<hr/><p> L'editeur a t'il eu son logement ? :     " . htmlspecialchars($aEuLogement) . "<hr/><p>Pour combien de personne est destiné ce logement:     " . htmlspecialchars($nbPersonnes) . " <hr/><p>Commentaires:      " . htmlspecialchars($commentaire) . "<hr/>";
    
    echo ' </br></br> <a class="edit-button" href="index.php?controller=editeur&action=update&numEditeur=' . rawurlencode($numEditeur) . '"> Modifier</a>';


    echo '<p><a class="edit-button" href="index.php?controller=editeur&action=readAllEditeur">Retour</a></p></div>';
} else {
    
    echo "Aucune informations pour le logement de cet editeur <a style='float:right' class='edit-button' href='index.php?controller=logement&action=addLogement&numEditeur=".  rawurldecode($_GET['numEditeur']) . "'/>Ajouter des informations</a>" ;
}
?>

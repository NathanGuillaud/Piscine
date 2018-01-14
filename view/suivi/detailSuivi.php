<?php
$numSuivi = $_GET['numSuivi'];
$suivi = ModelSuivi::getSuiviByNum($numSuivi);
$nomEditeur = ModelSuivi::getNomEditeurByNumSuivi($numSuivi);
$date = $suivi->getDateSuivi();
$relance = $suivi->getRelance();
$cr = $suivi->getCR();
$interesse = ($suivi->getInteresse()==1) ? "Oui" : "Non";
$present = ($suivi->getEstPresent()==1) ? "Oui" : "Non";
$facture = ($suivi->getFacture()==1) ? "Oui" : "Non";
$commentaire = $suivi->getCommentaire();

echo "<div class='infos'><h2> Suivi de l'éditeur " . htmlspecialchars($nomEditeur) . "</h2><br>";
echo "<hr/><p>Date de premier contact : " . htmlspecialchars($date) . "<br>";
echo "<hr/><p>Date de relance : " . htmlspecialchars($relance) . "<br>";
echo "<hr/><p>Date de compte-rendu : " . htmlspecialchars($cr) . "<br>";
echo "<hr/><p>L'éditeur est-il intéressé ? : " . htmlspecialchars($interesse) . "<br>";
echo "<hr/><p>L'éditeur est-il présent le jour du festival ? : " . htmlspecialchars($present) . "<br>";
echo "<hr/><p>L'éditeur a-t-il été facturé ? : " . htmlspecialchars($facture) . "<br>";
echo "<hr/><p>Commentaire : " . htmlspecialchars($commentaire) . "<br>";


echo ' </br></br> <a class="edit-button-table" href="index.php?controller=suivi&action=update&numSuivi=' . rawurlencode($numSuivi) . '"> Modifier</a>';

echo '</br><p><a class="edit-button" href="index.php?controller=suivi&action=readAllSuivis">Retour</a></p>';
?>

<?php
$numSuivi = $_GET['numSuivi'];
$suivi = ModelSuivi::getSuiviByNum($numSuivi);
$nomEditeur = ModelSuivi::getNomEditeurByNumSuivi($numSuivi);
$date = $suivi['datePremierContact'];
$relance = $suivi['relanceContact'];
$cr = $suivi['compteRendu'];
$interesse = ($suivi['interesse']==1) ? "Oui" : "Non";
$present = ($suivi['estPresent']==1) ? "Oui" : "Non";
$commentaire = $suivi['commentaire'];
if(!$suivi){
	$suivi = 0;
}

echo "Numero suivi : " . htmlspecialchars($numSuivi) . "<br>";
echo "Nom editeur : " . htmlspecialchars($nomEditeur) . "<br>";
echo "Date de premier contact : " . htmlspecialchars($date) . "<br>";
echo "Date de relance : " . htmlspecialchars($relance) . "<br>";
echo "Date de compte-rendu : " . htmlspecialchars($cr) . "<br>";
echo "L'éditeur est-il intéressé ? : " . htmlspecialchars($interesse) . "<br>";
echo "L'éditeur est-il présent le jour du festival ? : " . htmlspecialchars($present) . "<br>";
echo "Commentaire : " . htmlspecialchars($commentaire) . "<br>";

echo ' </br></br> <a href="index.php?controller=suivi&action=update&numSuivi=' . rawurlencode($numSuivi) . '"> Modifier</a>';

echo '</br><p><a href="index.php?controller=editeur&action=readAllEditeur">Retour</a></p>';
?>

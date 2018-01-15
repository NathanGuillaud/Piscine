<?php
$numZone = $_GET['idZone'];
$zone = ModelZone::getZoneById($numZone);

$libelle = $zone->getLibelleZone();
$typeJeux = ModelZone::getTypeById($numZone);
foreach($typeJeux as $key => $value) {
    $type = $value;
}
$jeux = ModelZone::getJeuxAndEditeurById($numZone);

echo "<div class='infos'><h2> Détails de la zone " . htmlspecialchars($libelle) . "</h2><br>";
echo "<hr/><p>Type de jeux : " . htmlspecialchars($type) . "<br>";
echo "<hr/>";

if(!empty($jeux)){

  echo "<table class='tab1'>
     <caption><p>Liste des jeux de la zone</p></caption>

     <tr>
         <th class='tab2'><p>Jeux</p></th>
         <th class='tab2'><p>Editeurs</p></th>
     </tr>";
     $i = 0;
     foreach($jeux as $key => $value) {
       echo "<tr>";

       $j = 0;
       foreach($jeux[$i] as $key2 => $value2) {
         echo "<td class='tab2'><p>";

         echo "$value2";

         if ($j%2 == 0){
           echo "</p></td>";
         } else {
           echo "</p></td></tr>";
         }
         $j = $j + 1;
       }
       $i = $i + 1;
     }

  echo "</table>";



} else {
  echo "<p>Pas de jeu dans cette zone.</p>";
}


/*$nomEditeur = ModelSuivi::getNomEditeurByNumSuivi($numSuivi);
$date = $suivi['datePremierContact'];
$relance = $suivi['relanceContact'];
$cr = $suivi['compteRendu'];
$interesse = ($suivi['interesse']==1) ? "Oui" : "Non";
$present = ($suivi['estPresent']==1) ? "Oui" : "Non";
$facture = ($suivi['facture']==1) ? "Oui" : "Non";
$commentaire = $suivi['commentaire'];
if(!$suivi){
	$suivi = 0;
}

echo "<div class='infos'><h2> Suivi de l'éditeur " . htmlspecialchars($nomEditeur) . "</h2><br>";
echo "<hr/><p>Date de premier contact : " . htmlspecialchars($date) . "<br>";
echo "<hr/><p>Date de relance : " . htmlspecialchars($relance) . "<br>";
echo "<hr/><p>Date de compte-rendu : " . htmlspecialchars($cr) . "<br>";
echo "<hr/><p>L'éditeur est-il intéressé ? : " . htmlspecialchars($interesse) . "<br>";
echo "<hr/><p>L'éditeur est-il présent le jour du festival ? : " . htmlspecialchars($present) . "<br>";
echo "<hr/><p>L'éditeur a-t-il été facturé ? : " . htmlspecialchars($facture) . "<br>";
echo "<hr/><p>Commentaire : " . htmlspecialchars($commentaire) . "<br>";*/


echo ' </br></br> <a class="edit-button-table" href="index.php?controller=zone&action=update&idZone=' . rawurlencode($numZone) . '"> Modifier</a>';

echo '</br><p><a class="edit-button" href="index.php?controller=zone&action=readZones">Retour</a></p>';
?>

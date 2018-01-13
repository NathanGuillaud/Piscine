<?php
$numReservation = $_GET['numReservation'];
$reservation = ModelReservation::getReservationByNum($numReservation);

$nomEditeur = ModelReservation::getNomEditeurByNumReservation($numReservation);
$paye = ($reservation['paye']==1) ? "Oui" : "Non";
$dateFacture = $reservation['dateFacture'];
$dateRelance = $reservation['dateRelance'];
$prix = $reservation['prix'];
$deplacement = ($reservation['deplacement']==1) ? "Oui" : "Non";

echo "<div class='infos'><h2> Réservation de l'éditeur " . htmlspecialchars($nomEditeur) . "</h2><br>";
echo "<hr/><p>Date de facture : " . htmlspecialchars($dateFacture) . "<br>";
echo "<hr/><p>Prix : " . htmlspecialchars($prix) . "<br>";
echo "<hr/><p>La facture a-t-elle été payée ? : " . htmlspecialchars($paye) . "<br>";
echo "<hr/><p>Date de relance : " . htmlspecialchars($dateRelance) . "<br>";
echo "<hr/><p>L'éditeur est-il présent le jour du festival ? : " . htmlspecialchars($deplacement) . "<br>";


echo ' </br></br> <a class="edit-button-table" href="index.php?controller=reservation&action=update&numReservation=' . rawurlencode($numReservation) . '"> Modifier</a>';

echo '</br><p><a class="edit-button" href="index.php?controller=reservation&action=readAllReservation">Retour</a></p>';
?>

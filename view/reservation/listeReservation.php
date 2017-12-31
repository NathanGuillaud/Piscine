<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
echo '<div class="present">';
echo "il reste " . ModelLouer::getNombrePlaceRestante(Conf::$idFestival) ." places disponilbes !<br>";
if (isset($tab_reserv) && !empty($tab_reserv)){
	echo "<br> Liste des Réservations: <br>";
	foreach ($tab_reserv as $reservation) {
		$numReservation = htmlspecialchars($reservation->getNumReservation());
		$paye = htmlspecialchars($reservation->getPaye());
		$prix = htmlspecialchars($reservation->getPrix());
		$dateFacture = htmlspecialchars($reservation->getDatefacture());
		$dateRelance = htmlspecialchars($reservation->getDateRelance());
		$deplacement = htmlspecialchars($reservation->getDeplacement());
        
        // Affichage de "paye"
        if($paye){
			$paye = "oui";
		}else{
			$paye = "non";
		}
        
        //Affichage de "deplacement"
        if($deplacement){
			$deplacement = "oui";
		}else{
			$deplacement = "non";
		}
        
		echo '<p> Numéro de reservation : ' . $numReservation . ' Payé : ' . $paye . '  Date de Facture : ' . $dateFacture . 'Date de Relance : ' . $dateRelance . ' Montant reservation : ' . $prix . '€ Deplacement ? : ' . $deplacement;
        
        echo '<a href="index.php?controller=reservation&action=delete&numReservation=' . rawurlencode($numReservation) . '"> Supprimer </a> ';
	}
}else{
	echo"<br>Vous n'avez aucune reservation";
}
?>
<br>
<a href="index.php?controller=reservation&action=addReservation">Ajouter une reservation </a>
<?php echo '</div>'?>
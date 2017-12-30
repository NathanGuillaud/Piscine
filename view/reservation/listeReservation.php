<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="present">';
if (isset($tab_edit) && isset($tab_edit[0])){
	echo "<br> Liste des Reservations: <br>";
	foreach ($tab_edit as $reservation) {
		$numReservation = htmlspecialchars($reservation->getNumReservation());
		$paye = htmlspecialchars($reservation->getPaye());
		$dateFacture = htmlspecialchars($reservation->getDatefacture());
		$dateRelance = htmlspecialchars($reservation->getDateRelance());
		deplacement = htmlspecialchars($reservation->getDeplacement());
        
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
        
		echo '<p> Numéro de reservation : ' . $numReservation . ' Payé : ' . $paye . '  Date de Facture : ' . $dateFacture . 'Date de Relance : ' . $dateRelance . ' Montant reservation : ' . $prix . ' Deplacement ? : ' . $deplacement . '<a href="index.php?controller=reservation&action=readReservation&numReservation=' . rawurlencode($numReservation) . '"> Details</a>  </p>';
        
        echo '<a href="index.php?controller=reservation&action=delete&numReservation=' . rawurlencode($numReservation) . '"> Supprimer </a> '
	};
}else{
	echo"Vous n'avez aucune reservations";
}
?>
<br>
<a href="index.php?controller=reservation&action=addReservation">Ajouter une reservation </a>
<?php echo '</div>'?>
<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
echo '<div class="infos">';
echo "il reste " . ModelLouer::getNombrePlaceRestante(Conf::$idFestival) ." places disponilbes !<br>";
if (isset($tab_reserv) && !empty($tab_reserv)){
	echo "<table class='liste'>
  <caption>Réservations</caption>
  <thead>
        <tr>
            <th scope='col'>Paye</th>
            <th scope='col'>Date reclamation</th>
            <th scope='col'>Date relance</th>
            <th scope='col'>Prix</th>
            <th scope='col'>Deplacement</th>
            <th scope='col'>Suppression</th>
        </tr>
    </thead>

    <tbody>";
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

		echo "<tr>
                <td data-label='paye'> " . $paye . "</td><td data-label='dateFacture'>  " . $dateFacture . " </td>

                <td data-label='dateRelance'> " . $dateRelance . "</td><td> " . $prix . "€ </td><td data-label='deplacement'>" . $deplacement . "</td>";

        echo "<td data-label='delete'><a class='edit-button-suppr' href='index.php?controller=reservation&action=delete&numReservation=" . rawurlencode($numReservation) . "'> Supprimer </a></td></tr> ";
	}
}else{
	echo"<br>Vous n'avez aucune reservation";
}
?>
<br>
<a href="index.php?controller=reservation&action=addReservation">Ajouter une reservation </a>
<?php echo '</div>'?>

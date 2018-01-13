<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
echo '<div class="infos">';
?>
<a class="edit-button" href="index.php?controller=reservation&action=addReservation">Ajouter une reservation </a>
<?php
echo "il reste " . ModelLouer::getNombrePlaceRestante(Conf::$idFestival) ." places disponilbes !<br>";
if (isset($tab_reserv) && !empty($tab_reserv)){
	echo "<table class='liste'>
  <caption>Réservations</caption>
  <thead>
        <tr>
						<th scope='col'>Nom Editeur</th>
						<th scope='col'>Prix</th>
						<th scope='col'>Nombre de Tables</th>
            <th scope='col'>Date Reservation</th>
            <th scope='col'>Date Relance</th>
            <th scope='col'>Paye</th>
            <th scope='col'>Deplacement</th>
						<th scope='col'>Modification</th>
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
		$numEditeur = htmlspecialchars($reservation->getNumEditeur());
		$editeur = ModelEditeur::getEditeurByNum($numEditeur);
		$nomEditeur = htmlspecialchars($editeur->getNomEditeur());
		$nbTable = ModelLouer::getAllTableByReservation($numReservation);

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
                <td data-label='nomEditeur'> " . $nomEditeur . "</td>
								<td data-label='prix'> " . $prix . "€ </td>
								<td data-label='nbTable'> " . $nbTable . "</td>
								<td data-label='dateFacture'>  " . $dateFacture . " </td>
                <td data-label='dateRelance'> " . $dateRelance . "</td>
								<td data-label='paye'> " . $paye . "</td>
								<td data-label='deplacement'>" . $deplacement . "</td>

								<td data-label='modif'><a class='edit-button-table' href='index.php?controller=reservation&action=readReservation&numReservation=" . rawurlencode($numReservation) . "'> Modifier</a> </p></td>
								<td data-label='delete'><a class='edit-button-suppr' href='index.php?controller=reservation&action=delete&numReservation=" . rawurlencode($numReservation) . "'> Supprimer </a></td></tr>";

	}
}else{
	echo"<br>Vous n'avez aucune reservation";
}
?>
<br>

<?php echo '</div>'?>

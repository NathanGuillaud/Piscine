<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
echo '<div class="infos">';
?>
<a class="edit-button" href="index.php?controller=reservation&action=addReservation">Ajouter une reservation </a>
<?php
echo "<br/><p>Il reste " . ModelLouer::getNombrePlaceRestante($_SESSION['idFestival']) ." places disponibles !</p><br>";
if (isset($tab_reserv) && !empty($tab_reserv)){
	echo "
    <div class='table-container' id='table'>
    <table class='liste'>
  <caption>Réservations</caption>
  <thead>
        <tr>
						<th scope='col' onclick='sortTable(0)'>Nom Editeur</th>
						<th scope='col' onclick='sortTable(1)'>Prix</th>
						<th scope='col' onclick='sortTable(2)'>Nombre de Tables</th>
            <th scope='col' onclick='sortTable(3)'>Date Reservation</th>
            <th scope='col' onclick='sortTable(4)'>Date Relance</th>
            <th scope='col' onclick='sortTable(5)'>Paye</th>
            <th scope='col' onclick='sortTable(6)'>Deplacement</th>
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
echo'</div>';
	}
}else{
	echo"<br>Vous n'avez aucune reservation";
}
?>
<br>

<?php echo '</div>'?>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("table");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
    
</script>

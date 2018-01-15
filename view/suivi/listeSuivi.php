<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="infos">';
if (isset($tab_suivi) && isset($tab_suivi[0])){
	echo "<table class='liste' id='table'>
  <caption>Suivis des éditeurs</caption>
  <thead>
        <tr>
            <th onclick='sortTable(0)' scope='col'> Nom Editeur</th>
						<th  onclick='sortTable(1)' scope='col'> Intéressé</th>
            <th  onclick='sortTable(2)' scope='col'> Présent</th>
						<th  onclick='sortTable(3)' scope='col'> Facture</th>
            <th onclick='sortTable(4)' scope='col'> Date suivi</th>
            <th onclick='sortTable(5)' scope='col'> Relance</th>
            <th scope='col'>Modification</th>
        </tr>
    </thead>

    <tbody>";

	foreach ($tab_suivi as $suivi) {
		$numSuivi = htmlspecialchars($suivi->getNumSuivi());
        $numEditeur = htmlspecialchars($suivi->getNumEditeur());
		$dateSuivi = htmlspecialchars($suivi->getDateSuivi());
        $interesse = htmlspecialchars($suivi->getInteresse());
        $estPresent = htmlspecialchars($suivi->getEstPresent());
        $nomEditeur = ModelSuivi::getNomEditeurByNumSuivi($numSuivi);
        $dateRelance = htmlspecialchars($suivi->getRelance());
		$facture = htmlspecialchars($suivi->getFacture());

        if($interesse == 1){
			$interesse = "Oui";
		}else{
			$interesse = "Non" ;
		}

        if($estPresent == 1){
			$estPresent = "Oui";
		}else{
			$estPresent = "Non" ;
		}

		if($facture == 1){
	$facture = "Oui";
}else{
	$facture = "Non" ;
}

		echo "<tr>
                <td data-label='nomEdit'> " . $nomEditeur ."</td>

								<td data-label='interesse'>" . $interesse . "</td>

                <td data-label='present'> " . $estPresent ."</td>

								<td data-label='present'> " . $facture ."</td>

                <td data-label='dateSuivi'> " . $dateSuivi . "</td>

                <td data-label='dateSuivi'>". $dateRelance . "</td>

                <td data-label='modif'>
                    <a class='edit-button-table' href='index.php?controller=suivi&action=readSuivi&numSuivi=" . rawurlencode($numSuivi) . "'> Détails</a> </p></td>
                </tr>

                ";
	};

    echo"</tbody></table>";
}else{
	echo"<h2>Aucun suivi n'a été enregistré pour le moment...</h2> ";
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

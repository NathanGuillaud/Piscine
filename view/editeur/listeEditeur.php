<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="infos">';
if (isset($tab_edit) && isset($tab_edit[0])){
	echo "<table class='liste' id='table'>
  <caption>Liste des editeurs</caption>
  <p>(Cliquez sur le titre d'une colonne pour trier)</p>
  <thead>
        <tr>
            <th  onclick='sortTable(0)' scope='col'>Numéro d'éditeur</th>
            <th onclick='sortTable(1)' scope='col'>Nom Editeur</th>
            <th onclick='sortTable(2)' scope='col'>Nombre de jeux</th>
            <th scope='col'>Suivi</th>
            <th scope='col'>Reservation</th>
            <th scope='col'>Infos</th>
        </tr>
    </thead>
    
    <tbody>";
	foreach ($tab_edit as $editeur) {
		$numEditeur = htmlspecialchars($editeur->getNumEditeur());
		$nomEditeur = htmlspecialchars($editeur->getNomEditeur());
		$nbrjeux = ModelAvoir::getAllJeuxByEditeur($numEditeur);
        $numSuivi = ModelSuivi::getNumSuiviByNumEditeur($numEditeur);
		if(!$nbrjeux){
			$nbrjeux = 0;
		}else{
			$nbrjeux = count($nbrjeux);
		}
		echo "<tr>
                <td data-label='numEdit'>" . $numEditeur . "</td>
                
                <td data-label='nomEdit'> " . $nomEditeur . " </td>
                
                <td data-label='nbrJeux'> " . $nbrjeux ."</td>
                
                <td><p><a class='edit-button-table' href='index.php?controller=suivi&action=readSuivi&numSuivi=" . rawurlencode($numSuivi) . "'> Suivi</a> </p></td>
                
                <td><p><a class='edit-button-table' href='index.php?controller=editeur&action=readEditeur&numEditeur=" . rawurlencode($numEditeur) . "'>Reservation</a></p></td>
                
                <td><p><a class='edit-button-table' href='index.php?controller=editeur&action=readEditeur&numEditeur=" . rawurlencode($numEditeur) . "'>+</a></p></td>
                
                </tr>";
	};
    
    echo"</tbody>
         </table>";
}else{
	echo"Vous n'avez pas d'éditeur :( ";
}
?>
<br>
<a class='edit-button' href="index.php?controller=editeur&action=addEditeur">Ajouter un editeur</a>
<?php echo '</div>'
?>

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
}
<?php if (isset($error)): ?>
    <p class="error">
        <?php echo $error; ?>
    </p>
<?php endif;

echo '<div class="infos">';
?>
<a style="float:right" class='edit-button' href="index.php?controller=jeux&action=addJeux&numEditeur=<?php echo rawurldecode($_GET['numEditeur']); ?>">Ajouter un jeu</a>
<a class='edit-button' href="index.php?controller=editeur&action=readEditeur&numEditeur=<?php echo rawurldecode($_GET['numEditeur']); ?>">Retour</a>
<?php
if (isset($tab_jeux) && !empty($tab_jeux)){
    echo "<table class='liste' id='table'>
  <caption>Jeux</caption>
  <p>(Cliquez sur le titre d'une colonne pour trier)</p>
  <thead>
        <tr>
            <th onclick='sortTable(1)' scope='col'>Nom Jeu</th>
            <th onclick='sortTable(1)' scope='col'>Prototype</th>
            <th onclick='sortTable(1)' scope='col'>Surdimensionné</th>
            <th onclick='sortTable(1)' scope='col'>Frais payés</th>
            <th onclick='sortTable(1)' scope='col'>Type de jeu</th>
            <th onclick='sortTable(1)' scope='col'>Nombre d'exemplaires</th>
            <th scope='col'>Modification</th>
						<th scope='col'>Suppression</th>
    </thead>

    <tbody>";
    $cpt = 0;
    foreach ($tab_jeux as $jeux) {
        $numJeu = htmlspecialchars($jeux->getNumJeu());
        $libelleJeu = htmlspecialchars($jeux->getLibelleJeu());
        if($jeux->getEstPrototype()){
            $prototype = "Oui";
        }else{
            $prototype = "Non";
        }

        if($jeux->getEstSurdim()){
            $surdi = "Oui";
        }else{
            $surdi = "Non";
        }

        if($jeux->getPayerFrais()){
            $payer = "Oui";
        }else{
            $payer = "Non";
        }

        foreach ($listeType as $type) {
            if($type->getNumType() == $jeux->getNumType()){
                $type = $type->getLibelleType();
                break;
            }
        }

        $numType = htmlspecialchars($jeux->getNumType());
        $typeJeu = ModelType ::getLibelleTypeByNumType($numType);
        $nbExemplaire = $tab_avoir[$cpt]->getNbExemplaire();
        echo "<tr>
                <td data-label='nomJeu'> " . $libelleJeu . " </td>

                <td data-label='estPrototype'> " . $prototype ."</td>
                
                <td data-label='estSurdim'> " . $surdi ."</td>
                
                <td data-label='payerFrais'> " . $payer ."</td>
                
                <td data-label='typeJeu'> " . $typeJeu ."</td>
                
                <td data-label='typeJeu'> " . $nbExemplaire."</td>

                <td><p><a class='edit-button-table' href=index.php?controller=jeux&action=update&numEditeur=" . rawurldecode($_GET['numEditeur']) .'&numJeu=' . rawurlencode($jeux->getNumJeu()) . "> Modifier</a></p></td>

				<td><p><a class='edit-button-suppr' href='index.php?controller=jeux&action=delete&numJeu=" . rawurlencode($numJeu) . "'>Supprimer</a></p></td>

                </tr>";
    };

    echo"</tbody>
         </table>";
}else{
    echo"Aucun jeux pour l'instant";
}
?>
<br>

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

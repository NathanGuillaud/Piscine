<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="infos">';
if (isset($tab_zone) && !empty($tab_zone)){
	echo "<table class='liste'>
  <caption>Zones</caption>
  <thead>
        <tr>
            <th scope='col'>Nom de la zone</th>
            <th scope='col'>Type Zone</th>
            <th scope='col'>Modification</th>
            <th scope='col'>Suppression</th>
        </tr>
    </thead>

    <tbody>";

	foreach ($tab_zone as $zone) {
		foreach ($listeType as $type) {
			if($type->getNumType() == ModelConcerner::getTypeZone($zone->getIdZone())->getNumType()){
				$type = $type->getLibelleType();
				break;
			}
		}
		$idZone = htmlspecialchars($zone->getIdZone());
		$libelleZone = htmlspecialchars($zone->getLibelleZone());
		echo "<tr>
                <td data-label='libelleZone'> " . $libelleZone . " </td><td data-label='typeZone'> " . $type;
		echo "</td><td data-label='modif'><a class='edit-button-table' href='index.php?controller=zone&action=update&idZone=". rawurldecode($idZone) . "'> Modifier</a> </td>

        <td data-label='nbrJeux'><a class='edit-button-suppr' href='index.php?controller=zone&action=delete&idZone=" . rawurlencode($idZone) . "'> Supprimer</a></p>

        </tr>
        ";
	}
    echo "</tbody></table>";
}else{
	echo"Vous n'avez pas de zones ";
}
?>
<br>
<a class="edit-button" href="index.php?controller=zone&action=addZone">Ajouter une zone</a>
<?php echo '</div>'?>

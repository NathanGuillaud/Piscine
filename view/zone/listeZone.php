<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="present">';
if (isset($tab_zone) && isset($tab_zone[0])){
	echo "<br> Liste des zones: <br>";
	foreach ($tab_zone as $zone) {
		foreach ($listeType as $type) {
			if($type->getNumType() == ModelConcerner::getTypeZone($zone->getIdZone())->getNumType()){
				$type = $type->getLibelleType();
				break;
			}
		}
		$idZone = htmlspecialchars($zone->getIdZone());
		$libelleZone = htmlspecialchars($zone->getLibelleZone());
		echo '<p> IdZone: ' . $idZone . ' Libellé de la Zone : ' . $libelleZone . ' Type zone: ' . $type;
		echo '<a href="index.php?controller=zone&action=update&idZone='. rawurldecode($idZone) . '"> Modifier</a> <a href="index.php?controller=zone&action=delete&idZone=' . rawurlencode($idZone) . '"> Supprimer</a></p>';
	}
}else{
	echo"Vous n'avez pas de zones ";
}
?>
<br>
<a href="index.php?controller=zone&action=addZone">Ajouter une zone</a>
<?php echo '</div>'?>
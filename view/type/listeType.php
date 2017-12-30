<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="present">';
if (isset($tab_type) && isset($tab_type[0])){
	echo "<br> Liste des types de jeux: <br>";
	foreach ($tab_type as $type) {
		$numType = htmlspecialchars($type->getNumType());
		$libelleType = htmlspecialchars($type->getLibelleType());
		echo '<p> N°Type: ' . $numType . ' Libelle type: ' . $libelleType . '<a href=index.php?controller=type&action=update&numType=' . rawurlencode($numType) . '> Modifier</a> '. '<a href=index.php?controller=type&action=delete&numType=' . rawurlencode($numType) . '> Supprimer</a>'. '</p>';
	};
}else{
	echo"Vous n'avez pas de type de jeux :( ";
}
?>
<br>
<a href="index.php?controller=type&action=addType">Ajouter un type</a>
<?php 

echo '<br><a href=index.php?controller=editeur&action=readAllEditeur> retour </a>';


echo '</div>'?>
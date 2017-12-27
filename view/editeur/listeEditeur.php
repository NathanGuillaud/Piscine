<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
	echo '<div class="present">';
	if (isset($tab_edit) && isset($tab_edit[0])){
		echo "<br> Liste des éditeurs: <br>";
		foreach ($tab_edit as $editeur) {
			$numEditeur = htmlspecialchars($editeur->getNumEditeur());
			$nomEditeur = htmlspecialchars($editeur->getNomEditeur());
			$nbrJeux = htmlspecialchars($editeur->getNombreJeux());
			echo '<p> N°Editeur: ' . $numEditeur . ' Nom Editeur: ' . $nomEditeur . '  Nombre de jeux: ' . $nbrJeux . '<a href="index.php?controller=editeur&action=delete&numEditeur=' . rawurlencode($numEditeur) . '"> Supprimer</a>'. '<a href="index.php?controller=editeur&action=change&numEditeur=' . rawurlencode($numEditeur) . '"> Modifier </a>' . '</p>';
		};
	}else{
		echo"Vous n'avez pas d'éditeur :( ";
	}
	?>
	<br>
	<a href="index.php?controller=editeur&action=addEditeur">Ajouter un editeur</a>
	<?php echo '</div>'?>
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
		$nbrjeux = ModelAvoir::getAllJeuxByEditeur($numEditeur);
		if(!$nbrjeux){
			$nbrjeux = 0;
		}else{
			$nbrjeux = count($nbrjeux);
		}
		echo '<p> N°Editeur: ' . $numEditeur . ' Nom Editeur: ' . $nomEditeur . '  Nombre de jeux: ' . $nbrjeux .'<a href="index.php?controller=editeur&action=readEditeur&numEditeur=' . rawurlencode($numEditeur) . '"> Details</a> </p>';
	};
}else{
	echo"Vous n'avez pas d'éditeur :( ";
}
?>
<br>
<a href="index.php?controller=editeur&action=addEditeur">Ajouter un editeur</a>
<?php echo '</div>'?>
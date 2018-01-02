<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="present">';
if (isset($tab_edit) && !empty($tab_edit)){
	echo "<br> Liste des éditeurs: <br>";
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
		echo '<p> N°Editeur: ' . $numEditeur . ' Nom Editeur: ' . $nomEditeur . '  Nombre de jeux: ' . $nbrjeux .'<a href="index.php?controller=editeur&action=readEditeur&numEditeur=' . rawurlencode($numEditeur) . '"> Details</a> <a href="index.php?controller=suivi&action=readSuivi&numSuivi=' . rawurlencode($numSuivi) . '"> Suivi</a> </p>';
	};
}else{
	echo"Vous n'avez pas d'éditeur :( ";
}
?>
<br>
<a href="index.php?controller=editeur&action=addEditeur">Ajouter un editeur</a>
<?php echo '</div>'?>

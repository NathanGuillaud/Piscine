<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="present">';
if (isset($tab_jeux) && !empty($tab_jeux)){
	echo "<br> Liste des jeux: <br>";

	$cpt = 0;
	foreach ($tab_jeux as $jeux) {

		if($jeux->getEstPrototype()){
			$prototype = "oui";
		}else{
			$prototype = "non";
		}

		if($jeux->getEstSurdim()){
			$surdi = "oui";
		}else{
			$surdi = "non";
		}

		if($jeux->getPayerFrais()){
			$payer = "oui";
		}else{
			$payer = "non";
		}

		foreach ($listeType as $type) {
			if($type->getNumType() == $jeux->getNumType()){
				$type = $type->getLibelleType();
				break;
			}
		}
		$nbExemplaire = $tab_avoir[$cpt]->getNbExemplaire();
		echo '<p> N°Jeu: ' . htmlspecialchars($jeux->getNumJeu()) . ' Nom Jeu: ' . htmlspecialchars($jeux->getLibelleJeu()) . ' Prototype: ' . $prototype . ' Surdimenssioné: ' . $surdi . ' Payer frais: ' . $payer . ' Type: ' . htmlspecialchars($type) . ' Nbr Exemplaire: ' . $nbExemplaire;
		echo '<a href="index.php?controller=jeux&action=update&numEditeur='. rawurldecode($_GET['numEditeur']) .'&numJeu=' . rawurlencode($jeux->getNumJeu()) . '"> Modifier</a>';

		echo '<a href="index.php?controller=jeux&action=delete&numJeu=' . rawurlencode($jeux->getNumJeu()) . '"> supprimer</a></p>';
	};
}else{
	echo"Vous n'avez pas de jeux :( ";
}
?>
<br>
<a href="index.php?controller=jeux&action=addJeux&numEditeur=<?php echo rawurldecode($_GET['numEditeur']); ?>">Ajouter un jeu</a>

<br><a href="index.php?controller=editeur&action=readEditeur&numEditeur=<?php echo rawurldecode($_GET['numEditeur']); ?>">retour</a>


<?php echo '</div>'?>
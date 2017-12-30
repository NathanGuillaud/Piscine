<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="present">';
if (isset($tab_edit) && isset($tab_edit[0])){
	echo "<br> Liste des suivis: <br>";
	foreach ($tab_suivi as $suivi) {
		$numSuivi = htmlspecialchars($suivi->getNumSuivi());
    $numEditeur = htmlspecialchars($suivi->getNumEditeur());
		$dateSuivi = htmlspecialchars($suivi->getDateSuivi());
		echo '<p> N°Suivi : ' . $numSuivi . ' N°Editeur : ' . $numEditeur . '  Date de premier contact : ' . $dateSuivi .'<a href="index.php?controller=suivi&action=readSuivi&numSuivi=' . rawurlencode($numSuivi) . '"> Details</a> </p>';
	};
}else{
	echo"Vous n'avez pas de suivi :( ";
}
?>
<br>
<a href="index.php?controller=suivi&action=addSuivi">Ajouter un suivi</a>
<?php echo '</div>'?>

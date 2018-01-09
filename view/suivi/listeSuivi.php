<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;

echo '<div class="infos">';
if (isset($tab_suivi) && isset($tab_suivi[0])){
	echo "<table class='liste' id='table'>
  <caption>Suivis des éditeurs</caption>
  <thead>
        <tr>
            <th onclick='sortTable(0)' scope='col'> Nom Editeur</th>
						<th  onclick='sortTable(1)' scope='col'> Intéressé</th>
            <th  onclick='sortTable(2)' scope='col'> Présent</th>
            <th onclick='sortTable(3)' scope='col'> Date suivi</th>
            <th onclick='sortTable(3)' scope='col'> Relance</th>
            <th scope='col'>Modifier</th>
        </tr>
    </thead>

    <tbody>";

	foreach ($tab_suivi as $suivi) {
		$numSuivi = htmlspecialchars($suivi->getNumSuivi());
        $numEditeur = htmlspecialchars($suivi->getNumEditeur());
		$dateSuivi = htmlspecialchars($suivi->getDateSuivi());
        $interesse = htmlspecialchars($suivi->getInteresse());
        $estPresent = htmlspecialchars($suivi->getEstPresent());
        $nomEditeur = ModelSuivi::getNomEditeurByNumSuivi($numSuivi);
        $dateRelance = htmlspecialchars($suivi->getRelance());

        if($interesse == 1){
			$interesse = "Oui";
		}else{
			$interesse = "Non" ;
		}

        if($estPresent == 1){
			$estPresent = "Oui";
		}else{
			$estPresent = "Non" ;
		}

		echo "<tr>
                <td data-label='nomEdit'> " . $nomEditeur ."</td>

								<td data-label='interesse'>" . $interesse . "</td>

                <td data-label='present'> " . $estPresent ."</td>

                <td data-label='dateSuivi'> " . $dateSuivi . "</td>

                <td data-label='dateSuivi'>". $dateRelance . "</td>

                <td data-label='modif'>
                    <a class='edit-button-table' href='index.php?controller=suivi&action=readSuivi&numSuivi=" . rawurlencode($numSuivi) . "'> Modifier</a> </p></td>
                </tr>

                ";
	};

    echo"</tbody></table>";
}else{
	echo"<h2>Aucun suivi n'a été enregistré pour le moment...</h2> ";
}
?>
<br>
<?php echo '</div>'?>

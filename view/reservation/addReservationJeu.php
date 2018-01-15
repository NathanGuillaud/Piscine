<div class="infos">
<form method="post" action="index.php?controller=reservation&action=reservationJeu">
	<fieldset class="form-infos">
		<?php 
			$i = 0; foreach ($tabJeu as $jeu) {
			echo "Jeu: " . $jeu->getLibelleJeu();

			echo '<label>Envoi:
			<input type="checkbox" name="envoi['. $i .']"/></label>';

			echo'<label>Don:
			<input type="checkbox" name="don['. $i .']"/></label>';

			echo '<label>Nombre Exemplaire:
			<input type="number" name="nbExemplaire[]"/></label>';

			$i++;
			echo "<input type=hidden value=" . $jeu->getNumJeu()  ." name=numJeu[] />";
		}?>
		<input class="edit-button-save" type="submit" name="submit" value="Suivant" />
		<input type="hidden" value="<?php echo $numReservation; ?>" name="numReservation" />
	</fieldset>
</form>
<div class="none">
    <p id="prix"><?php echo($prixUnitaire)?></p>
</div>
</div>
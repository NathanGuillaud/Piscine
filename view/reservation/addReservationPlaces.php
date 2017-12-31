<?php if (isset($error)): echo $error; endif;
	  echo "il reste ". ModelLouer::getNombrePlaceRestante(Conf::$idFestival) ." places disponilbes !";
?>
<form method="post" action="index.php?controller=reservation&action=registerReservation">
	<fieldset class="form-infos">
		<?php foreach ($tabZone as $zone) {
			echo 'Zone: '. $zone->getLibelleZone() . '<label>Nombre de places :
			<input type="number" placeholder="1" name="nbPlace[]" required/></label>';
		} ?>

		<label>Jeux:
			<!-- numJeu[] = tableau car il peut y avoir plusieurs jeux sélectionnés
				 multiple="multiple" car on peut sélectionner plusieurs jeux-->
			<select name="numJeu[]" multiple="multiple" required>
				<?php
					foreach ($listeJeux as $jeux) {
		           		echo '<option value="'. htmlspecialchars($jeux->getNumJeu()). '">' . htmlspecialchars($jeux->getLibelleJeu()) .'</option>';
		           	} 
				?>
			</select>
		</label>

	    <label>La reservation est-elle payée ? (cochez si payé):
	    	<input type="CheckBox" placeholder="Oui" name="paye" /></label>

		<label>Date de la facture:
			<input type="date" placeholder="12/06/2018" name="dateFacture" required /></label>
			
		<label>Date de la relance :
			<input type="date" placeholder="23/07/2018" name="dateRelance" required/></label>

		<label>Prix en euros :
			<input type="number" placeholder="153.37" name="prix" required/></label>

		<label>L'editeur se déplace-t-il à l'évènement ? :
			<input type="checkbox" placeholder="Oui" name="deplacement"/></label>

		<?php foreach ($listeZone as $zone) {
			echo '<input type="hidden" value="'. $zone .'" name="idZone[]" required />';
		}?>
		<input type="hidden" value="<?php echo $numEditeur; ?>" name="numEditeur" required />
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Suivant" />
	</fieldset>
</form>
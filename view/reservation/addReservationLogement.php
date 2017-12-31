<?php if (isset($error)): echo $error; endif?>
<form method="post" action="index.php?controller=reservation&action=registerReservation">
	<fieldset class="form-infos">

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

		<input type="hidden" value="<?php echo $idZoneSerialize; ?>" name="idZoneSerialize" required />
		<input type="hidden" value="<?php echo $numEditeur; ?>" name="numEditeur" required />
		<input type="hidden" value="<?php echo $nbPlace; ?>" name="nbPlace" required />
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
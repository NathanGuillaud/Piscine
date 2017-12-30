<form method="post" action="index.php?controller=reservation&action=registerReservation">
	<fieldset class="form-infos">
	    <label>La reservation est-elle payée ? (cochez si payé):
	    	<input type="CheckBox" placeholder="Oui" name="paye" required /></label>

		<label>Date de la facture:
			<input type="date" placeholder="12/06/2018" name="dateFacture" required /></label>
			
		<label>Date de la relance :
			<input type="date" placeholder="23/07/2018" name="dateRelance" /></label>

		<label>Prix en euros :
			<input type="number" placeholder="153.37" name="prix"/></label>

		<label>L'editeur se déplace-t-il à l'évènement ? :
			<input type="checkbox" placeholder="Oui" name="deplacement"/></label>
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
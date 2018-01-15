<form method="post" action="index.php?controller=festival&action=registerFestival">
	<fieldset class="form-infos">
	    <label> Où aura lieux le festival ? 
	    	<input type="text"  placeholder="Corum de Montpellier" name="nomSalle" required /></label>

	    <label> Combien de tables sont mises en place (disponibles) pour ce festival ? : 
	    	<input type="number" name="nbTotalPlace" placeholder="75"  required /></label>

		<label>Prix unitaire d'une table (en euros) :
			<input type="number" name="prixUniTable" placeholder="55" required /></label>

		<label>Année :
			<input type="text" name="annee" placeholder="2018" required /></label>

    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer les informations sur le festival" />
	</fieldset>
</form>
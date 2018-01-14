<div class="infos">
    <h2>Ajout d'un logement : </h2>
<form method="post" action="index.php?controller=editeur&action=registerEditeur">
	<fieldset class="form-infos">
	    <label>Nom Logement:
	    	<input type="text" placeholder="Hotel F1" name="nomEditeur" required /></label>
        
        <label>Rue Logement:
	    	<input type="text" placeholder="Avenue Charles Flahault" name="rueLogement" required /></label>
        
        <label>Ville Logement:
	    	<input type="text" placeholder="Montpellier" name="villeLogement" required /></label>

		<label>Email:
			<input type="email" placeholder="Email" name="mailLogement" maxlengt=320 required /></label>
			
		<label>Telephone:
			<input type="text" placeholder="Telephone" name="telLogement" /></label>

		<label>Site:
			<input type="text" placeholder="Site" name="siteLogement"/></label>

		<label>Est-ce que le logement est payé par le festival:
			<input type="checkbox" placeholder="" name="payeParFestival"/></label>
        
        <input class="edit-button-save" type="submit" name="submit" value="Enregistrer" />
    </fieldset>
</form>
    </div>
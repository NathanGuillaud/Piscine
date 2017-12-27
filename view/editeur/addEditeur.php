<form method="post" action="index.php?controller=editeur&action=registerEditeur">
	<fieldset class="form-infos">
	    <label>Nom Editeur:
	    	<input type="text" placeholder="Nom" name="nomEditeur" required /></label>

		<label>Email:
			<input type="email" placeholder="Email" name="mailEditeur" maxlengt=320 required /></label>
			
		<label>Telephone:
			<input type="text" placeholder="Telephone" name="telEditeur" /></label>

		<label>Site:
			<input type="text" placeholder="Site" name="siteEditeur"/></label>

		<label>Commentaire:
			<input type="text" placeholder="commentaire" name="comEditeur"/></label>
		
		<label>Nombre de jeux:
			<input type="number" placeholder="Nombre de jeux" name="nbrJeux" required /></label>
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
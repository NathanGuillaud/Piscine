<div class="infos">
    <h2>Ajout d'un éditeur : </h2>
<form method="post" action="index.php?controller=editeur&action=registerEditeur">
	<fieldset class="form-infos">
	    <label>Nom Editeur:
	    	<input type="text" placeholder="Nom de la société" name="nomEditeur" required /></label>

		<label>Email:
			<input type="email" placeholder="Email" name="mailEditeur" maxlengt=320 required /></label>
			
		<label>Telephone:
			<input type="text" placeholder="Telephone" name="telEditeur" /></label>

		<label>Site:
			<input type="text" placeholder="Site" name="siteEditeur"/></label>

		<label>Commentaire:
			<input type="text" placeholder="commentaire" name="comEditeur"/></label>
        
        <input class="edit-button-save" type="submit" name="submit" value="Enregistrer" />
    </fieldset>
</form>
    </div>
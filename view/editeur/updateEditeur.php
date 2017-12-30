<?php $numEditeur = $editeur->getNumEditeur(); ?>
<form method="post" action="index.php?controller=editeur&action=updateEditeur&numEditeur=<?php echo $numEditeur ?> ">
	<fieldset class="form-infos">
	    <label>Nom Editeur:
	    	<input type="text" placeholder="Nom" 
			name="nomEditeur" value="<?php echo $editeur->getNomEditeur(); ?>" required /></label>

		<label>Email:
			<input type="email" placeholder="Email" name="mailEditeur" maxlengt=320 
			value="<?php echo $editeur->getMailEditeur(); ?>" required /></label>
			
		<label>Telephone:
			<input type="text" placeholder="Telephone" 
			name="telEditeur" value="<?php echo $editeur->getTelEditeur(); ?>" required /></label>

		<label>Site:
			<input type="text" placeholder="Site"
			value="<?php echo $editeur->getSiteEditeur(); ?>" name="siteEditeur"/></label>

		<label>Commentaire:
			<input type="text" placeholder="commentaire"
			value="<?php echo $editeur->getComEditeur(); ?>" name="comEditeur"/></label>
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
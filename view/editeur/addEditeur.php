<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
<?php endif;?>

<form method="post" action="index.php?controller=editeur&action=registerEditeur">
	<fieldset class="form-infos">
	    <label>Nom Editeur:
	    	<input type="text" placeholder="Nom de la société" 
			name="nomEditeur" value="<?php if (isset($values['nom_tag'])): echo $values['nom_tag']; endif;?>" required /></label>

		<label>Email:
			<input type="email" placeholder="Email" name="mailEditeur" maxlengt=320 
			value="<?php if (isset($mailEditeur)): echo $mailEditeur; endif; ?>" required /></label>
			
		<label>Telephone:
			<input type="text" placeholder="Telephone" 
			name="telEditeur" value="<?php if (isset($telEditeur)): echo $telEditeur; endif; ?>" required /></label>

		<label>Site:
			<input type="text" placeholder="Site"
			value="<?php if (isset($siteEditeur)): echo $siteEditeur; endif; ?>" name="siteEditeur"/></label>

		<label>Commentaire:
			<input type="text" placeholder="commentaire"
			value="<?php if (isset($comEditeur)): echo $comEditeur; endif; ?>" name="comEditeur"/></label>
        
		<label>Nombre de jeux:
			<input type="number" placeholder="Nombre de jeux"
			value="<?php if (isset($nbrJeux)): echo $nbrJeux; endif; ?>" name="nbrJeux" required /></label>
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
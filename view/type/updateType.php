<?php $numType = $type->getNumType(); ?>
<form method="post" action="index.php?controller=type&action=updateType&numType=<?php echo $numType ?>">
	<fieldset class="form-infos">
	    <label>Libelle type:
	    	<input type="text" placeholder="Jeu enfant" 
			name="libelleType" value="<?php echo $type->getLibelleType(); ?>" required /></label>
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
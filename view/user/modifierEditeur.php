<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
	echo '<div class="present">';
	if (isset($tab_edit) && !empty($tab_edit)){
		echo "<br> Modification de l'editeur: <br>";
        $numEditeur = htmlspecialchars($editeur->getNumEditeur());
        $nomEditeur = htmlspecialchars($editeur->getNomEditeur());
        $nbrJeux = htmlspecialchars($editeur->getNombreJeux());
        echo '<form method="post">
	<fieldset class="form-infos">
	    <label>Nom Editeur:
	    	<input type="text" placeholder="Nom" 
			name="nomEditeur" value=". <?php if (isset($nomEditeur)): echo $nomEditeur; endif;?> . " required /></label>

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
</form>';
		};
	}else{
		echo" L'editeur n'existe pas :/ ";
	}
	?>
	<br>
	<a href="index.php?controller=editeur&action=addEditeur">Mettre à jour les informations</a>
	<?php echo '</div>'?>
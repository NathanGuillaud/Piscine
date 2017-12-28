<?php $numContact = $contact->getNumContact(); 
	  $numEditeur = $contact->getNumEditeur();?>
<form method="post" action="index.php?controller=contact&action=updateContact&numContact=<?php echo $numContact ?> ">
	<fieldset class="form-infos">
	    <label>Nom Contact:
	    	<input type="text" placeholder="Nom" name="nomContact" value="<?php echo $contact->getNomContact(); ?>" required /></label>

	    <label>Prénom Contact:
	    	<input type="text" placeholder="Prénom" name="prenomContact" value="<?php echo $contact->getPrenomContact(); ?>" required /></label>

		<label>Email:
			<input type="email" placeholder="Email" name="mailContact" maxlengt=320 value="<?php echo $contact->getMailContact(); ?>" required /></label>
			
		<label>Telephone:
			<input type="text" placeholder="Telephone" name="telContact" value="<?php echo $contact->getTelContact(); ?>"/></label>

		<label>Poste:
			<input type="text" placeholder="Poste" name="poste" value="<?php echo $contact->getPoste(); ?>"/></label>

		<?php if ($contact->getEstPrivilegie() == 1){
				echo '<label>Privilegié:
				<input type="checkbox" name="estPrivilegie" checked /></label>';
			}else{
				echo '<label>Privilegié:
				<input type="checkbox" name="estPrivilegie" /></label>';
			}
		?>

		<input type="hidden" value="<?php echo $numEditeur; ?>" name="numEditeur" required />

    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
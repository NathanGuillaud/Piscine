<?php $numEditeur = htmlspecialchars($_GET['numEditeur']); ?>
<form method="post" action="index.php?controller=suivi&action=registerSuivi">
	<fieldset class="form-infos">
	    <label>Date de premier contact:
	    	<input type="text" placeholder="Date Premier Contact" name="datePremierContact" required /></label>

		<label>Date de relance du contact:
			<input type="text" placeholder="Relance" name="relanceContact" /></label>

		<label>Compte rendu:
			<input type="text" placeholder="CR" name="compteRendu" /></label>

		<label>Intéressé:
			<input type="checkbox" name="interesse" /></label>

    <label>Est Présent:
  		<input type="checkbox" name="estPresent" /></label>

    <label>Commentaire:
  		<input type="text" placeholder="Commentaire" name="commentaire" /></label>

		<label>Editeur:
			<select name="numEditeur">
	           <?php
	           		foreach ($listeEditeur as $editeur) {
	           			echo '<option value="'. htmlspecialchars($editeur->getNumEditeur()). '">' . htmlspecialchars($editeur->getNomEditeur()) .'</option>';
	           		}
	           ?>
	       	</select>
   		</label>

   		<input type="hidden" value="<?php echo $numEditeur; ?>" name="numEditeur" required />
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>

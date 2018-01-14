<?php $numEditeur = htmlspecialchars($_GET['numEditeur']); ?>
<div class="infos">
<form method="post" action="index.php?controller=jeux&action=registerJeux">
	<fieldset class="form-infos">
	    <label>Libelle Jeu:
	    	<input type="text" placeholder="Nom jeu" name="libelleJeu" required /></label>

		<label>Prototype:
			<input type="checkbox" name="estPrototype" /></label>
			
		<label>Surdimenssioné:
			<input type="checkbox" name="estSurdi" /></label>

		<label>Payer frais:
			<input type="checkbox" name="payerFrais" /></label>
	
		<label>Type jeux:
			<select name="numType">
	           <?php
	           		foreach ($listeType as $type) {
	           			echo '<option value="'. htmlspecialchars($type->getNumType()). '">' . htmlspecialchars($type->getLibelleType()) .'</option>';
	           		}
	           ?>
	       	</select>
   		</label>

   		<label>Nombre d'exemplaire:
			<input type="number" placeholder="Nombre d'exemplaire" name="nbExemplaire" required /></label>

   		<input type="hidden" value="<?php echo $numEditeur; ?>" name="numEditeur" required />
   		<input type="hidden" name="popupJS" value="true" />
        
        <input class="edit-button-save" type="submit" name="submit" value="Enregistrer" />
    </fieldset>
</form>
</div>
<div class="infos">
	<h2>Ajout d'une zone : </h2>
<form method="post" action="index.php?controller=zone&action=registerZone">
	<fieldset class="form-infos">
	    <label>Libelle Zone:
	    	<input type="text" placeholder="Zone Verte" name="libelleZone" required /></label>

		<label>Type jeux:
			<select name="numType" required>
	           <?php
	           		foreach ($listeType as $type) {
	           			echo '<option value="'. htmlspecialchars($type->getNumType()). '">' . htmlspecialchars($type->getLibelleType()) .'</option>';
	           		}
	           ?>
	       	</select>
   		</label>
		<input class="edit-button-save" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
</div>
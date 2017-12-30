<form method="post" action="index.php?controller=zone&action=updateZone">
	<fieldset class="form-infos">
	    <label> Libelle de la zone : 
	    	<input type="text"  placeholder="Zone Verte" name="libelleZone" value="<?php echo $zone->getLibelleZone(); ?>" required /></label>

        <label>Type jeux:
			<select name="numType">
	           <?php
	           		foreach ($listeType as $type) {
	           			echo '<option value="'. htmlspecialchars($type->getNumType()). '">' . htmlspecialchars($type->getLibelleType()) .'</option>';
	           		}
	           ?>
	       	</select>
   		</label>    
	</fieldset>
    
	<input type="hidden" value="<?php echo $zone->getIdZone(); ?>" name="idZone" required />

	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer modifications de la zone" />
	</fieldset>
</form>
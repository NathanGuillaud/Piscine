<?php if (isset($error)): echo $error; endif?>
<form method="post" action="index.php?controller=reservation&action=registerInterReservation">
	<fieldset class="form-infos">
		<label>Editeur:
			<select name="numEditeur">
				<?php
					foreach ($tab_edit as $editeur) {
		           		echo '<option value="'. htmlspecialchars($editeur->getNumEditeur()). '">' . htmlspecialchars($editeur->getNomEditeur()) .'</option>';
		           	} 
				?>
			</select>
		</label>

		<label>Zone:
			<!-- idZone[] = tableau car il peut y avoir plusieurs zones sélectionnés
				 multiple="multiple" car on peut sélectionner plusieurs zones-->
			<select name="idZone[]" multiple="multiple" required>
				<?php
					foreach ($tab_zone as $zone) {
		           		echo '<option value="'. htmlspecialchars($zone->getIdZone()). '">' . htmlspecialchars($zone->getLibelleZone()) .'</option>';
		           	} 
				?>
			</select>
		</label>

    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Suivant" />
	</fieldset>
</form>
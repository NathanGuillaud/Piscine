<?php if (isset($error)): echo $error; endif;
	  $listeType = ModelType::getAllType();
 ?>
<div class="infos">
	<h2>Ajout d'une réservation : </h2>
<form method="post" action="index.php?controller=reservation&action=registerInterReservation">
	<fieldset class="form-infos">
		<label>Editeur:
			<select id="editeur" name="numEditeur">
				<?php
					foreach ($tab_edit as $editeur) {
		           		echo '<option value="'. htmlspecialchars($editeur->getNumEditeur()). '">' . htmlspecialchars($editeur->getNomEditeur()) .'</option>';
		           	} 
				?>
			</select>
			<a class="edit-button" onclick="popupJeu()">Ajouter un jeu</a>
			<a class="edit-button" onclick="popupEditeur()">Ajouter un editeur</a>
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
			<a class="edit-button" onclick="popupZone()">Ajouter une zone</a>
		</label>
			<input class="edit-button-save" type="submit" name="submit" value="Suivant" />
	</fieldset>
</form>
</div>

<div id="newEditeur" style="display: none;"> <?php require_once File::buildPath(array('view', 'editeur', 'addEditeurPopup.php')); ?> </div>

<div id="newZone" style="display: none;"> <?php require_once File::buildPath(array('view', 'zone', 'addZonePopup.php')); ?> </div>

<div id="newJeu" style="display: none;"> <?php require_once File::buildPath(array('view', 'jeux', 'addJeuxPopup.php')); ?> </div>
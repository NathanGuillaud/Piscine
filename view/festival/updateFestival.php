<?php $idFestival = htmlspecialchars($_GET['idFestival']); ?>
<div class="infos">
    <h2>Modification des paramètres de festival: </h2>
<form method="post" action="index.php?controller=festival&action=updateFestival">
	<fieldset class="form-infos">
	    <label> Où aura lieux le festival ? 
	    	<input type="text"  placeholder="Corum de Montpellier" name="nomSalle" value="<?php echo $festival->getNomSalle(); ?>" required /></label>

	    <label> Combien de tables sont mises en place (disponibles) pour ce festival ? : 
	    	<input type="number" name="nbTotalPlace" placeholder="75"  value="<?php echo $festival->getNbTotalPlace(); ?>" required /></label>

		<label>Prix unitaire d'une table (en euros) :
			<input type="number" name="prixUniTable" placeholder="55" value="<?php echo $festival->getPrixUniTable(); ?>" required /></label>
			
		<input type="hidden" value="<?php echo $idFestival; ?>" name="idFestival"  required />
        
        <input class="edit-button-save" type="submit" name="submit" value="Enregistrer les informations sur le festival" />
    </fieldset>
</form>
</div>
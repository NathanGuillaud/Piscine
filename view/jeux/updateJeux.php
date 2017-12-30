<?php $numEditeur = htmlspecialchars($_GET['numEditeur']);
	  $numJeu = rawurldecode($_GET['numJeu']);
 ?>
<form method="post" action="index.php?controller=jeux&action=updateJeux&numJeu=<?php echo $numJeu; ?>">
	<fieldset class="form-infos">
	    <label>Libelle Jeu:
	    	<input type="text" placeholder="Nom jeu" name="libelleJeu" value="<?php echo $jeux->getLibelleJeu(); ?>" required /></label>

	    <?php if($jeux->getEstPrototype() == 1){
				    echo '<label>Prototype:
					<input type="checkbox" name="estPrototype" checked /></label>';
			  }else{
				  	echo '<label>Prototype:
					<input type="checkbox" name="estPrototype" /></label>';
			  }
		
			  if($jeux->getEstSurdim() == 1){
				  	echo '<label>Surdimenssioné:
				<input type="checkbox" name="estSurdi" checked/></label>';
			  }else{
				  	echo '<label>Surdimenssioné:
				<input type="checkbox" name="estSurdi" /></label>';
			  }
			
			  if($jeux->getPayerFrais() == 1){
			  		echo '<label>Payer frais:
				<input type="checkbox" name="payerFrais" checked/></label>';
			  }else{
				  	echo '<label>Payer frais:
				<input type="checkbox" name="payerFrais" /></label>';
			  }
			  ?>		
	
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
			<input type="number" value="<?php echo $avoir->getNbExemplaire(); ?>" placeholder="Nombre d'exemplaire" name="nbExemplaire" required /></label>

   		<input type="hidden" value="<?php echo $numEditeur; ?>" name="numEditeur" required />
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
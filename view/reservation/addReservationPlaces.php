<?php if (isset($error)): echo $error; endif;
	  echo "il reste ". ModelLouer::getNombrePlaceRestante(Conf::$idFestival) ." places disponilbes !";
      $prixUnitaire = ModelFestival::getPrixUnitaire(Conf::$idFestival);
		$dateCourante = new DateTime();
		$dateRelance = new DateTime("+ 2 weeks");
?>
<form method="post" action="index.php?controller=reservation&action=registerReservation">
	<fieldset class="form-infos">
		<?php foreach ($tabZone as $zone) {
			echo 'Zone: '. $zone->getLibelleZone() . '<label>Nombre de places :
			<input id="nbplace" type="number" placeholder="1" onfocusout="calcul()" name="nbPlace[]" required/></label>';
		} ?>

		<label>Jeux:
			<!-- numJeu[] = tableau car il peut y avoir plusieurs jeux sélectionnés
				 multiple="multiple" car on peut sélectionner plusieurs jeux-->
            <select name="numJeu[]" multiple="multiple" required>
				<?php
					foreach ($listeJeux as $jeux) {
		           		echo '<option value="'. htmlspecialchars($jeux->getNumJeu()). '">' . htmlspecialchars($jeux->getLibelleJeu()) .'</option>';
		           	}
				?>
			</select>
		</label>

	    <label>La reservation est-elle payée ? (cochez si payé):
	    	<input type="CheckBox" placeholder="Oui" name="paye" /></label>

		<label>Date de la facture:
			<input type="date" value="<?php echo $dateCourante->format('Y-m-d');?>" name="dateFacture" required /></label>

		<label>Date de la relance :
			<input type="date" value="<?php echo $dateRelance->format('Y-m-d');?>" name="dateRelance" required/></label>

		<label>Prix en euros :
			<input id="affiche" type="number" placeholder="20" value="<?php echo $prixUnitaire ?>" name="prix" required/></label>
        
        <button onclick="calcul()" value="refresh le prix maggle"> Nique </button>
		<label>L'editeur se déplace-t-il à l'évènement ? :
			<input type="checkbox" placeholder="Oui" name="deplacement"/></label>

		<?php foreach ($listeZone as $zone) {
			echo '<input type="hidden" value="'. $zone .'" name="idZone[]" required />';
		}?>
		<input type="hidden" value="<?php echo $numEditeur; ?>" name="numEditeur" required / >
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Suivant" />
	</fieldset>
</form>
<div class="none">
    <p id="prix"><?php echo($prixUnitaire)?></p>
</div>


<script>
    function calcul(){
        var prix = document.getElementById("prix").innerHTML;
        var nbTable = document.getElementById("nbplace").value;
        console.log(nbTable);
        document.getElementById("affiche").value = prix * nbTable;
    }
</script>
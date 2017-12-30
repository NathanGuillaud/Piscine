<?php $numReservation = htmlspecialchars($_GET['numReservation']); ?>
<form method="post" action="index.php?controller=reservation&action=updateReservation">
	   <fieldset class="form-infos">
           
	    <?php if ($reservation->getPaye() == 1){
				echo '<label>Payé :
				<input type="checkbox" name="paye" checked /></label>';
			}else{
				echo '<label>Payé :
				<input type="checkbox" name="paye" /></label>';
			}
		?>

		<label>Date de la facture:
			<input type="date" placeholder="12/06/2018" name="dateFacture" value="<?php echo $reservation->getDateReservation(); ?>" required /></label>
			
		<label>Date de la relance :
			<input type="date" placeholder="23/07/2018" name="dateRelance" value="<?php echo $reservation->getDateRelance(); ?>"/></label>

		<label>Prix en euros :
			<input type="number" placeholder="153.37" name="prix" value="<?php echo $reservation->getPrix(); ?>"/></label>

		<?php if ($reservation->getDeplacement() == 1){
				echo "<label>L'editeur se deplace-t-il a l'evenement :
				<input type='checkbox' name='deplacement' checked /></label>";
			}else{
				echo "<label>L'editeur se deplace-t-il a l'evenement :
				<input type='checkbox' name='deplacement' /></label>";
			}
		?>
           
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>
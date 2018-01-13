<?php $numReservation = $_GET['numReservation'];
$nomEditeur = ModelReservation::getNomEditeurByNumReservation($numReservation);
$reservation = ModelReservation::getReservationByNum($numReservation);?>
<form method="post" action="index.php?controller=reservation&action=updateReservation&numReservation=<?php echo $numReservation ?>">
	   <fieldset class="form-infos">



		<label>Date de la facture:
			<input type="date" name="dateFacture" value="<?php echo $reservation['dateFacture']; ?>" required /></label>

		<label>Prix en euros :
			<input type="number" name="prix" value="<?php echo $reservation['prix']; ?>" required/></label>

		<?php if ($reservation['paye'] == 1){
			echo '<label>'. $nomEditeur .' a-t-il payé la facture ?
			<input type="checkbox" name="paye" checked /></label>';
		}else{
			echo '<label>'. $nomEditeur .' a-t-il payé la facture ?
			<input type="checkbox" name="paye" /></label>';
		}
		?>

		<label>Date de la relance :
			<input type="date" name="dateRelance" value="<?php echo $reservation['dateRelance']; ?>" required/></label>

		<?php if ($reservation['deplacement'] == 1){
				echo '<label>'. $nomEditeur .' se déplace-t-il le jour du festival ?
				<input type="checkbox" name="deplacement" checked /></label>';
			}else{
				echo '<label>'. $nomEditeur .' se déplace-t-il le jour du festival ?
				<input type="checkbox" name="deplacement"/></label>';
			}
		?>

    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>

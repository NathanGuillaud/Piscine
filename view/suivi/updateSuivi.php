<?php $numSuivi = $_GET['numSuivi']; ?>
<form method="post" action="index.php?controller=suivi&action=updateSuivi&numSuivi=<?php echo $numSuivi ?> ">
	<fieldset class="form-infos">
	    <label>Date de premier contact :
	    	<input type="text" placeholder="date premier contact"
			name="datePremierContact" value="<?php echo $suivi["datePremierContact"]; ?>" required /></label>

      <label>Date de relance :
	    	<input type="text" placeholder="date de relance"
			name="relanceContact" value="<?php echo $suivi["relanceContact"]; ?>" required /></label>

      <label>Date du compte-rendu :
	    	<input type="text" placeholder="date compte-rendu"
			name="compteRendu" value="<?php echo $suivi["compteRendu"]; ?>" required /></label>

      <?php if ($suivi["interesse"] == 1){
  				echo '<label>éditeur est-il intéressé ?
  				<input type="checkbox" name="interesse" checked /></label>';
  			}else{
  				echo '<label>éditeur est-il intéressé ?
  				<input type="checkbox" name="interesse" /></label>';
  			}
  		?>

      <?php if ($suivi["estPresent"] == 1){
  				echo '<label>éditeur est-il présent le jour du festival ?
  				<input type="checkbox" name="estPresent" checked /></label>';
  			}else{
  				echo '<label>éditeur est-il présent le jour du festival ?
  				<input type="checkbox" name="estPresent" /></label>';
  			}
  		?>

      <label>Commentaire :
	    	<input type="text" placeholder="commentaire"
			name="commentaire" value="<?php echo $suivi["commentaire"]; ?>" required /></label>

    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>

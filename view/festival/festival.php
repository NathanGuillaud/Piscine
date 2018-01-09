<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
	  echo "<br><div class='infos'> <h2> Paramètres du festival : </h2>";
	  if(!empty(ModelFestival::getFestivalById(1))){
	  		$festival = ModelFestival::getFestivalById(1);
	  		echo '<p>Salle: ' . htmlspecialchars($festival->getNomSalle()) . '</p><hr/><p> Places: ' . htmlspecialchars($festival->getnbTotalPlace()) . ' </p><hr/><p>Prix: ' . htmlspecialchars($festival->getPrixUniTable()) . '<hr/></p>' ;
	  	 	echo "<div><a  class='edit-button' href='index.php?controller=festival&action=update&idFestival=1'>Modifier les paramètres du festival</a></div>";
	  	}else{
	  		echo "<div><a href='index.php?controller=festival&action=addFestival&idFestival=1'>Ajouter un festival</a></div>";
	  	}
   
?>
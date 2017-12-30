<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
	  echo "<br><div class='present'> Bienvenue sur la page d'accueil !</div>";
	  if(!empty(ModelFestival::getFestivalById(1))){
	  		$festival = ModelFestival::getFestivalById(1);
	  		echo 'Festival en cours: <br>';
	  		echo 'Salle: ' . htmlspecialchars($festival->getNomSalle()) . ' Places: ' . htmlspecialchars($festival->getnbTotalPlace()) . ' Prix: ' . htmlspecialchars($festival->getPrixUniTable());
	  	 	echo "<div><a href='index.php?controller=festival&action=update&idFestival=1'>Modifier les paramètres du festival</a></div>";
	  	}else{
	  		echo "<div><a href='index.php?controller=festival&action=addFestival&idFestival=1'>Ajouter un festival</a></div>";
	  	}
   
?>
<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
        $tableDispo = ModelLouer::getNombrePlaceRestante(Conf::$idFestival);
	  echo "<br><div class='infos'> <h2>Données essentielles du festival de " . ModelFestival::getFestivalById($_SESSION['idFestival'])->getAnneeFestival() ." :</h2>";
      echo "<br><div class='data'><div class='bloc-infos'> <h3>Nombre de tables disponibles</h3><h3 class='c1'>" . $tableDispo ."</h3></div>
      
      <br><div class='bloc-infos'> <h3>Nombre de jeux  inscrits :</h3><h3 class='c2'> 89</h3></div>
      
      <br><div class='bloc-infos'> <h3>Nombre de tables reservées :</h3><h3 class='c3'> 133</h3></div>
      
      <br><div class='bloc-infos'> <h3>Nombre d'éditeurs présents : </h3><h3 class='c4'> 54</h3></div>
      </div>
      </div>";
	     
?>
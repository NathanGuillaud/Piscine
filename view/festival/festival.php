<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
	  echo '<br><div class="infos">
            <div class="submenu">
                <form method="post" action="index.php?controller=festival&action=changeFestival">
                <h2> Changer de festival : </h2>
                <label>Selectionnez votre edition :</label>
                <select name="idFestival">';
                
                   foreach (ModelFestival::getAllFestivals() as $festival) {
                   		if($_SESSION['idFestival'] == $festival->getIdFestival()){
                   			echo '<option value="'. htmlspecialchars($festival->getIdFestival()). '" selected>' . htmlspecialchars($festival->getAnneeFestival()) .'</option>';
                   		}else{
                   			echo '<option value="'. htmlspecialchars($festival->getIdFestival()). '">' . htmlspecialchars($festival->getAnneeFestival()) .'</option>';
                   		}	           			
	           		}
                
                echo "</select> <div><button type='submit' class='edit-button'>Ok</button>
                </form>
            </div><br>";
	  echo "<br><h2> Paramètres du festival " . ModelFestival::getFestivalById($_SESSION['idFestival'])->getAnneeFestival() . "</h2>";
	  if(!empty(ModelFestival::getFestivalById($_SESSION['idFestival']))){
	  		$festival = ModelFestival::getFestivalById($_SESSION['idFestival']);
	  		echo '<p>Salle: ' . htmlspecialchars($festival->getNomSalle()) . '</p><hr/><p> Places: ' . htmlspecialchars($festival->getnbTotalPlace()) . ' </p><hr/><p>Prix: ' . htmlspecialchars($festival->getPrixUniTable()) . '<hr/></p>' ;
	  	 	echo "<div><a  class='edit-button' href='index.php?controller=festival&action=update&idFestival=" . $_SESSION['idFestival'] ."'>Modifier les paramètres du festival</a></div>";
	  	}
	  		
	  	echo "<div><a class='edit-button' href='index.php?controller=festival&action=addFestival&idFestival=1'>Ajouter un festival</a></div>";
	  	  
?>

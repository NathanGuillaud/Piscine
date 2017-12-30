<?php
	echo "Jeu ajouté !";
	echo '<br><a href=index.php?controller=avoir&action=getJeux&numEditeur=' . rawurldecode($numEditeur) .'> retour </a>';

?>
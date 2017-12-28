<?php
	echo "Contact ajouté !";
	echo '<br><a href=index.php?controller=contact&action=readAllContact&numEditeur=' . rawurldecode($numEditeur) .'> retour </a>';

?>
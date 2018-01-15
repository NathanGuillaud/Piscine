<?php
$numEditeur = $_GET['numEditeur'];
?>
<div class="infos">
<h3>Il n'y a pas d'informations de logement pour cet editeur</h3>

<a class="edit-button" href="index.php?controller=logement&action=readLogement&numEditeur=' . rawurlencode($numEditeur) . '">Ajouter des informations</a>
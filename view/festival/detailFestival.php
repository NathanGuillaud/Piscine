<?php
echo "<br> Nom de la salle: " . htmlspecialchars($festival->getNomSalle()) . " <br>Nombre total de place pour cette édition: " . htmlspecialchars($festival->getNbTotalPlace()) . " <br> Prix unitaire pour un espace : " . htmlspecialchars($festival->getprixUniTable());

echo ' </br></br> <a href="index.php?controller=festival&action=update&idFestival="> Modifier les informations pour ce festival</a>';

echo '</br><p><a href="index.php?controller=user&action=actionConnect">Retour</a></p>';
?>
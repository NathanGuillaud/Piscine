<?php
$numEditeur = $_GET['numEditeur'];
echo "Numero editeur: " . htmlspecialchars($numEditeur) . "<br> Nom Editeur: " . htmlspecialchars($editeur->getNomEditeur()) . "<br> Mail editeur: " . htmlspecialchars($editeur->getMailEditeur()) . " <br>Telephone: " . htmlspecialchars($editeur->getTelEditeur()) . " <br>Site: " . htmlspecialchars($editeur->getSiteEditeur()) . " <br>Commentaire: " . htmlspecialchars($editeur->getComEditeur()) . " <br>Nombre de jeux: " . htmlspecialchars($editeur->getNombreJeux());
echo ' </br></br> <a href="index.php?controller=editeur&action=update&numEditeur=' . rawurlencode($numEditeur) . '"> Modifier</a>';

echo '</br><a href="index.php?controller=editeur&action=delete&numEditeur=' . rawurlencode($numEditeur) . '"> Supprimer</a>';

echo '</br><a href="index.php?controller=contact&action=readAllContact&numEditeur=' . rawurlencode($numEditeur) . '"> Voir les contacts</a>';

echo '</br><p><a href="index.php?controller=editeur&action=readAllEditeur">Retour</a></p>';
?>

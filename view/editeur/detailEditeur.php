<?php
$numEditeur = $_GET['numEditeur'];
$nbrjeux = ModelAvoir::getAllJeuxByEditeur($numEditeur);
if(!$nbrjeux){
	$nbrjeux = 0;
}else{
	$nbrjeux = count($nbrjeux);
}
echo "Numero editeur: " . htmlspecialchars($numEditeur) . "<br> Nom Editeur: " . htmlspecialchars($editeur->getNomEditeur()) . "<br> Mail editeur: " . htmlspecialchars($editeur->getMailEditeur()) . " <br>Telephone: " . htmlspecialchars($editeur->getTelEditeur()) . " <br>Site: " . htmlspecialchars($editeur->getSiteEditeur()) . " <br>Commentaire: " . htmlspecialchars($editeur->getComEditeur()) . " <br>Nombre de jeux: " . $nbrjeux;
echo ' </br></br> <a href="index.php?controller=editeur&action=update&numEditeur=' . rawurlencode($numEditeur) . '"> Modifier</a>';

echo '</br><a href="index.php?controller=editeur&action=delete&numEditeur=' . rawurlencode($numEditeur) . '"> Supprimer</a>';

echo '</br><a href="index.php?controller=contact&action=readAllContact&numEditeur=' . rawurlencode($numEditeur) . '"> Voir les contacts</a>';

echo '</br><a href="index.php?controller=avoir&action=getJeux&numEditeur=' . rawurlencode($numEditeur) . '"> Voir les jeux</a>';

echo '</br><p><a href="index.php?controller=editeur&action=readAllEditeur">Retour</a></p>';
?>

<?php
$numEditeur = $_GET['numEditeur'];
$nbrjeux = ModelAvoir::getAllJeuxByEditeur($numEditeur);
if(!$nbrjeux){
	$nbrjeux = 0;
}else{
	$nbrjeux = count($nbrjeux);
}
echo "<div class='infos'><h2> Informations sur l'editeur " . htmlspecialchars($editeur->getNomEditeur()) . "</h2><br/><p>Numero editeur:     " . htmlspecialchars($numEditeur) . "<hr/><p> Nom Editeur:     " . htmlspecialchars($editeur->getNomEditeur()) . "<hr/><p>Mail editeur:     " . htmlspecialchars($editeur->getMailEditeur()) . " <hr/><p>Telephone:      " . htmlspecialchars($editeur->getTelEditeur()) . "<hr/><p>Site:     " . htmlspecialchars($editeur->getSiteEditeur()) . " <hr/><p>Commentaire: </br></br>" . htmlspecialchars($editeur->getComEditeur()) . " <hr/><p>Nombre de jeux: " . $nbrjeux ."</p><hr/>";
echo ' </br></br> <a class="edit-button" href="index.php?controller=editeur&action=update&numEditeur=' . rawurlencode($numEditeur) . '"> Modifier</a>';

echo '<a class="edit-button-suppr" href="index.php?controller=editeur&action=delete&numEditeur=' . rawurlencode($numEditeur) . '"> Supprimer</a>';

echo '<a class="edit-button" href="index.php?controller=contact&action=readAllContact&numEditeur=' . rawurlencode($numEditeur) . '"> Voir les contacts</a>';

echo '<a class="edit-button" href="index.php?controller=logement&action=readLogement&numEditeur=' . rawurlencode($numEditeur) . '">Infos logements</a>';

echo '<a class="edit-button" href="index.php?controller=avoir&action=getJeux&numEditeur=' . rawurlencode($numEditeur) . '"> Voir les jeux</a>';

echo '<p><a class="edit-button" href="index.php?controller=editeur&action=readAllEditeur">Retour</a></p></div>';
?>

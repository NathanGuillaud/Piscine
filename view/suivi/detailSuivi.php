<?php
$numEditeur = $_GET['numEditeur'];
$suivi = ModelSuivi::getSuiviByEditeur($numEditeur);
if(!$suivi){
	$suivi = 0;
}else{
	$suivi = count($nbrjeux);
}
echo "Numero editeur : " . htmlspecialchars($numEditeur) . "<br> Nom Editeur : " . htmlspecialchars($editeur->getNomEditeur()) . "Intéressé : " . htmlspecialchars($numEditeur);
echo ' </br></br> <a href="index.php?controller=editeur&action=update&numEditeur=' . rawurlencode($numEditeur) . '"> Modifier</a>';

echo '</br><a href="index.php?controller=editeur&action=delete&numEditeur=' . rawurlencode($numEditeur) . '"> Supprimer</a>';

echo '</br><p><a href="index.php?controller=editeur&action=readAllEditeur">Retour</a></p>';
?>

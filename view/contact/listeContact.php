<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;
echo '<div class="present">';
if (isset($tab_cont) && !empty($tab_cont)){
	echo "<br> Liste des contacts: <br>";
	foreach ($tab_cont as $contact) {
		$numContact = htmlspecialchars($contact->getNumContact());
		$nomContact = htmlspecialchars($contact->getNomContact());
		$estPrivilegie = htmlspecialchars($contact->getEstPrivilegie());
		if($estPrivilegie){
			$estPrivilegie = "oui";
		}else{
			$estPrivilegie = "non";
		}
		echo '<p> N°Contact: ' . $numContact . ' Nom Contact: ' . $nomContact . '  Privilegie: ' . $estPrivilegie.'<a href="index.php?controller=contact&action=update&numContact=' . rawurlencode($numContact) . '"> Modifier</a>' .'<a href="index.php?controller=contact&action=delete&numContact=' . rawurlencode($numContact) . '"> Supprimer</a>'.'</p>';
	};
}else{
	echo"Vous n'avez pas de contact :( ";
}
?>
<br>
<a href="index.php?controller=contact&action=addContact&numEditeur=<?php echo htmlspecialchars($_GET['numEditeur']); ?> ">Ajouter un contact</a>
<?php 
echo '<br><a href=index.php?controller=editeur&action=readEditeur&numEditeur=' . rawurldecode($numEditeur) .'> retour </a>';

echo '</div>'?>
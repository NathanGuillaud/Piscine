<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>
	<?php echo $title; ?>
	</title>
	<link rel="stylesheet" href="style.css">
</head>


<body>
	<header><!-- EN TETE DE LA PAGE ! -->
		<div id="logo">
			<?php if (ModelUser::isConnected()){
						echo '<h1>Bonjour, ' . $_SESSION['login'] . '</h1>';
			}?>
		</div>
		<div id="menu">
			<nav>
				<div><a href="index.php?controller=user&action=viewConnect">Accueil</a></div>
				<?php if (ModelUser::isConnected()):?>
					<div><a href="index.php?controller=editeur&action=readAllEditeur">Liste des éditeurs</a></div>
					<div><a href="index.php?controller=type&action=readAllType">Liste type de jeux</a></div>
					<div><a href="index.php?controller=suivi&action=readAllSuivi">Liste des suivis</a></div>
					<div><a href="index.php?controller=user&action=actionDisconnect">Deconnecter</a></div>
				<?php else: ?>
					<div><a href="index.php?controller=user&action=viewRegister">Creer un compte</a></div>
					<div><a href="index.php?controller=user&action=viewConnect">Se connecter</a></div>
				<?php endif ?>
			</nav>
		</div>
	</header>
	 <?php
        $filepath = File::buildPath(array("view", $controller, "$view.php"));
        require $filepath;
     ?>
	<footer>

	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>

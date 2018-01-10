<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>
	<?php echo $title; ?>
	</title>
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/font-awesome/css/font-awesome.min.css">
</head>


<body>
	<div class="header-top">
	<header><!-- EN TETE DE LA PAGE ! -->
		<div id="logo">
			<?php if (ModelUser::isConnected()){
						echo '<h1>Bonjour, ' . $_SESSION['login'] . '</h1>';
			}?>
		</div>
		<div id="menu">
			<nav>
				<div class="menu-elem"><a href="index.php?controller=user&action=viewConnect">Accueil</a></div>
				<?php if (ModelUser::isConnected()):?>
					<div class="menu-elem"><a href="index.php?controller=editeur&action=readAllEditeur">Editeurs</a></div>
					<div class="menu-elem"><a href="index.php?controller=suivi&action=readAllSuivis">Suivis</a></div>
					<div class="menu-elem"><a href="index.php?controller=reservation&action=readAllReservation">Réservations</a></div>
					<div class="menu-elem"><a href="index.php?controller=type&action=readAllType">Types de jeux</a></div>
        	<div class="menu-elem"><a href="index.php?controller=zone&action=readZones">Zones</a></div>

                </div>

                <div class="menu-icon">
                    <div class="menu-icon"><a class="setting" href="index.php?controller=festival&action=viewFestival&idFestival=1"><i class="fa fa-cog" aria-hidden="true"></i></a></div>

					<div class="menu-icon"><a class="logout" href="index.php?controller=user&action=actionDisconnect"><i class="fa fa-sign-out" aria-hidden="true"></i></a></div>

                </div>

				<?php else: ?>
					<div class="menu-elem"><a href="index.php?controller=user&action=viewConnect">Se connecter</a></div>
					<div class="menu-elem"><a href="index.php?controller=user&action=viewRegister">Creer un compte</a></div>
				<?php endif ?>
			</nav>
		</div>
	</header>
</div>
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

<script>
$(document).ready(function() {
	   var s = $(".header-top");
	   var pos = s.position();
	   var s2 = $(".header-responsive");
	   var pos2 = s.position();

	   $(window).scroll(function() {
		   var windowpos = $(window).scrollTop();
			console.log($(window).width());
			if ($(window).width() > 767){

					   if (windowpos >= pos.top) {
						   s.addClass("stick");
					   } else {
						   s.removeClass("stick");
					   }

			} else {
							if (windowpos >= pos2.top) {
						   s2.addClass("stick2");
					   } else {
						   s2.removeClass("stick2");
					   }
			}
	  });

	});
</script>

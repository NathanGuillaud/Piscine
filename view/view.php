<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>
	<?php echo $title; ?>
	</title>
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="JS/jquery-ui/jquery-ui.css" rel="stylesheet">
	<script src="JS/jquery-ui/jquery-ui.js"></script>
</head>


<body>
	<div class="header-top">
	<header><!-- EN TETE DE LA PAGE ! -->
		<div id="logo">
			<?php if (ModelUser::isConnected()){
						echo '<h1>Bonjour, ' . $_SESSION['login'] . '</h1>';
			}?>
		</div>
        <div class="mobileHide">
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

                </div>
 
                <div class="menu-icon">
                    <img class="logo" src="logo.png" alt="" />
                    <div class="menu-icon"><a class="setting" href="index.php?controller=festival&action=viewFestival&idFestival=1"><i class="fa fa-cog" aria-hidden="true"></i></a></div>

					<div class="menu-icon"><a class="logout" href="index.php?controller=user&action=actionDisconnect"><i class="fa fa-sign-out" aria-hidden="true"></i></a></div>

                </div>

        <div class="mobileShow">
            <a href="#" class="burger-box">
                <div class="burger">
                    Menu
                </div>
            </a>
            <nav class="sliding-panel-content">
                <ul>
                    <li><a href="index.php?controller=user&action=viewConnect">Accueil</a></li>
                    <li><a href="index.php?controller=editeur&action=readAllEditeur">Editeurs</a></li>
                    <li><a href="index.php?controller=suivi&action=readAllSuivis">Suivis</a></li>
                    <li><a href="index.php?controller=reservation&action=readAllReservation">Réservations</a></li>
                    <li><a href="index.php?controller=type&action=readAllType">Types de jeux</a></li>
                    <li><a href="index.php?controller=zone&action=readZones">Zones</a></li>
                </ul>
            </nav>
            <img style="margin-left:300 px" src="logo.jpg" alt="" />

            <div class="sliding-panel-fade-screen"></div></div>

				<?php else: ?>
					<div class="menu-elem"><a href="index.php?controller=user&action=viewConnect">Se connecter</a></div>
					<div class="menu-elem"><a href="index.php?controller=user&action=viewRegister">Creer un compte</a></div>
				<?php endif ?>
        </div>
        </header>
    </div>

	 <?php
        $filepath = File::buildPath(array("view", $controller, "$view.php"));
        require $filepath;
     ?>
	<footer>

	</footer>
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
$(function() {
    $('.burger-box,.sliding-panel-fade-screen,.sliding-panel-close').on('click touchstart', function(e) {
        e.preventDefault();
        $('.burger-box').toggleClass('is-open');
        $('.sliding-panel-content,.sliding-panel-fade-screen').toggleClass('is-visible');
    });
});
</script>



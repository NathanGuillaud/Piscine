<?php
	class Usefull {
		// Retourne $txt mais crypter avec un seed compliqué à trouver
		public static function crypt($txt, $seed = '57wk4Mf4rEPTt3VuR3d5pW8dPi23Xc7h') {
			return hash('sha256', $seed . $txt);
		}
	}
?>
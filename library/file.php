<?php
	
	class File {

		// Construit un chemin relatif
		public static function buildPath($path_array) {
			$DS = DIRECTORY_SEPARATOR;
			$ROOT_FOLDER = __DIR__ . "/..";
			
			return $ROOT_FOLDER . $DS . join($DS, $path_array);
		}
	}
?>
<?php
	session_start();
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'file.php';
	require_once File::buildPath(array('library', 'conf.php'));
	require_once File::buildPath(array('library', 'credentials.php'));
	require_once File::buildPath(array('controller', 'routeur.php'));
?>
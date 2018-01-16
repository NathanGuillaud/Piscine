<?php
	require_once File::buildPath(array('controller', 'controllerUser.php'));
	require_once File::buildPath(array('controller', 'controllerEditeur.php'));
	require_once File::buildPath(array('controller', 'controllerContact.php'));
	require_once File::buildPath(array('controller', 'controllerType.php'));
	require_once File::buildPath(array('controller', 'controllerAvoir.php'));
	require_once File::buildPath(array('controller', 'controllerJeux.php'));
    require_once File::buildPath(array('controller', 'controllerFestival.php'));
	require_once File::buildPath(array('controller', 'controllerZone.php'));
	require_once File::buildPath(array('controller', 'controllerReservation.php'));
	require_once File::buildPath(array('controller', 'controllerSuivi.php'));
	//require_once File::buildPath(array('controller', 'controllerLogement.php'));

	if(!isset($_SESSION['idFestival'])){
		$_SESSION['idFestival'] = ModelFestival::getLastIdFestival();
	}

	if (isset($_GET['controller'])) {
		$controller = htmlspecialchars($_GET['controller']);
	} else {
		$controller = Conf::$defaultController;
	}
	$controller = 'controller' . ucfirst($controller);

	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = Conf::$defaultAction;
	}
	$action = htmlspecialchars($action);


	if(!class_exists($controller) || !in_array($action, get_class_methods($controller))) {
        $action = "viewConnect";
        $controller = "controllerUser";
    }

 	if(ModelUser::isConnected() && ($action == "actionConnect")){
		ControllerUser::viewConnect();
	}elseif(ModelUser::isConnected() || $action == "viewRegister" || $action == "actionConnect" || $action == "actionRegister"){
		$controller::$action();
	}else{
		ControllerUser::viewConnect();
	}
?>

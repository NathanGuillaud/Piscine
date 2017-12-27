<?php
	require_once File::buildPath(array('controller', 'controllerUser.php'));
	require_once File::buildPath(array('controller', 'controllerEditeur.php'));
	
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

	if(ModelUser::isConnected() && ($action == "viewRegister" || $action == "actionConnect")){
		ControllerUser::viewConnect();
	}elseif(ModelUser::isConnected() || $action == "viewRegister" || $action == "actionConnect" || $action == "actionRegister"){
		$controller::$action();
	}else{
		ControllerUser::viewConnect();
	}
	
?>
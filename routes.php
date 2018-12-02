<?php
function call($controller, $action, $dato) {
	require_once('controllers/' . $controller . '_controller.php');

	switch($controller) {
		case 'pages':
			$controller = new PagesController();
			break;
		case 'posts':
 			// necesitamos el modelo para después consultar a la BBDD desde el controlador
			require_once('models/post.php');
			$controller = new PostsController();
		break;
	}
	//$controller ahora es un objeto
	$controller->{ $action }($dato);
}
// agregando una entrada para el nuevo controlador y sus acciones.
$controllers = array( 	'pages' => ['home', 'error'],
						'posts' => ['index', 'show','create','insertar','modificar','update','delete']

);

if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action,$dato);
	} else {
		call('pages', 'error',null);
	}
} else {
	call('pages', 'error',null);
}
?>


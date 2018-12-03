<?php
class ArticuloController {

	public function index() {
 		// Guardamos todos los posts en una variable
		$articulo = Articulo::all();
		require_once('views/articulo/index.php');
	}

	public function show($id) {
		 // esperamos una url del tipo ?controller=posts&action=show&id=x
		 // si no nos pasan el id redirecionamos hacia la pagina de error, el id tenemos que buscarlo en la BBDD
		if (!isset($id)) {
			return call('pages', 'error',null);
		}

 		// utilizamos el id para obtener el post correspondiente
		$articulo = Articulo::find($id);
		require_once('views/articulo/show.php');
	}

	public function create(){

		require_once('views/articulo/create_articulo.php');

	}
//funcion para insertar un articulo
	public function insertar(){
		
        Articulo::insertarBD();
        call('articulo', 'index',null);


	}
//funcion para ir a la vista de modificar un articulo
	public function modificar($id){
		$articulo = Articulo::find($id);
		require_once('views/articulo/update_articulo.php');


	}
//funcion para modificar un articulo
	public function update(){
			Articulo::updateBD();
			echo("<h1> S'ha actualitzat</h1>");
			call('articulo', 'index',null);

	}	

//funcion para eliminar un articulo
	public function delete($id){
		if(Articulo::eliminarBD($id)==true){

			$articulo=Articulo::all();
			echo("<h1>S'ha eliminat</h1>");
			call('articulo', 'index',null);
		}

		else{

			$articulo=Articulo::all();
			echo("<h1>No s'ha eliminat</h1>");
			call('articulo', 'index',null);
		
		}

	}

}
?>
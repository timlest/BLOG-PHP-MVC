<?php
class PostsController {

	public function index() {
 		// Guardamos todos los posts en una variable
		$posts = Post::all();
		require_once('views/posts/index.php');
	}

	public function show($id) {
		 // esperamos una url del tipo ?controller=posts&action=show&id=x
		 // si no nos pasan el id redirecionamos hacia la pagina de error, el id tenemos que buscarlo en la BBDD
		if (!isset($id)) {
			return call('pages', 'error',null);
		}

 		// utilizamos el id para obtener el post correspondiente
		$posts = Post::find($id);
		require_once('views/posts/show.php');
	}

	public function create(){

		require_once('views/posts/create_post.php');

	}

//funcion para insertar un Post

	public function insertar(){
		
        Post::insertarBD();
        call('posts', 'index',null);


	}
//funcion para buscar el Post a modificar

	public function modificar($id){
		$posts = Post::find($id);
		require_once('views/posts/update_post.php');


	}
//funcion para Hacer el update a un Post
	public function update(){
			Post::updateBD();
			echo("<h1> S'ha actualitzat</h1>");
			call('posts', 'index',null);

	}	

//funcion para eliminar un Post
	public function delete($id){
		if(Post::eliminarBD($id)==true){

			$posts=Post::all();
			echo("<h1>S'ha eliminat</h1>");
			call('posts', 'index',null);
		}

		else{

			$posts=Post::all();
			echo("<h1>No s'ha eliminat</h1>");
			call('posts', 'index',null);
		
		}

	}

}
?>

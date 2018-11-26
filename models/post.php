<?php
class Post {
 // definimos tres atributos
 // los declaramos como públicos para acceder directamente $post->author
	public $id;
	public $titulo;
	public $author;
	public $content;
	public $image;
	public function __construct($id,$titulo, $author, $content,$image) {
		$this->id = $id;
		$this->titulo = $titulo;
		$this->author = $author;
		$this->content = $content;
		$this->image = $image;
	}
	public static function all() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM posts');

 // creamos una lista de objectos post y recorremos la respuesta de la consulta
		foreach($req->fetchAll() as $post) {
			$list[] = new Post($post['id'],$post['titulo'], $post['author'], $post['content'], $post['image']);
		}
		return $list;
	}
	public static function find($id) {
		$db = Db::getInstance();
 // nos aseguramos que $id es un entero
		$id = intval($id);
		$req = $db->prepare('SELECT * FROM posts WHERE id = :id');
 // preparamos la sentencia y reemplazamos :id con el valor de $id
		$req->execute(array('id' => $id));
		$post = $req->fetch();
		return new Post($post['id'],$post['titulo'], $post['author'], $post['content'],$post['image']);
	}

	public static function insertarBD(){
		$db = Db::getInstance();
		$req = $db->prepare('INSERT INTO posts set titulo=:titulo,author=:author, content=:content, image=:image,created=:created');

		$titulo=htmlspecialchars(strip_tags($_POST['titulo']));
		$author=htmlspecialchars(strip_tags($_POST['author']));
		$content=htmlspecialchars(strip_tags($_POST['content']));
		$image=htmlspecialchars(strip_tags($_FILES['image']["name"]));
		$image=!empty($_FILES["image"]["name"])
		? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";

		 // to get time-stamp for 'created' field
		$timestamp = date('Y-m-d H:i:s');

		$req->bindParam(":titulo", $titulo);
		$req->bindParam(":author", $author);
		$req->bindParam(":content", $content);
		$req->bindParam(":image", $image);
		$req->bindParam(":created", $timestamp);
		if($req->execute()){
			return true;
		}else{
			return false;
		}


	}
}
?>

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

public function countAll(){
 
    $query = "SELECT id FROM posts";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}

	public static function uploadPhoto($image){

		$result_message="";

    // now, if image is not empty, try to upload the image
		if($image){

        // sha1_file() function is used to make a unique file name
			$target_directory = "uploads/";
			$target_file = $target_directory . $image;
			$file_type = pathinfo($target_file, PATHINFO_EXTENSION);

        // error message is empty
			$file_upload_error_messages="";
        // make sure that file is a real image
			/*
			$check = getimagesize($_FILES["image"]["tmp_name"]);
			if($check!==false){
    // submitted file is an image
			}else{
				$file_upload_error_messages.="<div>Submitted file is not an image.</div>";
			}
*/
// make sure certain file types are allowed
			$allowed_file_types=array("jpg", "jpeg", "png", "gif");
			if(!in_array($file_type, $allowed_file_types)){
				$file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
			}

// make sure file does not exist
			if(file_exists($target_file)){
				$file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
			}

// make sure submitted file is not too large, can't be larger than 1 MB
			if($_FILES['image']['size'] > (1024000)){
				$file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
			}

// make sure the 'uploads' folder exists
// if not, create it
			if(!is_dir($target_directory)){
				mkdir($target_directory, 0777, true);
			}
// if $file_upload_error_messages is still empty
			if(empty($file_upload_error_messages)){
    // it means there are no errors, so try to upload the file
				if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        // it means photo was uploaded
				}else{
					$result_message.="<div class='alert alert-danger'>";
					$result_message.="<div>Unable to upload photo.</div>";
					$result_message.="<div>Update the record to upload photo.</div>";
					$result_message.="</div>";
				}
			}

// if $file_upload_error_messages is NOT empty
			else{
    // it means there are some errors, so show them to user
				$result_message.="<div class='alert alert-danger'>";
				$result_message.="{$file_upload_error_messages}";
				$result_message.="<div>Update the record to upload photo.</div>";
				$result_message.="</div>";
			}

		}

		return $result_message;
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
			Post::uploadPhoto($image);
			return true;


		}else{
			return false;
		}


	}
	public static function updateBD(){
		$db = Db::getInstance();



		
		$req = $db->prepare('UPDATE posts set titulo=:titulo,author=:author, content=:content, image=:image WHERE id=:id');

		$id=htmlspecialchars(strip_tags($_POST['id']));
		$titulo=htmlspecialchars(strip_tags($_POST['titulo']));
		$author=htmlspecialchars(strip_tags($_POST['author']));
		$content=htmlspecialchars(strip_tags($_POST['content']));
		$image=htmlspecialchars(strip_tags($_FILES['image']["name"]));
		if ($_FILES["image"]["name"]=="") {
			$image=$_POST['imageHiden'];
		}else{
			$image=!empty($_FILES["image"]["name"])
			? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";

		}

		

		$req->bindParam(":titulo", $titulo);
		$req->bindParam(":author", $author);
		$req->bindParam(":content", $content);
		$req->bindParam(":image", $image);
		$req->bindParam(":id", $id);
		
		if($req->execute()){
			Post::uploadPhoto($image);
			return true;


		}else{
			return false;
		}



	}

	public static function eliminarBD($id){
		$db = Db::getInstance();
		//$id=$_GET['id'];
		$req = $db->prepare('DELETE FROM posts WHERE id=:id');
		$req->bindParam(":id", $id);
		if($req->execute()){
						?><script>
			alert("Post Eliminado");
			</script>
			<?php
			return true;


		}else{

						?><script>
			alert("Post no eliminado. Algo pasa");
			</script>
			<?php
			return false;
		}
	}
}
?>

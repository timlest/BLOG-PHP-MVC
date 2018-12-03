<?php
class Articulo {
 // definimos tres atributos
 // los declaramos como públicos para acceder directamente $articulo->author
	public $id;
	public $nombre;
	public $apellido;
	public $revista;
	public $numero;

	public function __construct($id,$nombre, $apellido, $revista,$numero) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->revista = $revista;
		$this->numero = $numero;
		
	}
	public static function all() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM articulo');

 // creamos una lista de objectos post y recorremos la respuesta de la consulta
		foreach($req->fetchAll() as $articulo) {
			$list[] = new Articulo($articulo['id'],$articulo['nombre'], $articulo['apellido'], $articulo['revista'], $articulo['numero']);
		}
		return $list;
	}

	public static function find($id) {
		
		$db = Db::getInstance();
 // nos aseguramos que $id es un entero
		$id = intval($id);
		$req = $db->prepare('SELECT * FROM articulo WHERE id = :id');
 // preparamos la sentencia y reemplazamos :id con el valor de $id
		$req->execute(array('id' => $id));
		$articulo = $req->fetch();
		return new Articulo($articulo['id'],$articulo['nombre'], $articulo['apellido'], $articulo['revista'], $articulo['numero']);
	}

 // Insertamos en la BBDD un nuevi articulo

	public static function insertarBD(){
		$db = Db::getInstance();
		$req = $db->prepare('INSERT INTO articulo set nombre=:nombre,apellido=:apellido, revista=:revista, numero=:numero');

		$nombre=htmlspecialchars(strip_tags($_POST['nombre']));
		$apellido=htmlspecialchars(strip_tags($_POST['apellido']));
		$revista=htmlspecialchars(strip_tags($_POST['revista']));
		$numero=htmlspecialchars(strip_tags($_POST['numero']));
		

		$req->bindParam(":nombre", $nombre);
		$req->bindParam(":apellido", $apellido);
		$req->bindParam(":revista", $revista);
		$req->bindParam(":numero", $numero);

		if($req->execute()){
			
			return true;


		}else{
			return false;
		}


	}
// Actualizamos en la BBDD un articulo con los valores cambiados
	public static function updateBD(){
		$db = Db::getInstance();



		
		$req = $db->prepare('UPDATE articulo set nombre=:nombre,apellido=:apellido, revista=:revista, numero=:numero WHERE id=:id');

		$id=htmlspecialchars(strip_tags($_POST['id']));
		$nombre=htmlspecialchars(strip_tags($_POST['nombre']));
		$apellido=htmlspecialchars(strip_tags($_POST['apellido']));
		$revista=htmlspecialchars(strip_tags($_POST['revista']));
		$numero=htmlspecialchars(strip_tags($_POST['numero']));
		

		$req->bindParam(":nombre", $nombre);
		$req->bindParam(":apellido", $apellido);
		$req->bindParam(":revista", $revista);
		$req->bindParam(":numero", $numero);
		$req->bindParam(":id", $id);
		
		if($req->execute()){

			return true;


		}else{
			return false;
		}



	}
// Eliminamos un Articulo de la BBDD gracias a que tenemos su id
	public static function eliminarBD($id){
		$db = Db::getInstance();
		//$id=$_GET['id'];
		$req = $db->prepare('DELETE FROM articulo WHERE id=:id');
		$req->bindParam(":id", $id);
		if($req->execute()){
			?><script>
			alert("Articulo Eliminado");
			</script>
			<?php
			return true;


		}else{
						?><script>
			alert("Algo ha ido mal. No se ha eliminado");
			</script>
			<?php
			return false;
		}
	}
}
?>

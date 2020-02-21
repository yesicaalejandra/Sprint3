<?php
require_once("db.php");

class DB_SQL extends BaseDatos{
    private $db;

	public function __construct(){
        $dsn ="mysql:host=localhost;dbname=vdg;
        charset=utf8mb4;port=3306";
        $user="root";
        $pass="";

        try
        {
      	  $this->db = new PDO($dsn,$user,$pass);
      	  $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e)
        {
          echo "La conexon a la base de datos fallo:" . $e->getMessage();
        }
    }

    public function traerTodos(){
        $db=$this->db;

		$query=$db->prepare('Select * from usuarios');
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardarUsuario(Usuario $usuario){
        $db=$this->db;
		    $query = $db->prepare("Insert into usuarios values(default, :username, :email, :password)");
        $query->bindValue(":username", $usuario->getUsername());
		    $query->bindValue(":email", $usuario->getEmail());
		    $query->bindValue(":password", $usuario->getPass());

    		$id = $db->lastInsertId();
    		$usuario->setId($id);
    		$query->execute();
    		return $usuario;
    }



    public function buscarPorEmail($email){
        $db=$this->db;

		$query = $db->prepare("Select * from usuarios where email = :email");
		$query->bindValue(":email", $email);

		$query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);
    if($data){
      $usuario = new Usuario($data['username'],$data['email'],$data['password'],$data['id']);
		  return $usuario;
      }
      else {
        return NULL;
      }
    }

    public function buscarPorUsername($username){
        $db=$this->db;

        $query = $db->prepare("Select * from usuarios where username = :username");
        $query->bindValue(":username", $username);

        $query->execute();

        return $query->fetch();
    }
}
?>

<?php
require_once("db.php");
require_once("usuario.php");

class Auth{
    private $db;

    public function __construct(BaseDatos $db)
    {
      session_start();
      $this->db=$db;
    }

    public function login(Usuario $usuario){
        $_SESSION["email"]=$usuario->getEmail();
        setcookie("email",$usuario->getEmail(),time()+3600);
    }

    public function logout(){
        session_destroy();
        setcookie("email","",time()-1);
    }

    public function estaLogueado(){
      return isset($_SESSION["logueado"]);
    }

    public function recordame($email) {
      setcookie("logueado", $email, time() + 3600 * 2);
    }
    public function usuarioLogueado() {
      if (estaLogueado()) {
        $mail = $_SESSION["logueado"];
        return traerPorMail($mail);
      } else {
        return NULL;
      }
    }
    public function loginController(){
        if(isset($_COOKIE["email"])){
            $_SESSION["email"]=$_COOKIE["email"];
            return true;
        }else{
            return false;
        }
    }
}
?>

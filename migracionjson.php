<?php
require_once (clases/"db_json.php");
require_once (Clases/"db_sql.php");

$dbJson = new DBJSON();
$dbMySQL = new DBMySQL();
$usuarios=$dbJSON->traerTodos();
foreach ($usuarios as $usuario) {
  try {
    $dbMySQL->guardarUsuario($usuario);
}catch (\PDOExeption $e){
   echo $e->getMessage();
}
}

 ?>

<?php
    include_once('soporte.php');
    include_once('funciones.php');
    if($_POST) {
        // 1 - Validar
        $errores = $validador->validar($_POST);
        // 2 - Crear Usuario
        if(count($errores) == 0) {
            $usuario = new Usuario($_POST['username'],$_POST['email'],$_POST['password']);
        // 3 - Validacion del avatar
            $erroresAvatar = $usuario->guardarAvatar();
        // 4 - Merge de errores (uno los arrays de errores)
            $errores = array_merge($errores, $erroresAvatar);
        // 5 - vuelvo a validar $errores
            if(count($errores) == 0) {
        // 6 - Guardo usuario y lo mando a loguearse
                $db->guardarUsuario($usuario);
                header('Location: login.php');
                exit;
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <?php include_once('head.php'); ?>
    <body style="background-image:url(img/img6.jpg);background-size: 49%;">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 55px;">
  <a class="navbar-brand" href="index.php" style="color:white">Inicio</a>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="login.php" style="color:white">Iniciar sesion</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php" style="color:white">Registrarse</a></li>


          <li class="nav-item"><a class="nav-link" href="p-frec.php" style="color:white">Preguntas frecuentes</a></li>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="Buscar" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color:white">Buscar</button>
          </form>
      </ul>
  </div>
</nav>
        <div class="container">

        

            <?php if(isset($errores)):?>
            <ul>
            <?php foreach($errores as $error):?>
                <li class="alert alert-danger"><?=$error ?></li>
            <?php endforeach;?>
            </ul>
            <?php endif;?>


            <form class="form form-group row col-5 offset-2" style="padding-top: 55px;" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="username" value="<?=!isset($errores['username']) ? Helper::old('username') : "" ?>">
                </div>
                <div class="form-group">
                    <label for="mail">E-Mail: </label>
                    <input type="text" name="email" value="<?=!isset($errores['email']) ? Helper::old('email') : "" ?>">
                </div>
                <div class="form-group">
                     <label for="avatar">Archivo: </label>
					<input type="file" name="avatar">
                </div>
                <div class="form-group">
                    <label for="passwd">Contraseña: </label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="cpassword">Repetir Contraseña: </label>
                    <input type="password" name="cpassword">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="confirm" value="<?=!isset($errores['confirm']) ? Helper::old('confirm') : "" ?>">
                    <label for="confirm">Acepto los terminos y condiciones.</label>
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-info">Registrarme</button>
                </div>
            </form>
        </div>
    </body>
</html>

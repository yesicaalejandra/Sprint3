<?php
  include_once('soporte.php');
  //include_once('clases/auth.php');

  if($_POST) {


      // 1 - buscar usuario por mail
      $usuario = $db->buscarPorEmail($_POST['email']);
      if($usuario !== null) {
          if(password_verify($_POST['password'], $usuario->getPass()) == true) {
              $auth->login($usuario);
              header('Location:foro.php');
              // Lo derivo a su perfil y corto la ejecucion de codigo.
              exit;
          }
      }
      // SI mi controlador de login devuelve true, es porque el usuario ingresa con una cookie o con una
      // session ya iniciada en el sistema, no quiero que vea el form de login

  }
  if($auth->loginController()){
     header('Location:foro.php');
     // Lo derivo a su perfil y corto la ejecucion de codigo.
     exit;
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include_once('head.php');?>

<body style="background-image:url(img/img6.jpg);background-size: 49%;">

  <?php include_once('navbar.php') ?>


  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar Sesion</h5>

            <form  action="" class="form-signin" method="post">
              <div class="form-group">
                <label for="inputEmail">email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="email" name="email" required>

              </div>

              <div class="form-group">
                <label for="contraseña">contraseña</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="contraseña" name="password" required>

              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Enviar</button>
              <hr class="my-4">
              <a class="btn btn-lg btn-google btn-block text-uppercase" href="submit"><i class="fab fa-google mr-2"></i> olvidaste tu contraseña?</a>
              <a class="btn btn-lg btn-facebook btn-block text-uppercase" href="register.php"><i class="fab fa-facebook-f mr-2"></i>no tenes cuenta? registrate!</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="../index.html">Volver a inicio</a>
</body>
</html>

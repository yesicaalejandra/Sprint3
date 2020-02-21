<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 55px;">
  <a class="navbar-brand" href="index.php" style=color:white>Inicio</a>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if(!$auth->loginController()):
            // Aca uso el controller de login para darle dinamica a la navbar.
            // Solo muestro Login y Register a usuarios no autenticados!
        ?>
          <li class="nav-item"><a class="nav-link" href="login.php" style=color:white>Iniciar sesion</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php" style=color:white>Registrarse</a></li>
          <?php endif;?>
          <?php if(isset($_SESSION['email'])): ?>
          <li class="nav-item"><a class="nav-link" href="logout.php">Salir</a></li>
          <li class="nav-item"><a class="nav-link" href="foro.php" style=color:white>Foro</a></li>
          <?php endif;?>


          <li class="nav-item"><a class="nav-link" href="p-frec.php" style=color:white>Preguntas frecuentes</a></li>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="Buscar" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style=color:white>Buscar</button>
          </form>
      </ul>
  </div>
</nav>

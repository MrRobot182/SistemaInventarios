<?php include_once "templates/header.php"?>

    <div class="container">
      <div class="row">
        <div class="col-12 fixed-top bg-dark text-light" style="height: 30px">
          <p>Inicio de sesión</p>
        </div>
      </div>
      <div class="row" style="margin-top: 60px">
        <div class="col-8 col-md-6 col-lg-4 border rounded mt-5 bg-light mx-auto">
          <img src="img/avatar.png" class="avatar-img">
          <form action="inicioSesion.php" method="post">
            <label for="email" class="mt-5">Correo: </label><input type="email" name="email" class="form-control" required>
            <label for="pass">Contraseña: </label><input type="password" name="pass" class="form-control" required>
            <label for="captcha">Codigo de verificacion: </label><input type="text" name="captcha" class="form-control">
            <div class="float-right mt-3">
              <span class="small">Captcha: </span><img src="img/captcha-ex.png" class="captcha-img">
            </div>
            <input type="submit" name="" value="Iniciar sesión" class="btn btn-primary w-100 mt-2 mb-2">
            <a href="registro.php" class="d-flex justify-content-center small mb-3">¿No tienes cuenta? Regístrate</a>
          </form>
        </div>
      </div>
    </div>
<?php include_once "templates/scripts.php"?>

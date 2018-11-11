<?php include_once "templates/header.php"?>
    <div class="container">
      <div class="row">
        <div class="col-12 fixed-top bg-dark text-light" style="height: 30px">
          <p>Registro</p>
        </div>
      </div>
      <div class="row" style="margin-top: 60px">
        <div class="col-8 col-md-6 col-lg-4 border rounded mt-5 bg-light mx-auto">
          <img src="img/avatar.png" class="avatar-img">
          <form class="" action="#" method="post">
            <label for="nombre" class="mt-5">Nombre: </label><input type="text" id="nombre" class="form-control">
            <label for="email">Correo: </label><input type="email" id="email" class="form-control">
            <label for="pass">Contraseña: </label><input type="password" id="pass" class="form-control">
            <label for="captcha">Codigo de verificacion: </label><input type="text" id="captcha" class="form-control">
            <div class="float-right mt-3">
              <span class="small">Captcha: </span><img src="img/captcha-ex.png" class="captcha-img">
            </div>
            <input type="submit" name="" value="Registrarse" class="btn btn-primary w-100 mt-2 mb-2">
            <a href="inicioSesion.php" class="d-flex justify-content-center small mb-3">¿Ya tienes cuenta? Inicia sesión</a>
          </form>
        </div>
      </div>
    </div>
<?php include_once "templates/scripts.php"?>

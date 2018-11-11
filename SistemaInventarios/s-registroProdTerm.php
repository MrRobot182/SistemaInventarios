<?php include_once "templates/header.php"?>
    <?php include_once "templates/navbarSupervisor.php"?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Registro de producto terminado</h3>
      </div>

      <div class="row mt-4">

        <div class="col-11 mx-auto">
          <div class="rounded bg-light mx-auto p-2 mb-5">
            <form class="" action="#" method="post">
              <label class="mt-1">Nombre: </label><input type="text" class="form-control">
              <label class="mt-1">Descripción: </label><textarea class="form-control"></textarea>

              <div class="form-row">
                <div class="col">
                  <label class="mt-1">Precio: </label><input type="number" class="form-control">
                </div>
                <div class="col">
                  <input type="submit" name="" value="Registrar" class="btn btn-primary w-100" style="margin-top:36px">
                </div>
              </div>



              </form>
          </div>
        </div>


      </div>




    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>

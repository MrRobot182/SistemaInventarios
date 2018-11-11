<?php include_once "templates/header.php"?>
    <?php include_once "templates/navbarSupervisor.php"?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Registro de proveedores</h3>
      </div>

      <div class="row mt-4">

        <div class="col-10 mx-auto">
          <div class="rounded bg-light mx-auto p-2 mb-5">
            <form class="" action="#" method="post">
              <label class="mt-1">Nombre: </label><input type="text" class="form-control">
              <div class="form-row">
                <div class="col-6">
                  <label class="mt-1">Insumo que vende: </label>
                  <select class="custom-select">
                    <option value="1">Insumo A</option>
                    <option value="2">Insumo B</option>
                  </select>
                </div>
                <div class="col-3">
                  <label class="mt-1">Máximo: </label><input type="number" class="form-control">
                </div>
                <div class="col-3">
                  <label class="mt-1">Mínimo: </label><input type="number" class="form-control">
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <label class="mt-1">Precio: </label><input type="number" class="form-control">
                </div>
                <div class="col">
                  <label class="mt-1">Entrega en días: </label><input type="number" class="form-control">
                </div>
              </div>


              <input type="submit" name="" value="Registrar" class="btn btn-primary w-100 mt-4 mb-2">
              </form>
          </div>
        </div>


      </div>




    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>

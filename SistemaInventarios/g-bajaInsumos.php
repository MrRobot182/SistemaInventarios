<?php include_once "templates/header.php"?>
    <?php include_once "templates/navbarGerente.php"?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row mt-4">

        <div class="col-12 col-md-6">
          <h3>Baja de insumos</h3>
          <hr>
          <div class="rounded bg-light mx-auto p-2 mb-5">
            <form class="" action="#" method="post">
              <label class="mt-1">Tipo de insumo: </label>
              <select class="custom-select">
                <option value="1">Insumo A</option>
                <option value="2">Insumo B</option>
              </select>
              <label class="mt-2">Ubicación: </label>
              <select class="custom-select">
                <option value="1">Estante 1</option>
                <option value="2">Estante 2</option>
                <option value="3">Estante 3</option>
              </select>
              <div class="form-row">
                <div class="col">
                  <label class="mt-2">Cantidad: </label><input type="number" class="form-control" readonly value="0">
                </div>
                <div class="col">
                  <label class="mt-2">Cantidad a restar: </label><input type="number" class="form-control">
                </div>
              </div>
              <input type="submit" name="" value="Registrar" class="btn btn-primary w-100 mt-4 mb-2" data-toggle="modal" data-target="#modalAut">
              </form>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <h3>Baja de producto terminado</h3>
          <hr>
          <div class="rounded bg-light mx-auto p-2 mb-5">
            <form class="" action="#" method="post">
              <label class="mt-1">Tipo de producto: </label>
              <select class="custom-select">
                <option value="1">Producto A</option>
                <option value="2">Producto B</option>
              </select>
              <label class="mt-2">Ubicación: </label>
              <select class="custom-select">
                <option value="1">Estante 1</option>
                <option value="2">Estante 2</option>
                <option value="3">Estante 3</option>
              </select>
              <div class="form-row">
                <div class="col">
                  <label class="mt-2">Cantidad: </label><input type="number" class="form-control" readonly value="0">
                </div>
                <div class="col">
                  <label class="mt-2">Cantidad a restar: </label><input type="number" class="form-control">
                </div>
              </div>
              <input type="submit" name="" value="Registrar" class="btn btn-primary w-100 mt-4 mb-2" data-toggle="modal" data-target="#modalAut">
              </form>
          </div>
        </div>

      </div>

        <div class="modal fade" id="modalAut">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirmar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                La operación se efectuara hasta que el supervisor la autorice.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>

      </div>



    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>

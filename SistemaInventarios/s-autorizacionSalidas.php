<?php include_once "templates/header.php"?>
    <?php include_once "templates/navbarSupervisor.php"?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Autorización de salidas</h3>
      </div>

      <div class="row my-4">
        <div class="col-12 mx-auto">
          <table class="table table-hover table-responsive-md table-light rounded table-sm">
            <thead>
              <tr>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Venta</td>
                <td>Producto A</td>
                <td>X</td>
                <td>Pendiente</td>
                <td>01/01/2019</td>
                <td>
                  <form action="#" method="post">
                    <button type="submit" class="btn btn-primary btn-sm">Autorizar</button>
                  </form>
                </td>
              </tr>

              <tr>
                <td>Insumos</td>
                <td>Producto A</td>
                <td>X</td>
                <td>Completo</td>
                <td>01/01/2019</td>
                <td>-</td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>




    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>

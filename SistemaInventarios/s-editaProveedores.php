<?php include_once "templates/header.php"?>
    <?php include_once "templates/navbarSupervisor.php"?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Editar proveedores</h3>
      </div>

      <div class="row my-4">
        <div class="col-12 mx-auto">
          <table class="table table-hover table-responsive-md table-light rounded table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Max/Min</th>
                <th class="text-nowrap">Tiempo de entrega (días)</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>0000</td>
                <td>Proveedor A</td>
                <td>Tipo A</td>
                <td>$0.00</td>
                <td>0/0</td>
                <td>0</td>
                <td>
                  <form action="#" method="post">
                    <button type="submit" class="btn btn-primary btn-sm">Eliminar</button>
                    <a href="#" class="btn btn-primary btn-sm">Editar</button>
                  </form>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>




    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>

<?PHP include("seguridad.php"); ?>

<!doctype html>
<html lang="es">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Data tables CSS-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <title>Biblioteca</title>
</head>

<body>
  <div class="container my-3">
    <div class="row">
      <div class="col-6">
        <h1>Libros disponibles</h1>
      </div>
      <div class="col-6 d-flex flex-row-reverse">
        <a href="nuevo.php" class="btn btn-primary mt-2" role="button" style="height: 40px">Nuevo</a>
      </div>
    </div>
  </div>

  <?php
  require_once 'conexion.php';

  $sql = 'SELECT * FROM libros';

  $result = $con->query($sql);

  while ($libro = $result->fetch_assoc()) {
    $libros[] = $libro;
  }

  ?>


  <div class="container">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre libro</th>
          <th scope="col">Autor</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($libros as $libro) {
          echo "<tr>";
          echo "<td>{$libro['id']}</td>";
          echo "<td>{$libro['nombre_libro']}</td>";
          echo "<td>{$libro['autor']}</td>";
          echo "<td>
									<a href='editar.php?id={$libro['id']}' class='btn btn-warning'>Editar</a>
                  <a onclick='return confirm(&#39;Está seguro de eliminar el registro&#39;)' href='eliminar.php?id={$libro['id']}' class='btn btn-danger'>Eliminar</a>
								 </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Datatable Jquery function CDN, then Datatables botstrap, activation Jquery script -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('table').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
      });
    });
  </script>
</body>

</html>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Editar libro</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Editar libro</h1>
            </div>
            <div class="col-6"><a href="escritorio.php" class="btn btn-primary float-right mt-2" role="button" style="height: 40px">Volver</a></div>
        </div>
    </div>

    <?php
    require_once 'conexion.php';

    $id = $_GET['id'];

    //Condicion para operar los datos segun el metodo de entrata GET/POST

    if ($_POST) {

        // Funcion actualizarn en la base de datos
        $nombre_libro = $_POST['nombre_libro'];
        $autor = $_POST['autor'];


        $sql = "UPDATE libros SET nombre_libro = '$nombre_libro', autor = '$autor' WHERE id = $id";

        $result = $con->query($sql);

        if ($result) {
            header('location: escritorio.php');
        } else {
            echo '<div class="container mt-2">
             <div class="row">
                 <div class="col-12">
                     <div class="alert alert-danger" role="alert">
                         Error el añadair
                     </div>
                 </div>
             </div>
         </div>';
        };
    } else {

        // Muestra en los campos del formulario los datos guardados en la base de datos
        $sql = "SELECT * FROM libros WHERE id = $id";
        $result = $con->query($sql);
        $libro = $result->fetch_assoc();
    }

    ?>
    <!-- Los $libro['campo'] se encargan de selecionar las datos de la base para mostrarlos-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST">

                    <div class="form-group">
                        <label for="inputNombreLibro">Nombre del libro</label>
                        <input type="text" class="form-control" id="inputNombreLibro" name="nombre_libro" value="<?= $libro['nombre_libro'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputAutor">Autor del libro</label>
                        <input type="text" class="form-control" id="inputAutor" name="autor" value="<?= $libro['autor'] ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
</body>

</html>
<?php
require_once 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM libros WHERE id = $id";

$result = $con->query($sql);

if ($result) {
    header('location:escritorio.php');
} else {
    echo '<div class"alert alert-danger" role="alert">
            Error en la eliminacion
            </div>';
}

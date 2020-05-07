<?php
    session_start();

    $con = new mysqli('localhost', 'root', '', 'php_cor2_parcial_libros');

    $email = $_POST['email'];

    $pass = $_POST['pass'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$pass'";

    $res = $con->query($sql);



    if ($res->num_rows > 0){

        $user = $res->fetch_assoc();

        
        
        $_SESSION["acceso"] = "allow";

        $_SESSION["id"] = $user['id'];
        $_SESSION["nombre"] = $user['nombre'];
        $_SESSION["email"] = $user['email'];

        header("Location: escritorio.php");
        
    } else {


        header("Location: index.php?acceso=deny");
    }

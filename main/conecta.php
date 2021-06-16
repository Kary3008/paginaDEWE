<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $base = " ";
    $conecta = mysqli_connect($servidor,$usuario,$password,$base);//mysql conecta con el servidor, usuario
    //password y base
    if ($conecta->connect_error) {
    // si cualquiera de las variables está mal aparece el siguiente mensaje
      die('Error al conectar la Base de Datos'.$conecta->connect_error);
    }
?>

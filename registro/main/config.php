<?php
// consulta para extraer los datos de la tabla alumnos
$usuario1 = "SELECT * FROM usuario ORDER BY Id_Usuario";
$resultado1 = $conecta->query($usuario1);
// consulta para extraer los datos de la tabla carera
$genero = "SELECT * FROM genero ORDER BY Id_Genero";
$resultado2 = $conecta->query($genero);
// consulta para extraer los datos de la tabla genero
$nivel = "SELECT * FROM nivel ORDER BY Id_Nivel";
$resultado3 = $conecta->query($nivel);
// consulta para extraer los datos de la tabla grupo
$materia = "SELECT * FROM materia ORDER BY Id_Materia";
$resultado4 = $conecta->query($materia);
// consulta para extraer los datos de la tabla plantel
$estado = "SELECT * FROM estado ORDER BY Id_Estado";
$resultado5 = $conecta->query($estado);
// consulta para extraer los datos de la tabla tipo de usuario
$t_usuario = "SELECT * FROM tusuario ORDER BY Id_Tusuario";
$resultado6 = $conecta->query($t_usuario);
 ?>

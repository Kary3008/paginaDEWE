<?php
// consulta para extraer los datos de la tabla contacto
$cont = "SELECT * FROM contacto ORDER BY Id_Contacto";
$resultado6 = $conecta->query($cont);
// consulta para extraer los datos de la tabla alumnos
$usuario1 = "SELECT * FROM alumnos ORDER BY Id_Alumno";
$resultado1 = $conecta->query($usuario1);
// consulta para extraer los datos de la tabla carera
$genero = "SELECT * FROM carrera ORDER BY Id_Carrera";
$resultado2 = $conecta->query($genero);
// consulta para extraer los datos de la tabla genero
$nivel = "SELECT * FROM genero ORDER BY Id_Genero";
$resultado3 = $conecta->query($nivel);
// consulta para extraer los datos de la tabla grupo
$materia = "SELECT * FROM grupo ORDER BY Id_Grupo";
$resultado4 = $conecta->query($materia);
// consulta para extraer los datos de la tabla plantel
$estado = "SELECT * FROM semestre ORDER BY Id_Semestre";
$resultado5 = $conecta->query($estado);
 ?>

<?php
  error_reporting(0);
  include 'main/conecta.php';
  include 'main/config.php';
  // Inicia proceso de registro
  // validamos que se presione al boton registro
  if (isset($_POST['submit'])) {
    // variables de password para validarlos
    $pass = $conecta->real_escape_string($_POST['pass']);
    $cpass = $conecta->real_escape_string($_POST['cpass']);
    // verificamos si los password son diferentes
  if ($pass != $cpass) {//muestra un mensaje
    $mensaje.="<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                <strong>Password no Coinciden</strong> Por favor verifica tus password que sean iguales.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                   <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            }
      // de lo contrario recuperamos los datos de el usuario a travez de las cajas de texto por el metodo post
      else {
      // recuperamos los valores que nos da el usuario
      $nombre = $conecta->real_escape_string($_POST['nombre']);
      $email = $conecta->real_escape_string($_POST['email']);
      $apellidop = $conecta->real_escape_string($_POST['apellidoP']);
      $apellidom = $conecta->real_escape_string($_POST['apellidoM']);
      $usern = $conecta->real_escape_string($_POST['usuario']);
      $f_nac = $conecta->real_escape_string($_POST['f_nac']);
      $gen = $conecta->real_escape_string($_POST['gen']);
      $niv = $conecta->real_escape_string($_POST['niv']);
      $tipo_u = $conecta->real_escape_string($_POST['tipo_u']);
      $mat = $conecta->real_escape_string($_POST['mat']);
      $passw = md5($pass);
      $estado = "1";
    // consulta para verificar si exite un email igual dentro de la base de datos
      $nuevo = "SELECT * FROM usuario WHERE E_mail = '$email' or Usuario = '$usern'";
      $new = $conecta->query($nuevo);
    // validacion de el criterio de aceptacion
    if($new->num_rows > 0){
      $mensaje.="<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
              <strong>El usuario y/o Email ya existe</strong> El registro ya existe en la base de datos por favor <a href='principal.php'>Click para iniciar sesion</a> .
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
      }
      else {
        $reg = "INSERT INTO usuario(Nombre, Apellido_P, Apellido_M, Fech_Nac, E_mail, Usuario, Password, Id_Genero, Id_Nivel, Id_Materia, Id_Estado, Online, Id_Tusuario)
        VALUES('$nombre','$apellidop','$apellidom','$f_nac', '$email', '$usern', '$passw','$gen', '$niv','$mat','$estado', 'NULL', '$tipo_u')";
        $registro = $conecta->query($reg);

        // verificamos que el registro sea valido para mandar una alerta
        if ($registro > 0) {
            $mensaje.="<div class='alert alert-success alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
               <strong>Registro Exitoso</strong> Ya puedes iniciar sesión <a href='principal.php' class='text-muted text-decoration-none'>Click para iniciar sesion</a> .
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
               </button>
             </div>";
          }
      }
  }
}
  $conecta->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Registro | Mexiware</title>
  </head>
  <body>
    <div class="container">
      <div class="container py-2">
        <!--Inicia apartado-->
        <h2 class="text-center py-3 style-text">Registro de usuario</h2>
        <div class="container">
            <div class="card text-white">
                <img src="img/mexiware.png" class="card-img  img-slide" alt="img contacto">
                <div class="card-img-overlay">
                   <div class="container">
                      <div class="row">
                        <div class="col text-center">
                            <p class="py-2">R</p>
                        </div>
                        <div class="col">
                          <p class="text-dark text-center">Ingresa los Datos que se te solicitan</p>
                          <!--Inicia formulario-->
                            <form name="Fregistro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="registro" enctype="multipart/form-data">
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input type="text" name="apellidoP" class="form-control caja" placeholder="Apellido Paterno" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input type="text" name="apellidoM" class="form-control caja" placeholder="Apellido Materno" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input type="text" name="usuario" class="form-control caja" placeholder="Usuario" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input type="email" name="email" class="form-control caja" placeholder="Email" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input type="password" name="pass" class="form-control caja" placeholder="Contraseña" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input type="password" name="cpass" class="form-control caja" placeholder="Confirmar contraseña" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input type="date" name="f_nac"class="form-control caja" placeholder="Fecha de Nacimiento" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <select class="form-control" name="gen" style="border-top: 0px;
                                      border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                      <option selected>Selecciona el género</option>
                                      <?php while($row1 = $resultado2->fetch_assoc()) {  ?>
                                        <option value="<?php echo $row1['Id_Genero']; ?>"><?php echo $row1['Nombre_G']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <select class="form-control" name="niv" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                    <option selected>Selecciona el nivel escolar</option>
                                    <?php while($row2 = $resultado3->fetch_assoc()) {  ?>
                                      <option value="<?php echo $row2['Id_Nivel']; ?>"><?php echo $row2['Nombre_N']; ?></option>
                                    <?php } ?>
                                  </select>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <select class="form-control" name="tipo_u" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                    <option selected>Selecciona el tipo de usuario</option>
                                    <?php while($row3 = $resultado6->fetch_assoc()) {  ?>
                                      <option value="<?php echo $row3['Id_Tusuario']; ?>"><?php echo $row3['Nombre_T']; ?></option>
                                    <?php } ?>
                                  </select>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <select class="form-control" name="mat" style="border-top: 0px;
                                    border-left: 0px;border-right: 0px;border-bottom: 2px solid  #ff9966;" required>
                                    <option selected>Selecciona la materia</option>
                                    <?php while($row4 = $resultado4->fetch_assoc()) {  ?>
                                      <option value="<?php echo $row4['Id_Materia']; ?>"><?php echo $row4['Nombre_M']; ?></option>
                                    <?php } ?>
                                  </select>
                                  </div>
                                </div> <br>
                                <div class="custom-control custom-switch">
                                    <div class="container">
                                    <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox" onclick="habilitar();">
                                    <label for="checkbox" class="custom-control-label"><a href="../login/politicas(demo).php " class="text-muted text-decoration-none" data-toggle="modal" data-target="#staticBackdrop">Acepto Términos y Condiciones</label></a>
                                    </div>
                                    <div class="container">
                                    <div class="row py-3">
                                      <input type="submit" name="submit" value="Registrar" class="btn btn-block" style="background:#ff9966; border-bottom: 2px solid  #ff9966; color: white; font-size:18px;" disabled>
                                   </div>
                                   </div>
                                 </div>
                              </form>
                              <?php echo $mensaje; ?>
                              <!--Termina formulario-->
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Termina apartado-->
      </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function habilitar(){
      document.Fregistro.submit.disabled = !document.Fregistro.checkbox.checked;
    }
  </script>
  </body>
</html>

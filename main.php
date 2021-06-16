<?php
  error_reporting(0);
  include 'main/conecta.php';
  include 'main/config.php';
  // Inicia proceso de registro
  // validamos que se presione al boton registro
  if (isset($_POST['submit'])) {
    // recuperamos los valores que nos da el usuario
    $nombre = $conecta->real_escape_string($_POST['nombre']);
    $email = $conecta->real_escape_string($_POST['email']);
    $tel = $conecta->real_escape_string($_POST['tel']);
  // consulta para verificar si exite un email igual dentro de la base de datos
    $nuevo = "SELECT * FROM contacto WHERE Email = '$email' or Tel = '$tel'";
    $new = $conecta->query($nuevo);
  // validacion de el criterio de aceptacion
  if($new->num_rows > 0){
    $mensaje.="<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
            <strong>El Telefono y/o Email que ingresaste ya existen</strong> El registro ya existe en la base de datos por favor <a href='main.php'>Click para iniciar sesion</a> .
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
    }
    else {
      $reg = "INSERT INTO alumnos(Nombre, Email, Tel) VALUES('$nombre','$email','$tel')";
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
  $conecta->close();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Integrar frameworks para el desarrollo de el sistema -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery-3.5.1.min.js"></script> <!-- Integrar JQuery -->
    <title>Inicio | Ksports</title>
    <script>
        function saludar(){
          var tiempo = new Date();
          var hora, cad = " Son las ";
          with(tiempo){
            hora = getHours();
            cad += hora + ":" + getMinutes()+ ":" + getSeconds();
          }
          if (hora < 12)
            cad = "Buenos días," + cad;

          else if(hora < 18)
          cad  = "Buenas tardes," + cad;

          else
            cad = "Buenas noches," + cad;

            return cad
        }
    </script>
  </head>
  <body>
    <!--Integración de Navbar-->
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ff914d;">
<a class="navbar-brand" href="#"><img src="img/logo.png" class="logo" alt="Logo KSPORTS"> </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
  <li class="nav-item active">
    <a class="nav-link" href="#"><span class="icon-home"></span>Inicio<span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="icon-users"></span>Conócenos
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="#">¿Quiénes somos?</a>
      <a class="dropdown-item" href="#">Misión</a>
      <a class="dropdown-item" href="#">Visión</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Objetivos</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon-pitch"></span>Deportes
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="#">Fútbol</a>
      <a class="dropdown-item" href="#">Box</a>
      <a class="dropdown-item" href="#">Beisbol</a>
      <a class="dropdown-item" href="#">Básquet</a>
      <a class="dropdown-item" href="#">Football</a>
      <a class="dropdown-item" href="#">Golf</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Entrenamiento
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="#">Principiante</a>
      <a class="dropdown-item" href="#">Intermedio</a>
      <a class="dropdown-item" href="#">Avanzado</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contacto</a>
  </li>
</ul>
</div>
</nav>
    <!--Termina Navbar--->
    <marquee><div class="parte1"><!--Se hace una primera division-->
      <h5><script>document.write(saludar());</script></h5><!--Colocamos el contenido de la página-->
    </div> </marquee>
    <!---Empieza slider-->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
   <div class="col-8">
     <img src="img/img1.jpg" class="d-block w-100 img" alt="Imagen de Deportes">
   </div>
   <div class="col-4">
     <div class="carousel-caption d-none d-md-block text-dark">
       <img src="img/logo2.png" alt="Logo KSPORTS">
       <p class="text-white">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
     </div>
   </div>
 </div>
    </div>
    <div class="carousel-item">
      <img src="img/img2.jpg" class="d-block w-100 img" alt="Imagen de Deportes">
    </div>
    <div class="carousel-item">
      <img src="img/img3.jpeg" class="d-block w-100 img" alt="Imagen de Deportes">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!--Termina slider--->
    <!---Inicia primera sección-->
      <div class="container py-3"> <hr class="linea">
        <h2 class="text-center py-3">Deportistas que han inspirado a muchas personas.</h2>
        <div class="row py-3">
   <div class="col" align="center">
     <img src="img/img4.png" alt="Michael Jordan" class="imagen">
   </div>
   <div class="col">
     <!--Inicia acordeón-->
     <div class="accordion" id="Portafolio">
       <div class="card">
                <div class="card-header card1" id="headingOne">
                     <h2 class="mb-0">
                         <button class="btn btn-link btn-block text-left collapsed text-decoration-none text-light" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Michael Jordan
                     </button>
                 </h2>
              </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#Portafolio">
                      <div class="card-body text-dark">
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
             </div>
               </div>
<div class="card">
         <div class="card-header card1" id="headingTwo">
              <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed text-decoration-none  text-light" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   Pelé
              </button>
          </h2>
       </div>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#Portafolio">
               <div class="card-body text-dark">
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
         </div>
      </div>
        </div>
        <div class="card">
            <div class="card-header card1" id="headingThree">
                 <h2 class="mb-0">
                     <button class="btn btn-link btn-block text-left collapsed  text-decoration-none  text-light" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Messi
             </button>
            </h2>
        </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#Portafolio">
       <div class="card-body text-dark">
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
     </div>
   </div>
 </div>
</div>
     <!--Termina acordeón-->
   </div>
 </div>
</div> <hr>
    <!---Termina primera sección-->
    <!--Empieza segunda sección-->
    <!--Inicia primera card-->
    <div class="container">
      <hr class="linea">
      <h2 class="text-center py-3">Conócenos</h2>
      <div class="row py-4">
    <div class="col">
      <!--Inicia primer card-->
      <div class="card card1" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-center text-dark">¿Quiénes somos?</h5>
          <p class="card-text text-dark">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
      <!--Termina primer card-->
    </div>
    <div class="col">
      <!--Inicia segundo card-->
      <div class="card card1" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-center text-dark">Misión</h5>
          <p class="card-text text-dark">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
      <!--Termina segundo card-->
    </div>
    <div class="col">
      <!--Inicia tercera card-->
      <div class="card card1" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-center text-dark">Visión</h5>
          <p class="card-text text-dark">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
      <!--Termina tercera card-->
    </div>
  </div>
</div>
    <!--Termina segunda card-->
    <!--Termina segunda sección--->
    <!--Empieza tercera sección-->
    <div class="container">
    <hr class="linea">
    <h2 class="text-center py-3">Entrenamiento</h2>
    <div class="row py-5">
    <div class="col">
      <div align="center">
        <img src="img/img3.jpg" alt="Imagen de dos personas en Entrenamiento" class="imagen1">
      </div>
    </div>
    <div class="col">
      <h3>
        <img src="img/img5.png" alt="iconoEstrella" class="icono"> Principiante <br>
        <img src="img/img5.png" alt="iconoEstrella" class="icono"> Intermedio <br>
        <img src="img/img5.png" alt="iconoEstrella" class="icono">  Avanzado <br>
      </h3>
    </div>
  </div>
</div>
    <!--Termina tercera sección-->
    <!--Empieza cuarta sección-->
      <div class="container">
        <hr class="linea">
        <h2 class="text-center py-3">Contacto</h2>
        <div class="container">
          <div class="container">
            <div class="card form">
              <div class="card-body text-dark">
                <!---Empieza formulario-->
                <div class="container">
                  <form id="form-Order" class="container form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="registro" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-10">
                          <p>
                            <label for="name">Nombre*</label>
                            <input type="text" name="nombre" id="name" placeholder="Kary" autofocus autocomplete required class="cajas">
                          </p>
                          <p>
                            <label for="phone">Teléfono*</label>
                            <input type="text" name="tel" placeholder="+5525670789" required class="cajas">
                          </p>
                          <p>
                            <label for="email">Email*</label>
                            <input type="text" name="email" placeholder="kary@gmail.com" required class="cajas">
                          </p>
                        </div>
                        <div class="col"> <br><br><br><br><br><br><br>
                          <input type="submit" name="submit" value="Enviar" id="btn" class="btn btn-warning btn-lg text">
                        </div>
                      </div>
                </div>
                <?php echo $mensaje; ?>
                <!--Termina formulario-->
              </div>
            </div>
          </div>
        </div>
      </div>
    <!--Termina cuarta sección-->
    <!--Empieza quinta sección--->
    <div class="container">
      <hr class="linea">
    </div>
    <!--Termina quinta sección--->
    <!----->
    <!----->
    <!----->
    <script src="js/bootstrap.js"></script> <!-- Se inserta el framework en js  -->
  </body>
</html>

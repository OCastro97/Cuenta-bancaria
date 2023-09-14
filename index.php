<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Financiera IOD</title>
   <link rel="stylesheet" href="./css/inicio.css">
   <link rel="icon" href="./img/icono.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
   <!-- custom css file link  -->
   
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
   
<!-- header section starts  -->
<header class="header fixed-top">
         <div class="navbar">
               <div class="icon">
                  <i class="logo">
                     <img src="./img/icono.png" width="35" >
                  </i>
                  <a href="#home" class="logo">Intermediario Financiera <span>IOD</span></a>
               </div>
            
               <nav class="nav">
                  <a href="#home" class="menu-nav">Inicio</a>
                  <a href="#about" class="menu-nav">Nosotros</a>
                  <a href="#process" class="menu-nav">Servicio</a>
                  <a href="#contact" class="menu-nav">Contacto</a>
                  <div class="sesionbtn">
                     <button class="btnLog">
                        <a href="./logReg/login.html" class="sesion">Iniciar Sesión</a>
                     </button>
                   </div>
                  
</nav>
               <div id="menu-btn" class="fas fa-bars"></div>
         </div>
</header>
<!-- header section ends -->

<!-- home section starts  -->
<section class="home" id="home">

   <div class="container contenedor-home">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>Haga crecer su riqueza hoy</h3>
            <p>Descubre las mejores soluciones financieras para tus necesidades 
               y comienza a construir un futuro mejor con Financiera IOD.</p>
            <a href="./logReg/register.php" class="link-btn">Empieza ahora</a>
         </div>
      </div>

   </div>

</section>
<!-- home section ends -->

<!-- about section starts  -->
<section class="about" id="about">
   <div class="container">
      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="./img/nosotros.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>sobre nosotros</span>
            <p>Bienvenido a Financiera IOD, un intermediario financiero líder con sede en Panamá. 
               Con un fuerte enfoque en la prestación de servicios financieros excepcionales, 
               nos esforzamos por satisfacer las diversas necesidades de nuestros clientes. 
               Nuestro equipo de profesionales experimentados se dedica a ofrecer soluciones personalizadas 
               y a construir relaciones a largo plazo basadas en la confianza y la transparencia. 
               Ya sea usted un particular o una empresa, estamos aquí para ayudarle a alcanzar sus 
               objetivos financieros y navegar por el complejo mundo de las finanzas con confianza.</p>
         </div>

      </div>
   </div>
</section>
<!-- about section ends -->

<!-- Servicios section starts  -->
<section class="process" id="process">

   <h1 class="heading">Servicios</h1>

   <div class="card-container container">

      <div class="card">
         <div class="face face1">
            <div class="contenido">
               <img src="./img/servicio1.png" alt="">
               <h3>Gestión de inversiones</h3>
            </div>
         </div>
         <div class="face face2">
            <div class="contenido">
            <p>Maximiza tus rendimientos y alcanza tus metas financieras con nuestra gestión de inversiones personalizada y confiable.</p>
            </div>
         </div>
      </div>

      <div class="card">
         <div class="face face1">
            <div class="contenido">
            <img src="./img/servicio2.png" alt="">
            <h3>Asesoría financiera para particulares</h3>
            </div>
         </div>
         <div class="face face2">
            <div class="contenido">
               <p>Recibe asesoramiento personalizado en la planificación financiera, inversiones y protección de activos para lograr una mayor seguridad y éxito financiero.</p>
            </div>
         </div>
         
      </div>

      <div class="card">
         <div class="face face1">
            <div class="contenido">
               <img src="./img/servicio3.png" alt="">
               <h3>Financiamiento corporativo</h3>
            </div>
         </div>
         <div class="face face2">
            <div class="contenido">
               <p>Obtén soluciones flexibles y competitivas para las necesidades financieras de tu empresa, desde capital de trabajo hasta proyectos específicos.</p>
            </div>
         </div>
      </div>

   </div>

</section>
<!-- process section ends -->

<!-- Geolocalizacion section starts  -->
<section class="services" id="services">

   <h1 class="heading">Tu Posición</h1>

   <div class="box-container container">
      <!--Contenedor Mapa-->
      <div id="mapa" style="width: 100%; height: 600px;">
       <!-- Localizar posición--->
       <script>
            var posElt;
            var posLinkElt;
    
            window.addEventListener('load', function(){
                posElt = document.getElementById('Pos');
                posLinkElt = document.querySelector('#PosLink > a');
    
                navigator.geolocation.getCurrentPosition(geoposOK, geoposKO);
      
            });
    
            /** @param {GeolocationPosition} pos */
            function geoposOK(pos) {
                //Obtenemos latitud y longitud
                var lat = pos.coords.latitude;
                var long = pos.coords.longitude;
                //Mostramos la posición
                posElt.textContent = `${lat}, ${long}`;
                //generamos enlace a la posición
                posLinkElt.href = `https://maps.google.com/?q=${lat},${long}`;
                //Muestra la posicion actual
                var mapContainer = document.getElementById("mapa");
                var mapUrl = "https://www.google.com/maps?q=" + lat + "," + long + "&z=15&output=embed";
                mapContainer.innerHTML = '<iframe src="' + mapUrl + '" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>';
            }
    
            /** @param {GeolocationPositionError} err */
            function geoposKO(err) {
                console.warn(err.message);
                let msg;
                switch(err.code) {
                    case err.PERMISSION_DENIED:
                        msg = "No nos has dado permiso para obtener tu posición";
                        break;
                    case err.POSITION_UNAVAILABLE:
                        msg = "Tu posición actual no está disponible";
                        break;
                     case err.TIMEOUT:
                         msg = "No se ha podido obtener tu posición en un tiempo prudencial";
                         break;
                     default:
                         msg = "Error desconocido";
                         break;
                }
                posElt.textContent = msg;
            }
        </script>
         <!--Muestra la posicion en texto html en pantalla-->
         <p>Tu posición es: <span id="Pos">Desconocida</span></p> 
         <!--Dibuja el mapa (Comentar si solo quieres ver si muestra las cortenadas)-->
         <p id="PosLink"><a target="_blank"></a></p>

    </div>
   </div><!-- fin del contenedor-->
</section>
<!-- services section ends -->

<!-- contact section starts  -->
<section class="contact" id="contact">

   <h1 class="heading">Contacto</h1>

   <form autocomplete="off" action="./php/mensajesContact.php" method="POST" >
      <span>Tu nombre :</span>
      <input type="text" name="nombre" placeholder="ingrese su nombre" class="box" required>
      <span>Tu correo :</span>
      <input type="email" name="email" placeholder="ingrese su correo" class="box" required>
      <span>Tu número :</span>
      <input type="text" name="telefono" placeholder="ingrese su número" class="box" >
      <span>Mensaje :</span>
      <textarea name="mensaje" id="" cols="30" rows="4" class="box" placeholder="escribe su mensaje" required></textarea>
      <input type="submit" value="envíar" name="submit" class="link-btn" >
   </form>  

</section>
<!-- contact section ends -->

<!-- footer section starts  -->
<fotter class="footer">

   <div class="grupo-1">
      <div class="box">
         <div class="icon">
            <img src="./img/icono.png" width="35" >
            <a href="#" class="logo">Intermediario Financiera <span>IOD</span>
         </div>
      </div>
      <div class="box">
         <h2>SOBRE NOSOTROS</h2>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, incidunt!</p>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="box">
         <h2>Siguenos</h2>
         <div class="red-social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
         </div>
      </div>
   </div>
   <div class="grupo-2">
      <hr>
      <small>&copy; 2023 <b>Intermediario Financiera <span>IOD</span></b> - Todos los derechos reservados.</small>
   </div>
</footer>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="./js/logReg/header.js"></script>

</body>
</html>
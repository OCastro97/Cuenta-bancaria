<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financiera IOD</title>
    <link rel="icon" href="../img/icono.png">

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="../css/logReg/register.css">
</head>
<body>
    <div class="container">
                <div class="img">
                    <img src="">
                </div>
                <div class="form_Login">
                    <form action="../php/registroValidar.php" method="POST">
                        <!-- Progreso -->
                        <div class="progressbar">
                            <div class="progress" id="progress"></div>
                        
                        <!-- Barra de progreso -->
                        
                            <div class="step-progress progress-active" data-title=""></div>
                            <div class="step-progress" data-title=""></div>
                            <div class="step-progress" data-title=""></div>
                        
                        </div>
                        <!-- Entradas de datos -->
                        <!-- CAPA 1 -->
                        <div class="form-step form-step-active">
                            <div class="title">
                                <h3>Registrar</h3>
                            </div>
                            <!--Datos a Ingresar-->

                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="datos">Nombre</h5>
                                    <input type="text" class="input" name="nombre" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="datos">Apellido</h5>
                                    <input type="text" class="input" name="apellido" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="datos">Correo</h5>
                                    <input type="text" class="input" name="correo" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="datos">Contraseña</h5>
                                    <input type="text" class="input" name="password" autocomplete="off" required>
                                </div>
                            </div>
                            <!--Fin de Datos a Ingresar-->
                            <div class="">
                                <a href="#" class="btn btn-next width-50 ml-auto">Siguiente</a>
                            </div>
                            ¿Ya tienes una cuenta?
                            <div class="volver">
                                <a href="../index.php" class="back">Volver</a>
                                <a href="login.html" class="btn-iniciar">Ingresa</a>
                            </div>
                        </div><!--FIN CAPA 1 -->


                        <!-- CAPA 2 -->
                        <div class="form-step">
                            <!--Datos a Ingresar-->
                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="datos">Identificación</h5>
                                    <input type="text" class="input" name="cedula" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="datos">Telefono</h5>
                                    <input type="text" class="input" name="telefono" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <h5 class="datos">Fecha de Nacimiento</h5>
                                    <input type="text" class="input" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'" name="fechaNacimiento" required>
                                </div>
                            </div>

                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="select">Genero</h5>
                                    <select name="genero" id="" class="input" required>
                                        <option value="">Por favor seleccione</option>
                                        <option value="Macho">Hombre</option>
                                        <option value="Hembra">Mujer</option>
                                        <option value="Hembra">Otro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="select">Tipo de cuenta</h5>
                                    <select name="tipo_cuenta" id="tip_cuenta" class="input" required>
                                    <option hidden value="0">Tipos</option>
                                    <option value="1">Individual</option>
                                    <option value="2">Conjunto</option>
                                    <option value="3">Corporativo</option>
                                    </select>
                                </div>
                            </div>

                            <!--Fin de Datos a Ingresar-->
                            <div class="btn-group">
                                <a href="#" class="btn btn-prev">Anterior</a>
                                <a href="#" class="btn btn-next">Siguiente</a>
                            </div>

                        </div><!-- FIN CAPA 2 -->
                        
                        <!-- CAPA 3 -->
                        <div class="form-step">

                            <!--Datos a Ingresar-->
                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <input type="text" name="cuenta"  id="cuenta" placeholder="# cuenta" readonly required />
                                </div>
                            </div>>
                            
                            <div class="input-div pass">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h5 class="datos">Pais</h5>
                                    <input type="text" class="input" name="password" autocomplete="off" required>
                                </div>
                            </div>
                            <!--Fin de Datos a Ingresar-->

                            <div class="btn-group">
                                <a href="#" class="btn btn-prev">Anterior</a>
                                <!-- <a href="../pages/usuarios/citas.php" class="btn btn-next">Registrar</a> -->
                                <input type="submit" class="btn btn-reg" value="Registrar">
                            </div>

                        </div><!-- FIN CAPA 3 -->
                        
                        

                        <!-- <a href="#">Olvidó la contraseña?</a> -->
                        <!-- <input type="submit" class="btn" value="Ingresar">
                        Ya tienes una cuenta? <a href="login.html">Inicia Sesion</a> -->
                    </form>
                </div>
               
    </div>

    <script src="../js/logReg/register.js"></script>

</body>
</html>
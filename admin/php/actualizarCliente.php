<?php 
    require("../../php/conexion.php");
    include("dashboard.php");

    $id_cli = $_GET['id'];
    $cliente = "SELECT * FROM CLIENTES WHERE ID_CLIENTE=:id" ;
    $cuenta = "SELECT * FROM CUENTA WHERE ID_CLIENTE =:id";
    $calle = "SELECT * FROM CALLE WHERE ID_CLIENTE =:id";
    $tipo_cli = "SELECT * FROM TIPO_CLIENTE WHERE ID_TIPO_CLI =1";
    $dir = "SELECT * FROM DIRECCION_CLI WHERE ID_CLIENTE = :id";

    $datos = oci_parse($conexion, $cliente);
    $datosCuenta = oci_parse($conexion, $cuenta);
    $calleCuenta = oci_parse($conexion, $calle);
    $datosDir = oci_parse($conexion, $dir);
    $tipo = oci_parse($conexion, $tipo_cli);

    oci_bind_by_name($datos, 'id',$id_cli);
    oci_bind_by_name($datosCuenta, 'id',$id_cli);
    oci_bind_by_name($calleCuenta, 'id',$id_cli);
    oci_bind_by_name($datosDir, 'id',$id_cli);

    oci_execute($datos);
    // echo $id_cli;
  

?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>


<div class="contenido">
<section class="container">
    <header>Actualizar Datos</header>
<form action="./validarActualizacion.php" method="POST" class="form">
  <?php 

  while($fila = oci_fetch_array($datos)){
    
  ?>
    <div class="column">
        <div class="input-box">
          <input type="hidden" value="<?php echo $fila["ID_CLIENTE"]; ?>" name="id_cli">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $fila['NOMBRE'];?>" required autocomplete="off"/>
        </div>
        <div class="input-box">
            <label>Apellido</label>
            <input type="text" name="apellido" value="<?php echo $fila['APELLIDO'];?>" placeholder="Ingrese el apellido" required  autocomplete="off"/>
        </div>
        <div class="input-box">
            <label>Identificación</label>
            <input type="text" name="iden" value="<?php echo $fila['IDENTIFICACION'];?>"  readonly  autocomplete="off" />
        </div>
    </div>

    <div class="column">
      <div class="input-box">
        <label>Telefono</label>
        <input type="text" name="telefono" value="<?php echo $fila['TELEFONO'];?>" required  autocomplete="off" />
      </div>
        <div class="input-box">
            <label>E-mail </label>
            <input type="text" name="correo" value="<?php echo $fila['EMAIL'];?>" required  autocomplete="off" />
        </div>
        <div class="input-box">
            <label>Contraseña </label>
            <input type="text" name="seguridad" value="<?php echo $fila['PASSW'];?>" required  autocomplete="off" />
        </div>
    </div>

  <div class="column">
    <div class="input-box">
      <label>Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" value="<?php echo $fila['FECHA_NAC'];?>" required />
    </div>

    <div class="input-box">
        <label>Género</label>
        <input type="text" name="genero" value="<?php echo $fila['GENERO']; }?>" required  autocomplete="off" />
      </div>
    <div class="input-box">
        <label>Nacionalidad</label>
        <input type="text" name="nacimiento" value="Panamá" required  autocomplete="off" />
      </div>
    </div>
    <div class="column">
    <div class="input-box">
      <?php
        oci_execute($datosDir);
        while($fila= oci_fetch_assoc($datosDir)){
      ?>
        <label>Provincia</label>
        <input type="text" name="provincia" value="<?php echo $fila['PROVINCIA'];?>" required  autocomplete="off" />
      </div>
      <div class="input-box">
        <label>Distrito</label>
        <input type="text" name="distrito" value="<?php echo $fila['DISTRITO'];?>" required  autocomplete="off" />
      </div>
      <div class="input-box">
        <label>Corregimiento</label>
        <input type="text" name="corregimiento" value="<?php echo $fila['CORREGIMIENTO']; }?>" required  autocomplete="off" />
      </div>
    </div>
    <div class="column">
      <div class="input-box">
        <?php oci_execute($calleCuenta);
        while($fila = oci_fetch_array($calleCuenta)){
        ?>
        <label>Calle</label>
        <input type="text" name="calle" value="<?php echo $fila['CALLE'];?>" required  autocomplete="off" />
      </div>
      <div class="input-box">
        <label>Tipo Residencia</label>
        <input type="text" name="hogar" value="<?php echo $fila['TIPO_HOGAR'];?>" required  autocomplete="off" />
      </div>
      <div class="input-box">
        <label># Residencia</label>
        <input type="text" name="numCasa" value="<?php echo $fila['NUM_HOGAR'];} ?>" required  autocomplete="off" />
      </div>
    </div>
  <div class="column">
    <div class="input-box">
      <label>Tipo Cliente</label>
      
      <input type="text" name="tipo_cliente" 
      value="
        
        <?php 
        oci_execute($tipo);
        while($tipo_cli = oci_fetch_assoc($tipo)){ 
          echo $tipo_cli['DESCRIPCION'];
        }
        ?>
      
      "
      readonly  autocomplete="off" />
    </div>
    <?php
      oci_execute($datosCuenta);
      while($fila = oci_fetch_array($datosCuenta)){
    ?>
    <input type="hidden" value="<?php echo $fila["ID_TIPO_CUENTA"]; ?>" name="tipo_cuenta">
    <input type="hidden" value="<?php echo $fila["FECHA_APERTURA"]; ?>" name="fecha">
    <input type="hidden" value="<?php echo $fila["SALDO"]; ?>" name="saldo">
    <div class="input-box">
      <label># Cuenta</label>
      <input type="text" name="cuenta" id="cuenta" value="<?php echo $fila['NUM_CUENTA'];?>" readonly required />
    </div>
  </div>
  <button>Actualizar</button>
  <?php
    }
  ?>
</form>
</section>
</div>
<?php 
    include("footer.php");
?>
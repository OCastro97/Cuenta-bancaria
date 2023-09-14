<?php
    include("dashboard.php");
    
    require("../../php/conexion.php");

    $mostrar = "SELECT * FROM CLIENTES";

    $mostrar = "SELECT * FROM TIPO_SERVICIO";
    $tipo = "SELECT * FROM TIPO_CLIENTE";

    $tipoServicio = oci_parse($conexion, $mostrar);

    $tipoCliente = oci_parse($conexion, $tipo);

?>
<div class="contenido">
    <section class="container">
      <header>Registrar Usuario</header>
      <form method="POST" class="form">
        <div class="column">
          <div class="input-box">
            <label>Tipo Cliente</label>
            <div class="select-box">
              <select name="tipo_cli" id="tipos">
                <?php
                  oci_execute($tipoCliente);
                  while($row = oci_fetch_assoc($tipoCliente) ){
                ?>
                <option hidden value="0">Tipos</option>
                <option value="<?php echo $row['ID_TIPO_CLI'] ;?>"><?php echo $row['DESCRIPCION']; }?></option>                
              </select>
            </div>
          </div>
          <div class="input-box">
            <label>Servicio</label>
            <div class="select-box">
              <select name="tipo_cuenta" id="tipos">
              <?php
                  oci_execute($tipoServicio);
                  while($row = oci_fetch_assoc($tipoServicio) ){
                ?>
                <option hidden value="0">Tipos</option>
                <option value="<?php echo $row['ID_SERVICIO'] ;?>"><?php echo $row['SERVICIO']; }?></option>  
              </select>
            </div>
          </div>
        </div>
        <button>Listo</button>
      </form>

      <?php
        if (isset($_POST["tipo_cli"]) && isset($_POST["tipo_cuenta"])) {
          $opcionSeleccionada = $_POST["tipo_cli"];
          $cuentaSelec = $_POST["tipo_cuenta"];
          if($opcionSeleccionada == "1" && $cuentaSelec == 1){
            include('form-cliente-ah.php');
            
          }else if($opcionSeleccionada == "2" && $cuentaSelec == 1){              
            include('form-emp-ah.php');
          }else if($opcionSeleccionada == "3" && $cuentaSelec == 1){
            echo '<h1>Seleccionaste Privado</h1>';
          }else if($opcionSeleccionada == "1" && $cuentaSelec == 2){
            include('form-cliente-prest.php');
          }else if($opcionSeleccionada == "2" && $cuentaSelec == 2){              
            include('form-emp-prest.php');
          }else if($opcionSeleccionada == "3" && $cuentaSelec == 2){
            echo '<h1>Seleccionaste Prestamo Privado</h1>';
          }

        }
      
      ?>
    </section>
</div>
<?php
    include("footer.php");
  ?>
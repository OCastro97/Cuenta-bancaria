<?php
    include("index.php");
    require("../../php/conexion.php");

    $mostrar = "SELECT * FROM CLIENTES";

    $mostrar = "SELECT * FROM TIPO_SERVICIO";
    $tipo = "SELECT * FROM TIPO_CLIENTE";

    $tipoServicio = oci_parse($conexion, $mostrar);

    $tipoCliente = oci_parse($conexion, $tipo);

?>
<div class="contenido">
    <section class="container">
      <header>Transacción</header>
      <form method="POST" class="form">
        <div class="column">
          <div class="input-box">
            <label>Servicio</label>
            <div class="select-box">
              <select name="tipo_cuenta" id="tipos">
                <option value="0" hidden>Tipos</option>
                <option value="1">Depósito</option>
                <option value="2">Pago</option>
                <option value="3">Transferencia</option>
              </select>
            </div>
          </div>
        </div>
        <button>Listo</button>
      </form>

      <?php
        if (isset($_POST["tipo_cuenta"])) {
          $cuentaSelec = $_POST["tipo_cuenta"];
          if($cuentaSelec == "1"){
            include('deposito.php');
          }else if($cuentaSelec == "2"){              
            include('pago.php');
          }else if( $cuentaSelec == "3"){
            include('transferencia.php');
          }

        }
      
      ?>
    </section>
</div>
<?php
    include("footer.php");
  ?>
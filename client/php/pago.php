<?php
    require("../../php/conexion.php");

    // session_start();
    // ob_start();
    $indice = $_SESSION['indice'];
    $cuenta = "SELECT * FROM CLIENTES WHERE EMAIL=:id";

?>

<form action="registra-transf.php" method="POST" class="form">
  <header>Pago Servicio</header>
  <h3>Sus de Datos</h3>
  <div class="form first">
    <div class="column">
      <div class="input-box">
      <?php
          $cuenta = "SELECT * FROM CLIENTES INNER JOIN CUENTA ON CLIENTES.ID_CLIENTE = CUENTA.ID_CLIENTE WHERE EMAIL=:id";
          $cuentaIni = oci_parse($conexion, $cuenta);

          oci_bind_by_name($cuentaIni, 'id',$indice);
          oci_execute($cuentaIni);
          
          while($fila = oci_fetch_assoc($cuentaIni)){
        ?> 

        <input type="hidden" value="<?php echo $fila["ID_CLIENTE"]; ?>" name="id_cliente">
        <input type="hidden" value="<?php echo $fila["ID_TIPO_CUENTA"]; ?>" name="tipo_cuenta">
        <input type="hidden" value="<?php echo $fila["ID_CUENTA"]; ?>" name="id_cuenta">
        
        <label># Cuenta</label>
        <input type="text" name="mi_cuenta" readonly value="<?php echo $fila['NUM_CUENTA'];?>"  />
      </div>
      <div class="input-box">
        <label>Monto Disponible</label>
        <input type="text" name="monto_disponible" value="<?php echo $fila['SALDO']; ?>" readonly/>
      </div>
      <div class="input-box">
        <label>Tipo Cuenta</label>
        <input type="text" name="iden" value="<?php echo $fila['ID_TIPO_CLI'];} ?>" readonly />
      </div>
    </div>
    <br>
    <h3>Datos de Destino</h3>
    <div class="column">
      <div class="input-box">
          <label># Cuenta</label>
          <input type="text" name="cuenta" placeholder="Ingrese el # cuenta"  />
      </div>
      <div class="input-box">
        <label>Nombre Cuenta </label>
        <input type="text" name="nombre" placeholder="Ingrese el nombre cuenta"  />
      </div>
      <div class="input-box">
        <label>Monto a Pagar</label>
        <input type="number" name="saldo" id="saldo" placeholder="Ingrese el monto"  />
      </div>
    </div>

    <div class="column">
      <div class="input-box">
          <label>Fecha</label>
          <input type="text" name="fecha" id="date" readonly />
      </div>
      <div class="input-box">
        <label>Hora</label>
        <input type="text" name="hora" id="hora" readonly  />
      </div>
      <div class="input-box">
        <label>Monto Salida</label>
        <input type="number" name="saldo_sal" id="saldo_sal" />
      </div>
      
        <input hidden type="number" name="transaccion" value="4"  />
      
    </div>
    </div>
    <button>Pagar</button>
</form>

<script>
 // generando fecha de hoy
  var today = new Date();
  let day = today.getDate();
  let month = today.getMonth() + 1;
  let year = today.getFullYear();
  let dateNow = document.querySelector("#date").value = (day + '/' + month + '/' + year);

  let hora = today.getHours();
  let minuto = today.getMinutes();
  let amPm = hora >= 12 ? 'pm':'am';
  hora = hora % 12;
  hora = hora ? hora : 12;
  let hourNow =document.querySelector("#hora").value = (hora+':'+minuto+' ' + amPm);

  var saldo =document.getElementById("saldo");
  var saldo_salida =document.getElementById("saldo_sal");
  saldo.addEventListener("input", function(){
    saldo_salida.value = saldo.value;
  });

</script>
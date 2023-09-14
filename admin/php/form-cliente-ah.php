<?php 
  
  require("../../php/conexion.php");

  $cuenta = "SELECT * FROM TIPO_CUENTA";
  $cliente = "SELECT * FROM TIPO_CLIENTE";

  $tipo_cuenta = oci_parse($conexion, $cuenta);
  $tipo_client = oci_parse($conexion, $cliente);
  oci_execute($tipo_cuenta);
  oci_execute($tipo_client);
?>

<form action="registra-cli-ah.php" method="POST" class="form">
  <div class="form first">
    <div class="column">
      <div class="input-box">
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Ingrese el nombre" autocomplete="off"  />
      </div>
      <div class="input-box">
        <label>Apellido</label>
        <input type="text" name="apellido" placeholder="Ingrese el apellido" autocomplete="off"  />
      </div>
      <div class="input-box">
        <label>Identificación</label>
        <input type="text" name="iden" placeholder="Ingrese la Identificación" autocomplete="off"  />
      </div>
    </div>
    <div class="column">
      <div class="input-box">
          <label>Telefono</label>
          <input type="text" name="telefono" placeholder="Ingrese el # telefono" autocomplete="off"  />
      </div>
      <div class="input-box">
        <label>E-mail </label>
        <input type="text" name="correo" placeholder="Ingrese el E-mail" autocomplete="off"  />
      </div>
      <div class="input-box">
        <label>Contraseña</label>
        <input type="text" name="seguridad" id="seguridad" placeholder="Ingrese el apellido" readonly />
      </div>
    </div>
  
    <div class="column">
      <div class="input-box">
        <label>Fecha de Nacimiento</label>
        <input type="date" name="nacimiento" placeholder="Ingrese la fecha de nacimiento"  />
      </div>
      <div class="input-box">
        <label>Nacionalidad</label>
        <input type="text" name="nacionalidad" placeholder="Ingrese la Nacionalidad" autocomplete="off"  />
      </div>
      
      <div class="input-box">
        <label>Género</label>
        <div class="select-box">
          <select name="genero" id="genero">
              <option hidden value="0">Seleccione</option>
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
          </select>
      </div>
      </div>
    </div>
    </div>
    <input hidden type="text" name="tipo_cliente" value="1"  />


    <button>Siguiente</button>
</form>


<script>

    let generate = "12345*";
    let passwordNow =document.querySelector("#seguridad").value = (generate);
</script>
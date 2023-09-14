<?php
 include("dashboard.php");
 require("../../php/conexion.php");

?>

<div class="contenido">
<section class="container">
    <header>Actualizar Dato</header>
<form action="registrar.php" method="POST" class="form">
    <div class="column">
        <div class="input-box">
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Ingrese el nombre" required autocomplete="off"/>
        </div>
        <div class="input-box">
            <label>Apellido</label>
            <input type="text" name="apellido" placeholder="Ingrese el apellido" required  autocomplete="off"/>
        </div>
    </div>

    <div class="column">
        <div class="input-box">
            <label>Identificación</label>
            <input type="text" name="iden" placeholder="Ingrese la Identificación" required  autocomplete="off" />
        </div>
        <div class="input-box">
            <label>E-mail </label>
            <input type="text" name="correo" placeholder="Enter email address" required  autocomplete="off" />
        </div>
    </div>

  <div class="column">
    <div class="input-box">
      <label>Telefono</label>
      <input type="text" name="telefono" placeholder="Enter phone number" required  autocomplete="off" />
    </div>
    <div class="input-box">
      <label>Fecha de Nacimiento</label>
      <input type="date" placeholder="Enter birth date" required />
    </div>
  </div>
  <div class="gender-box">
    <h3>Gender</h3>
    <div class="gender-option">
      <div class="gender">
        <input type="radio" id="check-male" name="gender" checked />
        <label for="check-male">male</label>
      </div>
      <div class="gender">
        <input type="radio" id="check-female" name="gender" />
        <label for="check-female">Female</label>
      </div>
      <div class="gender">
        <input type="radio" id="check-other" name="gender" />
        <label for="check-other">prefiero no decir</label>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="input-box">
      <label>Tipo Cliente</label>
      <div class="select-box">
        <select name="tipo_cli" id="tipos">
          <?php
          oci_execute($tipoCliente);
          while ($row = oci_fetch_assoc($tipoCliente)) {
          ?>
            <option hidden value="0">Tipos</option>
            <option value="<?php echo $row['ID_TIPO_CLI']; ?>"><?php echo $row['DESCRIPCION'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="input-box">
      <label># Cuenta</label>
      <input type="text" name="cuenta" id="cuenta" placeholder="# cuenta" readonly required />
    </div>

  </div>
  <button>Actualizar</button>
</form>
</section>
</div>

<?php 
    include("footer.php");
?>
<form action="registrar.php" method="POST" class="form">
    <div class="column">
        <div class="input-box">
            <label>Nombre Empresa</label>
            <input type="text" name="nombre" placeholder="Ingrese el nombre" required />
        </div>
        <div class="input-box">
            <label>Acrónimo</label>
            <input type="text" name="apellido" placeholder="Ingrese el apellido" required />
        </div>
    </div>

    <div class="column">
        <div class="input-box">
            <label>NIF</label>
            <input type="text" name="iden" placeholder="Ingrese la Identificación" required />
        </div>
        <div class="input-box">
            <label>E-mail</label>
            <input type="text" name="correo" placeholder="Enter email address" required />
        </div>
    </div>

    <div class="column">
        <div class="input-box">
            <label>Telefono</label>
            <input type="text" name="telefono" placeholder="Enter phone number" required />
        </div>
        <div class="input-box">
            <label>Dirección</label>
            <input type="text" placeholder="Ingrese la dirección" required />
        </div>
    </div>
    <div class="column">
        <div class="input-box">
            <label>Tipo Cuenta</label>
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
    <button>Siguiente</button>
</form>
<!-- 
<script>
  let date = "-2022";
  const tipo_cli = document.querySelector("#tipos");
  console.log(tipo_cli);
  tipo_cli.addEventListener("change", () => {
  let valorOption =tipo_cli.values;

  var optionSelect =tipo_cli.options[tipo_cli.selectedIndex];
  if(tipo_cli.value == 1001){
    let public = "0"+ 4 +"-";
    let cuenta = [];
    for (let i = 1; i<=5; i++){
  let random =Math.ceil(Math.random() * 9);
  cuenta.push(random);
  }
  cuenta.push(date);
  console.log(cuenta.join(''));


      let inputResult = document.querySelector("#cuenta").value = (public + cuenta.join('') );
      }else if(tipo_cli.value == 1002){
      let public = "0"+ 2 +"-";
      let cuenta = [];
      for (let i = 1; i<=5; i++){
    let random =Math.ceil(Math.random() * 9);
    cuenta.push(random);
  }
    cuenta.push(date);
    console.log(cuenta.join(''));
      let inputResult = document.querySelector("#cuenta").value = (public + cuenta.join('') );
    }
  });
</script> -->
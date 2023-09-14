<form action="registra-emp-ah.php" method="POST" class="form">
    <div class="form first">
    <div class="column">
        <div class="input-box">
            <label>Nombre Empresa</label>
            <input type="text" name="nombre_emp" placeholder="Ingrese el nombre" required />
        </div>
        <div class="input-box">
            <label>Acrónimo</label>
            <input type="text" name="acronimo" placeholder="Ingrese el acronimo" required />
        </div>
        <div class="input-box">
            <label>NIF</label>
            <input type="text" name="nif" placeholder="Ingrese la Identificación" required />
        </div>
    </div>

    <div class="column">
        <div class="input-box">
            <label>Telefono</label>
            <input type="text" name="telefono_emp" placeholder="Ingrese el telefono" required />
        </div>
        <div class="input-box">
            <label>E-mail</label>
            <input type="text" name="correo_emp" placeholder="Ingrese el correo" required />
        </div>
        <div class="input-box">
            <label>Contraseña</label>
            <input type="text" name="contra_emp" id="contra" placeholder="Ingrese la contraseña" required />
        </div>
    </div>

    <div class="column">
      <div class="input-box">
        <label>Provincia</label>
        <div class="select-box">
          <select name="provincia" id="provincia">
            <option hidden value="0">Seleccione</option>
            <?php   
              $provincias = "SELECT * FROM PROVINCIA";
              $prov = oci_parse($conexion, $provincias);
              oci_execute($prov);
              while($filaprov = oci_fetch_assoc($prov)){
            ?>
            <option value="<?php echo $filaprov['ID_PROVINCIA']; ?>"><?php echo $filaprov['PROVINCIA']; }?></option>
          </select>
        </div>
      </div>
      <div class="input-box">
        <label>Distrito</label>
        <div class="select-box">
          <select name="distrito" id="distrito">
            <option hidden value="0">Seleccione</option>
            <?php   
              $distrito = "SELECT * FROM DISTRITO";
              $dist = oci_parse($conexion, $distrito);
              oci_execute($dist);
              while($filadist = oci_fetch_assoc($dist)){
            ?>
            <option value="<?php echo $filadist['ID_DISTRITO']; ?>"><?php echo $filadist['DISTRITO']; }?></option>
          </select>
        </div>
      </div>
      <div class="input-box">
        <label>Corregimiento</label>
          <div class="select-box">
          <select name="corregimiento" id="corregimiento">
            <option hidden value="0">Seleccione</option>
            <?php   
              $corregimiento = "SELECT * FROM CORREGIMIENTO";
              $corr = oci_parse($conexion, $corregimiento);
              oci_execute($corr);
              while($filacorr = oci_fetch_assoc($corr)){
            ?>
            <option value="<?php echo $filacorr['ID_CORREG']; ?>"><?php echo $filacorr['CORREGIMIENTO']; }?></option>
          </select>
        </div>
      </div>
    </div>
    <div class="column">
        <div class="input-box">
            <label>Calle</label>
            <input type="text" name="calle_empr" placeholder="Ingrese la dirección" required />
        </div>
        <div class="input-box">
            <label>Tipo Local</label>
            <div class="select-box">
                <select name="tipo_local" id="local">
                    <option hidden value="0">Elige</option>
                    <option value="Edificio">Edificio</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
        </div>
        <div class="input-box">
            <label># Local</label>
            <input type="text" name="num_local" placeholder="Ingrese la dirección" required />
        </div>
    </div>
    </div>
    <div class="form second">

        <div class="column">
            <div class="input-box">
                <label>Tipo Cuenta</label>
                <div class="select-box">
                    <select name="tipo_cuent_emp" id="tipos">
                        <option hidden value="0">Elige</option>
                        <option value="2">Corporativo</option>
                        
                    </select>
                </div>
            </div>
            <div class="input-box">
                <label>Tipo Empresa</label>
                <div class="select-box">
                    <select name="tipo_empr" id="tipo_empr">
                        <option hidden value="0">Elige</option>
                        <option value="2">Gubernamental</option>
                        <option value="3">Privado</option>
                    </select>
                </div>
            </div>
            <div class="input-box">
                <label>Servicio</label>
                <input type="text" name="servicio" value="Ahorro" readonly required />
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Saldo</label>
                <input type="number" name="saldo_empr" placeholder="ingrese el monto" required />
            </div>
            <div class="input-box">
                <label># Cuenta</label>
                <input type="text" name="cuenta_emp" id="cuenta" placeholder="# cuenta" readonly required />
            </div>
            <div class="input-box">
                <label>Fecha Apertura</label>
                <input type="text" name="fecha_emp" id="fecha" readonly required />
            </div>
        </div>
    </div>
        <button>Registrar</button>
   
</form>
 
<script>

var today = new Date();
  let day = today.getDate();
  let month = today.getMonth() + 1;
  let year = today.getFullYear();

  let dateNow = document.querySelector("#fecha").value = (day + '/' + month + '/' + year);
  console.log(dateNow);

  let date = "-2022";
  const tipo_cli = document.querySelector("#tipo_empr");
  console.log(tipo_cli);
  tipo_cli.addEventListener("change", () => {
  let valorOption =tipo_cli.values;

  var optionSelect =tipo_cli.options[tipo_cli.selectedIndex];
  if(tipo_cli.value == "2"){
    let public = "0"+ 2 +"-";
    let cuenta = [];
    for (let i = 1; i<=5; i++){
  let random =Math.ceil(Math.random() * 9);
  cuenta.push(random);
  }
  cuenta.push(date);
  console.log(cuenta.join(''));


      let inputResult = document.querySelector("#cuenta").value = (public + cuenta.join('') );
      }else if(tipo_cli.value == "3"){
      let public = "0"+ 3 +"-";
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
</script> 

    // let generate = "12345*";
    // let passwordNow =document.querySelector("#seguridad").value = (generate);

  // generando fecha de hoy
  var today = new Date();
  let day = today.getDate();
  let month = today.getMonth() + 1;
  let year = today.getFullYear();

  let dateNow = document.querySelector("#date").value = (day + '/' + month + '/' + year);
  console.log(dateNow);

  // generando número de cuenta 
  let date = '-'+today.getDate();
  const tipo_cuenta = document.querySelector("#tipo_cuenta");
  tipo_cuenta.addEventListener("change", () => {
    let valorOption =tipo_cuenta.values;
    var optionSelect =tipo_cuenta.options[tipo_cuenta.selectedIndex];
    if(tipo_cuenta.value == 1001){
      let public = "0"+ 4 +"-";
      let cuenta = [];
      for (let i = 1; i<=5; i++){
        let random =Math.ceil(Math.random() * 9);
        cuenta.push(random);
      }
    cuenta.push(date);
    let inputResult = document.querySelector("#cuenta").value = (public  + cuenta.join(''));
    let numCuenta = document.querySelector("#numcuenta").value = (public  + cuenta.join(''));
    let nomCuenta =document.querySelector("#nomcuenta").value = (optionSelect.text);

    }else if(tipo_cuenta.value == 1002){
      let public = "0"+ 2 +"-";
      let cuenta = [];
      for (let i = 1; i<=5; i++){
      let random =Math.ceil(Math.random() * 9);
      cuenta.push(random);
      }
    cuenta.push(date);
      let inputResult = document.querySelector("#cuenta").value = (public + cuenta.join('') );
      let numCuenta = document.querySelector("#numcuenta").value = (public  + cuenta.join(''));
      let nomCuenta =document.querySelector("#nomcuenta").value = (optionSelect.text);

    }
  });

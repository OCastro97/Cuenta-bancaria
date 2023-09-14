<?php

require("../../php/conexion.php");
require('../../php/variablesGlobales.php');
require('../../php/variablesGlobCuentaCli.php');

    $id_cliente = 0;
    $id_cuenta = 0;
    $id_dir = 1;
    $id_serv = 2;

    $insertarCliente = "INSERT INTO CLIENTES (ID_TIPO_CLI,NOMBRE,APELLIDO,IDENTIFICACION,TELEFONO,EMAIL,PASSW,GENERO,FECHA_NAC,ID_SERV) VALUES(:tipo, :nom, :apell, :iden, :dir, :tel, :mail, :pass, :genero, :fecha_naci, :servicio)";
    $stmt = oci_parse($conexion, $insertarCliente);
        
    $id_cliente = +1;
    // oci_bind_by_name($stmt, ':id',$id_cliente);
    oci_bind_by_name($stmt, ':tipo',$tipo_cli);
    oci_bind_by_name($stmt, ':nom',$nombre);
    oci_bind_by_name($stmt, ':apell',$apellido);
    oci_bind_by_name($stmt, ':iden',$identificacion);
    oci_bind_by_name($stmt, ':dir',$id_dir);
    oci_bind_by_name($stmt, ':tel',$telefono);
    oci_bind_by_name($stmt, ':mail',$email);
    oci_bind_by_name($stmt, ':pass',$password);
    oci_bind_by_name($stmt, ':genero',$genero);
    oci_bind_by_name($stmt, ':fecha_naci',$fecha_naci);
    oci_bind_by_name($stmt, ':servicio',$id_serv);  

    $resultCli = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);

    $insertarCalle = "INSERT INTO CALLE(CALLE,TIPO_HOGAR, NUM_HOGAR) VALUES (:calle, :hogar, :numero)";
    $calle = oci_parse($conexion, $insertarCalle);

    // oci_bind_by_name($calle, ':id_ca',$id_ca);
    oci_bind_by_name($calle, ':calle',$calleCl);
    oci_bind_by_name($calle, ':hogar',$tipo_hogar);
    oci_bind_by_name($calle, ':numero',$num_hogar);
    oci_bind_by_name($calle, ':id_cli',$id_cliente);

    $resultCalle = oci_execute($calle, OCI_COMMIT_ON_SUCCESS);

    $insertarCuenta = "INSERT INTO CUENTA(ID_TIPO_CUENTA,NUM_CUENTA,SALDO,FECHA_APERTURA) VALUES(:tipo, :num, :saldo, :fecha)";
    $cuenta = oci_parse($conexion, $insertarCuenta);
    $id_cuenta = +1;
    // oci_bind_by_name($cuenta, ':id_cu',$id_cuenta);
    // oci_bind_by_name($cuenta, ':id_cli',$id_cliente);
    oci_bind_by_name($cuenta, ':tipo',$tipo_cuenta);
    oci_bind_by_name($cuenta, ':num',$num_cuenta);
    oci_bind_by_name($cuenta, ':saldo',$saldo);
    oci_bind_by_name($cuenta, ':fecha',$fecha);
    
    $resultCuenta = oci_execute($cuenta, OCI_COMMIT_ON_SUCCESS);

        
    
    if ($resultCli &&  $insertarCalle && $resultCuenta) {
        echo "Datos insertados correctamente.";
    } else {
        $e = oci_error($stmt);
        $e = oci_error($cuenta);
        $e = oci_error($calle);
        echo "Error al insertar los datos: " . $e['message'];
    }
    
    oci_free_statement($stmt);
    oci_free_statement($cuenta);
    oci_free_statement($calle);
    oci_close($conexion);
?>
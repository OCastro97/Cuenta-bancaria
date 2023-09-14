<?php

require("../../php/conexion.php");
require('../../php/variablesGlobalesEmp.php');

    $id_empresa = 0;
    $id_cuenta = 0;
    $dir_emp=0;
    $id_calle=0;
    $id_serv = 1;

    $insertarEmpresa = "INSERT INTO EMPRESA (NOMBRE,ACRONIMO, NIF,TELEFONO,CORREO,PASS, ID_TIPO_CUENTA, ID_SERV)
    VALUES(:nom, :apell, :iden, :tel, :mail, :pass, :tipo_emp, :servicio)";
    $stmt = oci_parse($conexion, $insertarEmpresa);
        
    oci_bind_by_name($stmt, ':nom',$nombre_empr);
    oci_bind_by_name($stmt, ':apell',$acronimo_empr);
    oci_bind_by_name($stmt, ':iden',$nif_empr);
    oci_bind_by_name($stmt, ':tel',$telefono_empr);
    oci_bind_by_name($stmt, ':mail',$correo_empr);
    oci_bind_by_name($stmt, ':pass',$pass_empr);
    oci_bind_by_name($stmt, ':tipo_emp',$tipo_empr);
    oci_bind_by_name($stmt, ':servicio',$id_serv);  

    $resultEmpresa = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);

    $insertarCalleEmpresa = "INSERT INTO CALLE_EMPR (CALLE,TIPO_LOCAL,NUM_LOCAL) VALUES (:calle, :hogar, :numero)";
    $calleEmpresa = oci_parse($conexion, $insertarCalleEmpresa);

    oci_bind_by_name($calleEmpresa, ':calle',$calle_empr);
    oci_bind_by_name($calleEmpresa, ':hogar',$tipo_local);
    oci_bind_by_name($calleEmpresa, ':numero',$num_local);
    // oci_bind_by_name($calleEmpresa, ':id_emp',$id_empresa);

    $resultCalleEmpresa = oci_execute($calleEmpresa, OCI_COMMIT_ON_SUCCESS);

    $insertarCuentaEmpresa = "INSERT INTO CUENTA_EMP(ID_TIPO_CUENTA,NUM_CUENTA,SALDO, FECHA_APERTURA) VALUES(:tipo, :num, :saldo, :fecha)";
    $cuentaEmpresa = oci_parse($conexion, $insertarCuentaEmpresa);
    $id_cuenta = +1;
    // oci_bind_by_name($cuentaEmpresa, ':id_cu',$id_cuenta);
    // oci_bind_by_name($cuentaEmpresa, ':id_emp',$id_empresa);
    oci_bind_by_name($cuentaEmpresa, ':tipo',$id_tip_cuenta);
    oci_bind_by_name($cuentaEmpresa, ':num',$num_cuen_empr);
    oci_bind_by_name($cuentaEmpresa, ':saldo',$saldo_empr);
    oci_bind_by_name($cuentaEmpresa, ':fecha',$fecha_empr);
    
    $resultCuentaEmpresa = oci_execute($cuentaEmpresa, OCI_COMMIT_ON_SUCCESS);

    $insertDirEmpresa = "INSERT INTO DIR_EMPRESA(PROVINCIA,DISTRITO,CORREGIMIENTO) VALUES ( :prov_emp, :dist_emp, :corr_emo)";
    $dirEmpresa = oci_parse($conexion, $insertDirEmpresa);
    // oci_bind_by_name($dirEmpresa, ':dir_emp', $dir_emp);
    oci_bind_by_name($dirEmpresa, ':prov_emp', $prov_emp);
    oci_bind_by_name($dirEmpresa, ':dist_emp', $dist_emp);
    oci_bind_by_name($dirEmpresa, ':corr_emo', $correg_emp);
    // oci_bind_by_name($dirEmpresa, ':empresa', $id_empresa);

    $resultDirEmpresa = oci_execute($dirEmpresa, OCI_COMMIT_ON_SUCCESS);
    
    if ($resultEmpresa &&  $resultCalleEmpresa && $resultCuentaEmpresa && $resultDirEmpresa) {
        echo "Datos insertados correctamente.";
        ?>
        <a href="historial.php"></a>
        <?php
    } else {
        $e = oci_error($stmt);
        $e = oci_error($calleEmpresa);
        $e = oci_error($cuentaEmpresa);
        $e = oci_error($dirEmpresa);
        echo "Error al insertar los datos: " . $e['message'];
    }
    
    oci_free_statement($stmt);
    oci_free_statement($calleEmpresa);
    oci_free_statement($cuentaEmpresa);
    oci_free_statement($dirEmpresa);


    oci_close($conexion);
?>
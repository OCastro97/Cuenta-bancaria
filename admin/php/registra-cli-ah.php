<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>

<?php
require("../../php/conexion.php");
require('../../php/variablesGlobales.php');

    $id_cuenta = 3;
    $id_serv = 1;
    $id_ca = 3;
    
    $cliente = "SELECT secuencia_clientes.NEXTVAL FROM DUAL ";



    $insertarCliente = "INSERT INTO CLIENTES (ID_TIPO_CLI,NOMBRE,APELLIDO,IDENTIFICACION,TELEFONO,EMAIL,PASSW,GENERO,FECHA_NAC,ID_SERV)
    VALUES(:tipo, :nom, :apell, :iden,  :tel, :mail, :pass, :genero, :fecha_naci, :servicio)";
    $stmt = oci_parse($conexion, $insertarCliente);
        
    // $id_cliente = +3;
    // oci_bind_by_name($stmt, ':id',$id_cliente);
    oci_bind_by_name($stmt, ':tipo',$tipo_cli);
    oci_bind_by_name($stmt, ':nom',$nombre);
    oci_bind_by_name($stmt, ':apell',$apellido);
    oci_bind_by_name($stmt, ':iden',$identificacion);
    oci_bind_by_name($stmt, ':tel',$telefono);
    oci_bind_by_name($stmt, ':mail',$email);
    oci_bind_by_name($stmt, ':pass',$password);
    oci_bind_by_name($stmt, ':genero',$genero);
    oci_bind_by_name($stmt, ':fecha_naci',$fecha_naci);
    oci_bind_by_name($stmt, ':servicio',$id_serv);  

    $resultCli = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);
    
    if ($resultCli) {
        echo '<script> 
        swal("Nuevo paciente agregado");
        window.location="./form-clienteDir-ah.php";
            </script>';
    } else {
        $e = oci_error($stmt);
        echo "Error al insertar los datos: " . $e['message'];
    }
    
    oci_free_statement($stmt);


    oci_close($conexion);
?>
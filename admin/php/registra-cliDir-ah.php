<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>

<?php
require("../../php/conexion.php");
require('../../php/variablesGlobCuentaCli.php');

    $id_cuenta = 3;
    $id_serv = 1;
    $id_ca = 3;
try{

    $cliente = "SELECT MAX(ID_CLIENTE)AS CURRVAL FROM CLIENTES ";

    $buscaCli = oci_parse($conexion, $cliente);
    oci_execute($buscaCli);
    $row = oci_fetch_array($buscaCli, OCI_ASSOC);
    $id_cliente = $row['CURRVAL'];
    // echo $id_cliente;

    $insertarCalle = "INSERT INTO CALLE(CALLE,TIPO_HOGAR,NUM_HOGAR,ID_CLIENTE) VALUES (:calle, :hogar, :numero, :id_cli)";
    $calle = oci_parse($conexion, $insertarCalle);

    // oci_bind_by_name($calle, ':id_ca',$id_ca);
    oci_bind_by_name($calle, ':calle',$calleCl);
    oci_bind_by_name($calle, ':hogar',$tipo_hogar);
    oci_bind_by_name($calle, ':numero',$num_hogar);
    oci_bind_by_name($calle, ':id_cli',$id_cliente);

    $resultCalle = oci_execute($calle, OCI_COMMIT_ON_SUCCESS);

    $insertarCuenta = "INSERT INTO CUENTA(ID_TIPO_CUENTA, ID_CLIENTE, NUM_CUENTA, SALDO, FECHA_APERTURA) VALUES( :tipo,:id_cli, :num, :saldo, :fecha)";
    $cuenta = oci_parse($conexion, $insertarCuenta);

    // oci_bind_by_name($cuenta, ':id_cu',$id_cuenta);
    oci_bind_by_name($cuenta, ':id_cli',$id_cliente);
    oci_bind_by_name($cuenta, ':tipo',$tipo_cuenta);
    oci_bind_by_name($cuenta, ':num',$num_cuenta);
    oci_bind_by_name($cuenta, ':saldo',$saldo);
    oci_bind_by_name($cuenta, ':fecha',$fecha);
    
    $resultCuenta = oci_execute($cuenta, OCI_COMMIT_ON_SUCCESS);

    $insertarDir = "INSERT INTO DIRECCION_CLI(PROVINCIA,DISTRITO,CORREGIMIENTO, ID_CLIENTE) VALUES(:provincia, :distrito, :corregimiento, :id_cliente)";
    $dirCli = oci_parse($conexion, $insertarDir);
    $id_dir = +3;
    // oci_bind_by_name($dirCli, ':id_dir',$id_dir);
    oci_bind_by_name($dirCli, ':provincia',$provincia);
    oci_bind_by_name($dirCli, ':distrito',$distrito);
    oci_bind_by_name($dirCli, ':corregimiento',$corregimiento);
    oci_bind_by_name($dirCli, ':id_cliente',$id_cliente);
    
    $resultDir = oci_execute($dirCli, OCI_COMMIT_ON_SUCCESS);

    if ($resultCalle && $resultCuenta && $resultDir) {
                echo '<script> 
                swal("Nuevo paciente agregado");
                window.location="./historial.php";
                    </script>';
            } else {
                $e = oci_error($cuenta);
                $e = oci_error($calle);
                $e = oci_error($dirCli);
                echo "Error al insertar los datos: " . $e['message'];
    }
}catch(Exception $e){
    echo "Error" .$e->getMessage();
    oci_rollback($conexion);
}
    // $existeCli = "SELECT COUNT(*) AS existe FROM CLIENTES WHERE ID_CLIENTE = :d";
    // $stmtExiste = oci_parse($conexion, $existeCli);
    // oci_bind_by_name($stmtExiste, ':id', $id_cliente);
    // oci_execute($stmtExiste);
    // $rowExiste = oci_fetch_array($stmtExiste);

    // if($rowExiste['EXISTE']>0){
    //     $resultDir = oci_execute($dirCli, OCI_COMMIT_ON_SUCCESS);
    //     $resultCuenta = oci_execute($cuenta, OCI_COMMIT_ON_SUCCESS);
        
    //     if ($resultCalle && $resultCuenta && $resultDir) {
    //         echo '<script> 
    //         swal("Nuevo paciente agregado");
    //         window.location="./historial.php";
    //             </script>';
    //     } else {
    //         $e = oci_error($cuenta);
    //         $e = oci_error($calle);
    //         $e = oci_error($dirCli);
    //         echo "Error al insertar los datos: " . $e['message'];
    //     }
    // }


    oci_close($conexion);
?>
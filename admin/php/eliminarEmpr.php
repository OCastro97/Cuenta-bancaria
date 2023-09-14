<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    require("../../php/conexion.php");
    $id_cli = $_GET['id'];
    $eliminar = "DELETE FROM CLIENTES WHERE ID_CLIENTE = :id";
    $datos = oci_parse($conexion, $eliminar);

    oci_bind_by_name($datos, 'id',$id_cli);

    if(oci_execute($datos,OCI_COMMIT_ON_SUCCESS)){
        echo '<script> 
        swal("Ese Actualizo correctamente");
        window.location="./historial.php";
        </script>';
    } else{
        echo '<script> 
                swal("No se eliminó el registro"); 
                window.history.go(-1);
            </script>';
    }
    oci_free_statement($datos);
    


?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php 
    require("../../php/conexion.php");
    require("../../php/variablesGlobales.php");
    require("../../php/variablesGlobCuentaCli.php");

    $id_cli = $_POST['id_cli'];

    $actualizar = "UPDATE CLIENTES SET 

    NOMBRE=:nombre, 
    APELLIDO = :apellido, 
    IDENTIFICACION= :identificacion,
    TELEFONO= :telefono,
    EMAIL= :email,
    GENERO= :genero
    WHERE ID_CLIENTE= :id ";
    
    $resultado = oci_parse($conexion, $actualizar) ;

    oci_bind_by_name($resultado,':nombre', $nombre);
    oci_bind_by_name($resultado,':apellido', $apellido);
    oci_bind_by_name($resultado,':identificacion', $identificacion);
    oci_bind_by_name($resultado,':telefono', $telefono);
    oci_bind_by_name($resultado,':email', $email);
    oci_bind_by_name($resultado,':genero', $genero);
    oci_bind_by_name($resultado,':id', $id_cli);
    
if(oci_execute($resultado,OCI_COMMIT_ON_SUCCESS)){
    echo '<script> 
    swal("Ese Actualizo correctamente");
    window.location="./historial.php";
    </script>';
} else{
    echo '<script> 
                swal("No se Actualizo correctamente"); 
                window.history.go(-1);
        </script>';
}
oci_free_statement($resultado);

?>

<?php 

    include("footer.php");
?>
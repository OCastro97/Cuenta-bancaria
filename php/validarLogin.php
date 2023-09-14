<?php 

require("conexion.php");

$user = $_POST['nombre'];
$passw = $_POST['password'];


session_start();
ob_start();
$_SESSION['indice'] = $user;

$admin = "SELECT * FROM ADMINISTRADOR WHERE NOM_ADM='$user' AND PASS_ADM='$passw' ";
$usuarios = "SELECT * FROM CLIENTES WHERE EMAIL='$user' AND PASSW='$passw' ";

$respuestaAdmin = oci_parse($conexion, $admin);
$respuestaUser = oci_parse($conexion, $usuarios);

oci_execute($respuestaAdmin); 
oci_execute($respuestaUser); 

while($buscarAdmin = oci_fetch_assoc($respuestaAdmin)){
    
    if($buscarAdmin['ID_ROL'] == 1){
        header("location:../admin/php/historial.php");
    }
    else{
        echo '<script>
            alert("Contraseña o Usuario Incorrecto");
            window.history.go(-1);  
        </script>';
    }
    
}

while($buscarUser = oci_fetch_assoc($respuestaUser)){
    if($buscarUser['ID_ROL'] == 2){
            header("location:../client/php/historial.php");
    }
    else{
        echo '<script>
            alert("Contraseña o Usuario Incorrecto");
            window.history.go(-1);  
        </script>';
    }
}


oci_free_statement($respuestaAdmin);
oci_free_statement($respuestaUser);





oci_close($conexion);

?>
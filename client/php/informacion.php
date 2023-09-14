<?php
    include('header.php');
    require('../../conexion.php');

    session_start();
    ob_start();
    $indice = $_SESSION['indice'];

    $BDusuario = "SELECT * FROM CLIENTES WHERE EMAIL = '$indice' ";

    $mostrar = oci_parse($conexion, $BDusuario);
    
?>
<?php
    $HOST="localhost/System";
    $USER="PROYECTO_FINAL";
    $PASS="UP2020S1";

    $conexion = oci_connect($USER,$PASS,$HOST);
    

    if (!$conexion) {
        $m = oci_error();
        echo nl2br($m['message'], ".\n");
        exit;
    }
    
        oci_error($conexion);

?>
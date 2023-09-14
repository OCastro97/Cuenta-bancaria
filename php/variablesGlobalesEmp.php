<?php

    //datos de la empresa
    $nombre_empr = $_POST['nombre_emp'];
    $acronimo_empr = $_POST['acronimo'];
    $nif_empr = $_POST['nif'];
    $telefono_empr = $_POST['telefono_emp'];
    $correo_empr = $_POST['correo_emp'];
    $pass_empr = $_POST['contra_emp'];
    $tipo_empr = $_POST['tipo_empr'];
    $serv_empr = $_POST['servicio'];

    //datos de cuenta de la empresa
    $id_tip_cuenta = $_POST['tipo_cuent_emp'];
    $num_cuen_empr = $_POST['cuenta_emp'];
    $saldo_empr = $_POST['saldo_empr'];
    $fecha_empr = $_POST['fecha_emp'];

    //datos calle de la empresa
    $calle_empr = $_POST['calle_empr'];
    $tipo_local = $_POST['tipo_local'];
    $num_local = $_POST['num_local'];

    //direccion de la empresa
    $prov_emp = $_POST['prov_empr'];
    $dist_emp = $_POST['dist_empr'];
    $correg_emp = $_POST['correg_emp'];


?>
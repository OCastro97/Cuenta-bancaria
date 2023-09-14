<?php
    include("index.php");
    require("../../php/conexion.php");

    // session_start();
    // ob_start();
    $indice = $_SESSION['indice'];

    // $cuenta = "SELECT * FROM CLIENTES
    // INNER JOIN CUENTA ON CLIENTES.ID_CLIENTE = CUENTA.ID_CLIENTE WHERE EMAIL=:mail";
    // $cuentaIni = oci_parse($conexion, $cuenta);

    // oci_bind_by_name($cuentaIni, ':mail',$indice);
    // oci_execute($cuentaIni);

    // $mostrarCli = "SELECT * FROM TRANSACCIONES INNER JOIN CUENTA ON TRANSACCIONES.ID_CUENTA = CUENTA.ID_CUENTA
    // INNER JOIN TIPO_TRANSACCION ON TRANSACCIONES.ID_TIPO_TRANS = TIPO_TRANSACCION.ID_TIPO_TRANS WHERE EMAIL=:mail";
    $mostrarCli = "SELECT * FROM CLIENTES INNER JOIN CUENTA ON CLIENTES.ID_CLIENTE = CUENTA.ID_CLIENTE
    INNER JOIN TRANSACCIONES ON CLIENTES.ID_CLIENTE = TRANSACCIONES.ID_CLIENTE WHERE EMAIL=:mail";

    $ejecutar = oci_parse($conexion, $mostrarCli);

    oci_bind_by_name($ejecutar, ':mail',$indice);
    oci_execute($ejecutar); 

    $transaccion = "SELECT * FROM TRANSACCIONES INNER JOIN TIPO_TRANSACCION ON TRANSACCIONES.ID_TIPO_TRANS WHERE ID_TIPO_TRANS =  ";

    // oci_execute($cuenta);
?>


<div class="historial">
    <div class="container"> 
    <div class="form">
    <header>Historial de clientes</header><br>
    <br>

    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mi Cuenta</th>
                <th>Monto Enviado</th>
                <th>Cuenta Destino</th>
                <th>Tipo Transaccion</th>
                <th>Hora</th>
                <th>Fecha</th>

            </tr>
        </thead>
        <tbody>       
    <?php 
        
        if(oci_num_rows($ejecutar) != 0){
        ?>
        <td><h4>No hay registro</h4></td>
        <?php
        }else{
        
    $id = 0; 
        while($fila = oci_fetch_assoc($ejecutar) ){
            $id++; 
    ?><tr>  
            <td> <?php echo $id ?></td>
            <td><?php 
            
                echo $fila['NUM_CUENTA']; ?>
            
            </td>
            <td>$ <?php echo $fila['MONTO']; ?></td>
            <td> <?php echo $fila['CUENTA_DESTINO']; ?></td>
            <td>
                <?php 
                    if($fila['ID_TIPO_TRANS']==4){
                        echo "Pago";
                    } else if($fila['ID_TIPO_TRANS']==3){
                        echo "Transacción";
                    }else if($fila['ID_TIPO_TRANS']==2){
                        echo "Retiro";
                    }else{
                        echo "Depósito";
                    }
                ?>
            </td>
            <td> <?php echo $fila['HORA']; ?></td>
            <td> <?php echo $fila['FECHA'];?></td>
        <?php
        }
    }
    oci_free_statement($ejecutar);
    ?>
    </tr>
    </tbody>
    </table>
</div>
</div>

<?php
    include("footer.php");
?>
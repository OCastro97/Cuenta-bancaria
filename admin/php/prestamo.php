<?php
    include("dashboard.php");
    
    require("../../php/conexion.php");

    $mostrarCli = "SELECT * FROM CLIENTES 
                    INNER JOIN PRESTAMOS ON CLIENTES.ID_CLIENTE = PRESTAMOS.ID_CLIENTE";
    // $mostrarCuenta = "SELECT * FROM CUENTA";

    $ejecutar = oci_parse($conexion, $mostrarCli);
    // $cuenta = oci_parse($conexion, $mostrarCuenta);
    oci_execute($ejecutar); 
    // oci_execute($cuenta);
    
?>
<div class="historial">
    <div class="container"> 
    <div class="form">
    <header>Historial de Préstamos</header><br>
    <br>

    </div>
    <?php
    if(oci_num_rows($ejecutar) == 0){
        ?>
    <h4>No hay registro</h4>
    <?php
    }else{
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo Cliente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Ident</th>
                <th>Monto</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody>       
    <?php $id = 0; 
        while($fila = oci_fetch_assoc($ejecutar) ){
            $id++; 
    ?><tr>  
            <td> <?php echo $id ?></td>
            <?php if ($fila['ID_TIPO_CLI'] == 1001){?>
                    <td><p class="status public">
                        <?php echo $fila['ID_TIPO_CLI']='Público '; ?> </p></td>
                <?php } ?>
            <td> <?php echo $fila['NOMBRE']." "; ?></td>
            <td> <?php echo $fila['APELLIDO'] ."<br>"; ?></td>
            <td> <?php echo $fila['IDENTIFICACION'] ."<br>"; ?></td>
            <td> $ <?php echo $fila['MONTO'] ."<br>"; ?></td>
            <td> <?php echo $fila['DIRECCION'] ."<br>"; ?></td>
            <td> <?php echo $fila['TELEFONO'] ."<br>"; ?></td>
            <td> <?php echo $fila['EMAIL'] ."<br>"; ?></td>
            <td> 
                <a href="editar.php">Editar</a>
                <a href="editar.php">Elim</a>
            </td>
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
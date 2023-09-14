<?php
    include("dashboard.php");
    
    require("../../php/conexion.php");


    $mostrarCli = "SELECT * FROM CLIENTES
    INNER JOIN CUENTA ON CLIENTES.ID_CLIENTE = CUENTA.ID_CLIENTE
    INNER JOIN TIPO_CLIENTE ON CLIENTES.ID_TIPO_CLI = TIPO_CLIENTE.ID_TIPO_CLI
    INNER JOIN CALLE ON CLIENTES.ID_CLIENTE = CALLE.ID_CLIENTE";
    // $mostrarCuenta = "SELECT * FROM CUENTA";

    $ejecutar = oci_parse($conexion, $mostrarCli);
    // $cuenta = oci_parse($conexion, $mostrarCuenta);
    oci_execute($ejecutar); 
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
                <th>Tipo Cliente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Ident</th>
                <th># Cuenta</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Opción</th>
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
            <td> <?php echo $id; ?></td>
            <td><?php 
            
                echo $fila['DESCRIPCION']; ?>
            
            </td>
            <td> <?php echo $fila['NOMBRE']." "; ?></td>
            <td> <?php echo $fila['APELLIDO'] ."<br>"; ?></td>
            <td> <?php echo $fila['IDENTIFICACION'] ."<br>"; ?></td>
            <td> <?php echo $fila['NUM_CUENTA'] ."<br>"; ?></td>
            <td> <?php echo $fila['CALLE'] ."<br>"; ?></td>
            <td> <?php echo $fila['TELEFONO'] ."<br>"; ?></td>
            <td> <?php echo $fila['EMAIL'] ."<br>"; ?></td>
            <td> 
                <a href="./actualizarCliente.php?id=<?php echo $fila['ID_CLIENTE'];?>"><i class="fas fa-user-edit"></i></a>
                <a href="./eliminarCliente.php?id=<?php echo $fila['ID_CLIENTE'];?>"><i class="fas fa-trash-alt"></i></a>
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
<?php
include("header.php");
require("../../php/conexion.php");

session_start();
ob_start();
$indice = $_SESSION['indice'];
$cuenta = "SELECT * FROM CLIENTES WHERE EMAIL=:id";
$cuentaIni = oci_parse($conexion, $cuenta);

?>
<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxs-bank'></i>
      <span class="logo_name">Financiera IOD</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="historial.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Historial</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Historial</a></li>
        </ul>
      </li>
      
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Historial</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Historial</a></li>
          <li><a href="hist-transferencia.php">Transferencia</a></li>
          <li><a href="hist-pago.php">Pago</a></li>
          <li><a href="hist-deposito.php">Depósito</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="formulario.php">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Transacción</span>
          </a>
          <!-- <i class='bx bxs-chevron-down arrow' ></i> -->
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Transacción</a></li>
          <!-- <li><a href="deposito.php">Depósito</a></li>
          <li><a href="pago.php">Retiro</a></li>
          <li><a href="transferencia.php">Transferencia</a></li> -->
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Prestamo</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Préstamo</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Configuracion</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Configuracion</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="../../img/icono.png" alt="profileImg">
      </div>
      <div class="name-job">
        <?php 
        oci_bind_by_name($cuentaIni, 'id',$indice);
          oci_execute($cuentaIni);
          
          while($fila = oci_fetch_assoc($cuentaIni)){
        ?>
            <div class="profile_name"><?php echo $fila['NOMBRE'];  
            echo ' ';
            echo $fila['APELLIDO'];  
            ?></div>
        <div class="job"><?php echo $fila['IDENTIFICACION']; }?></div>
      </div>
      <a href="../../index.php">
        <i class='bx bx-log-out' ></i>
      </a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Bienvenido</span>
    </div>

    <div class="home">

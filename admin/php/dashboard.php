<?php
  require("../../php/conexion.php");
  include("header.php");
  
?>
<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxs-bank'></i>
      <span class="logo_name">Financiera IOD</span>
    </div>
    <ul class="nav-links">
      <li>
        <div class="iocn-link">
          <a href="historial.php">
          <i class='bx bx-grid-alt' ></i>
            <span class="link_name">Historial</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Historial</a></li>
          <li><a href="#">Ahorros</a></li>
          <li><a href="prestamo.php">Préstamos</a></li>
        </ul>
      </li>


      <li>
        <a href="cliente.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Nuevo Cliente</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Nuevo Cliente</a></li>
        </ul>
      </li>
      <li>
        <a href="mensajes.php">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Mensajes</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Mensajes</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="configuracion.php">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Configuración</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Configuración</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="../../img/icon.png" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Admin</div>
        <div class="job">Admin</div>
      </div>
      <a href="../../index.php">
      <i class='bx bx-log-out' >
        
        </i>
        </a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Admin</span>
    </div>

    <div class="home">

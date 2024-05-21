import React from 'react';
import './styles/styles.css';

function Sidebar() {
  return (
    <aside className="sidebar">
      <ul>
        <li><a href="#">Chat en Vivo</a></li>
        <li><a href="histrorial_solicitudes.html">Historial de Solicitudes</a></li>
        <li><a href="#">Configuración</a></li>
      </ul>
    </aside>
  );
}

export default Sidebar;

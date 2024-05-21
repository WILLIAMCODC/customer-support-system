import React from 'react';
import './styles/styles.css';

function Header() {
  return (
    <header>
      <div className="logo">
        <img src="logo.png"/>
      </div>
      <nav>
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </nav>
    </header>
  );
}

export default Header;

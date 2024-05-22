import React, { useEffect } from 'react';
import './styles/styles.css';

function Main() {
  useEffect(() => {
    function handleSubmit(event) {
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var message = document.getElementById("message").value;
    
      if (name === "" || email === "" || message === "") {
        alert("Por favor, complete todos los campos del formulario.");
        event.preventDefault(); 
      } else {
        alert("¡Formulario enviado correctamente!");
      }
    }

   
    document.getElementById("contactForm").addEventListener("submit", handleSubmit);

    
    return () => {
      document.getElementById("contactForm").removeEventListener("submit", handleSubmit);
    };
  }, []); 

  return (
    <main>
      <h1>Bienvenido al Software de Atención al Cliente</h1>
      <p>Este es un software diseñado para mejorar la experiencia del cliente al proporcionar herramientas eficientes para gestionar consultas, quejas y comentarios. Nuestro objetivo es garantizar la satisfacción del cliente al ofrecer un servicio rápido y eficaz.</p>
      
      <h2>Contacto</h2>
      <form id="contactForm">
        <label htmlFor="name">Nombre:</label>
        <input type="text" id="name" name="name" required /><br /><br />
        
        <label htmlFor="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required /><br /><br />
        
        <label htmlFor="message">Mensaje:</label><br />
        <textarea id="message" name="message" rows="4" required></textarea><br /><br />
        
        <button type="submit">Enviar</button>
      </form>
    </main>
  );
}

export default Main;


import logo from './logo.svg';
import './App.css';

import React from 'react';
import Header from './pagina_principal/Header';
import Sidebar from './pagina_principal/Sidebar';
import Main from './pagina_principal/Main';
import Footer from './pagina_principal/Footer';

function App() {
  return (
    <div className="app">
      <Header />
      <Sidebar />
      <Main />
      <Footer />
    </div>
  );
}



export default App;
<?php
session_start();

class Conectar {
    protected $dbh;

    protected function Conexion() {
        try {
            $this->dbh = new PDO("mysql:host=localhost;dbname=servicio_al_cliente_db", "root", "");
            return $this->dbh;
        } catch (Exception $e) {
            print "Error BD: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public static function ruta(){
        return "http://localhost:80/Atencion_Cliente/";
    }
}
?>

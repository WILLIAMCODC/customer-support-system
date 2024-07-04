<?php
require_once("config/conexion.php");

class Usuario extends Conectar {
    
    public function register($usu_nom, $usu_ape, $usu_correo, $usu_pass) {
        try {
            $conectar = $this->Conexion();
            $this->set_names();
        
            $password_hash = password_hash($usu_pass, PASSWORD_BCRYPT);
            $estado = 1;
        
            $sql = "INSERT INTO tm_usuario (usu_nom, usu_ape, usu_correo, usu_pass, est) VALUES (:usu_nom, :usu_ape, :usu_correo, :usu_pass, :est)";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(':usu_nom', $usu_nom);
            $stmt->bindParam(':usu_ape', $usu_ape);
            $stmt->bindParam(':usu_correo', $usu_correo);
            $stmt->bindParam(':usu_pass', $password_hash);
            $stmt->bindParam(':est', $estado);
        
            if ($stmt->execute()) {
                echo "Registro exitoso";
            } else {
                echo "Error al registrar usuario";
            }
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }
}



?>

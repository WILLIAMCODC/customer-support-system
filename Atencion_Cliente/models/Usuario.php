<?php
require_once("config/conexion.php");

class Usuario extends Conectar {
    
    public function login(){
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            if (empty($correo) and empty($pass)) {
                header("Location:" . conectar::ruta() . "index.php?m=2");
            } else {
                $sql = "SELECT * FROM tm_usuario WHERE usu_correo = ? and usu_pass = ? and est=1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $pass);
                $stmt->execute();
                $resultado = $stmt->fetch();
                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_ape"] = $resultado["usu_ape"];
                    header("Location: " . Conectar::ruta() . "view/Home/");
                    exit();
                } else {
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }

    public function register($usu_nom, $usu_ape, $usu_correo, $usu_pass) {
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
    }
    
}
?>

<?php

class Ticket extends Conectar {

    public function insert_ticket($usu_id, $cat_id, $tick_titulo, $ticket_descrip) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_ticket (tick_id, usu_id, cat_id, tick_titulo, ticket_descrip, est) VALUES (NULL, ?, ?, ?, ?, '1');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->bindValue(2, $cat_id);
        $sql->bindValue(3, $tick_titulo);
        $sql->bindValue(4, $ticket_descrip);

        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listar_ticket_x_usu($usu_id) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
                    tm_ticket.tick_id,
                    tm_ticket.usu_id,
                    tm_ticket.cat_id,
                    tm_ticket.tick_titulo,
                    tm_ticket.ticket_descrip,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_ape,
                    tm_categoria.cat_nom
                FROM
                    tm_ticket
                INNER JOIN tm_categoria ON tm_ticket.cat_id = tm_categoria.cat_id
                INNER JOIN tm_usuario ON tm_ticket.usu_id = tm_usuario.usu_id
                WHERE
                    tm_ticket.est = 1
                    AND tm_usuario.usu_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $sql->fetchAll();
    }
}
?>
 
<?php

class MedicoModel {
    public function PegarTodos() {
        global $conn;
        $sql = "SELECT * FROM medico";
        $select = $conn-> prepare($sql);
        $select-> execute();
        $result = $select->fetchAll();
        return $result;
    }

    public function PegarHorariosMedico($id_medico) {
        global $conn;
        $sql = "SELECT * FROM horario WHERE id_medico = :id_medico";
        $select = $conn-> prepare($sql);
        $select-> bindParam(":id_medico", $id_medico, PDO::PARAM_INT);
        $select-> execute();
        $result = $select->fetchAll();
        return $result;
    }
}
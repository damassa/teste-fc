<?php

class HorarioModel {
  public function PegarHorariosMedico($id_medico) {
    global $conn;
    $sql = "SELECT id, data_horario, horario_agendado FROM horarios WHERE id_medico = :id_medico";
    $select = $conn-> prepare($sql);
    $select->bindParam(":id_medico", $id_medico, PDO::PARAM_INT);
    $select-> execute();
    $result = $select->fetchAll();
    return $result;
  }

  public function PegarUm($id) {
    global $conn;
    $sql = "SELECT id, data_horario, horario_agendado FROM horarios WHERE id = :id";
    $select = $conn->prepare($sql);
    $select->bindParam(":id", $id, PDO::PARAM_INT);
    $select-> execute();
    $result = $select->fetch();
    return $result;
  }

  public function DeletarUm($id) {
    global $conn;
    $sql = "DELETE FROM horarios where id = :id";
    $delete = $conn->prepare($sql);
    $delete->bindParam(":id", $id, PDO::PARAM_INT);
    return $delete->execute();
  }

  public function CriarHorario($id_medico, $data_horario) {
    global $conn;
    $sql = "INSERT INTO `horarios` (id_medico, data_horario) VALUES (:ID_MEDICO, :DATA_HORARIO)";
    $insert = $conn->prepare($sql);
    $insert->bindParam(":ID_MEDICO", $id_medico, PDO::PARAM_INT);
    $insert->bindParam(":DATA_HORARIO", $data_horario, PDO::PARAM_INT);
    return $insert-> execute();
  }
}
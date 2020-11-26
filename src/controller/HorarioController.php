<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/model/HorarioModel.php";

class HorarioController {
  public function PegarHorarios($medico) {
    $horario = new HorarioModel();
    return $horario->PegarTodosHorariosMedico($medico);
  }

  public function RemoverHorario($id) {
    $horario = new HorarioModel();
    $horario_temp = $horario->PegarUm($id);

    if($horario_temp["horario_agendado"] == 1) {
      CriaAlerta("erro", "Horário já agendado. Exclusão não permitida!");
      return false;
    }

    if($horario->DeletarUm($id)) {
      CriaAlerta("sucesso", "Horário deletado com sucesso!");
      return true;
    } else {
      CriaAlerta("erro", "Erro na remoção!");
      return false;
    }
  }

  public function AdicionarHorario($id_medico, $data_horario) {
    $horario = new HorarioModel();

    $teste_data = new DateTime($data_horario);
    if($teste_data->diff(new DateTime())->format("%R") == "+") {
      CriaAlerta("erro", "Horários passados não podem ser cadastrados!");
      return false;
    }

    if($horario->CriarHorario($id_medico, $data_horario)) {
      CriaAlerta("sucesso", "Horário cadastrado!");
      return true;
    } else {
      CriaAlerta("erro", "Erro ao atribuir horário!");
      return false;
    }
  }

  public function AgendarHorario($id) {
    $horario = new HorarioModel();

    if ($horario->TrocarHorarioAgendado($id, 1)) {
      CriaAlerta("sucesso", "Horário agendado!");
      return true;
    } else {
      CriaAlerta("erro", "Erro! Horário já agendado!");
      return false;
    }
  }
}
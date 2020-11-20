<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/model/MedicoModel.php";

class MedicoController {
    public function Listagem() {
        $medico = new MedicoModel();
        $medicos = $medico->PegarTodos();
        foreach ($medicos as $id => $valor) {
            $medicos[$id]["horarios"] = $medico->PegarHorariosMedico($valor["id"]);
        }
        return $medicos;
    }
}
<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/model/MedicoModel.php";
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/conexao.php";

class MedicoController {
    public function Listagem() {
        $medico = new MedicoModel();
        $medicos = $medico->PegarTodos();

        foreach ($medicos as $id => $valor) {
            $medicos[$id]["horarios"] = $medico->PegarHorariosMedico($valor["id"]);
        }

        return $medicos;
    }

    public function Cadastro($email, $nome, $senha) {
        $medico = new MedicoModel();
        $senha_encript = password_hash($senha, PASSWORD_DEFAULT);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if(strlen($senha) < 6) {
            echo"Senha com poucos caracteres!";
            return false;
        }

        $medico->CadastrarMedico($email, $nome, $senha_encript);
    }
}
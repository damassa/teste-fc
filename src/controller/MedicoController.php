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

        if(strlen($nome) && strlen($senha) < 6) {
            echo"Nome ou senha com poucos caracteres!";
            return false;
        }

        $medico->CadastrarMedico($email, $nome, $senha_encript);
    }

    public function Atualizar($email, $nome, $senha) {
        $medico = new MedicoModel();
        $senha_encript = password_hash($senha, PASSWORD_DEFAULT);

        if(strlen($nome) && strlen($senha) < 6) {
            echo"Nome ou senha com poucos caracteres!";
            return false;
        }

        $medico->AtualizarMedico($email, $nome, $senha_encript);
    }
}
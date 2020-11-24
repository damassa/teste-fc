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

    public function Atualizar($id, $nome, $senha, $senha_nova) {
        $medico = new MedicoModel();
        
        $senha_antiga = $medico->PegarSenha($id);

        if(!password_verify($senha_antiga, $senha_nova)) {
            return false;
        }

        $senha_encript = password_hash($senha_nova, PASSWORD_DEFAULT);

        if(strlen($nome) && strlen($senha_nova) < 6) {
            echo"Nome ou senha com poucos caracteres!";
            return false;
        }

        return $medico->AtualizarMedico($id, $nome, $senha_encript);
    }

    public function BuscarUmMedico($id) {
        $medico = new MedicoModel();
        return $medico->PegarUm($id);
    }
}
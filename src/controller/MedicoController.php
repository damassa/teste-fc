<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/model/MedicoModel.php";

class MedicoController {
    public function Listagem() {
        $medico = new MedicoModel();
        $medicos = $medico->PegarTodos();

        foreach ($medicos as $id => $valor) {
            $medicos[$id]["horarios"] = HorarioModel::PegarHorariosMedico($valor["id"]);
        }

        return $medicos;
    }

    public function Cadastro($email, $nome, $senha) {
        $medico = new MedicoModel();
        $senha_encript = password_hash($senha, PASSWORD_DEFAULT);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            CriaAlerta("erro","E-mail inválido!");
            return false;
        }

        if(strlen($nome) < 6 || strlen($senha) < 6) {
            CriaAlerta("erro","Nome ou senha com poucos caracteres!");
            return false;
        }

        if($medico->CadastrarMedico($email, $nome, $senha_encript)) {
            CriaAlerta("sucesso", "Médico cadastrado com sucesso!");
            return true;
        } else {
            CriaAlerta("erro", "Erro inesperado!");
            return false;
        }
    }

    public function Atualizar($id, $nome, $senha, $senha_nova) {
        $medico = new MedicoModel();
        
        $senha_antiga = $medico->PegarSenha($id);

        if($senha_antiga === $senha_nova) {
            CriaAlerta("erro", "Senhas iguais! Por favor, troque a senha");
        }

        if(!password_verify($senha, $senha_antiga)) {
            CriaAlerta("erro","Senha inválida");
            return false;
        }

        $senha_encript = password_hash($senha_nova, PASSWORD_DEFAULT);

        if(strlen($nome) < 6 || strlen($senha_nova) < 6) {
            CriaAlerta("erro","Nome ou senha com poucos caracteres!");
            return false;
        }

        if($medico->AtualizarMedico($id, $nome, $senha_encript)) {
            CriaAlerta("sucesso", "Médico alterado com sucesso!");
            return true;
        } else {
            CriaAlerta("erro", "Erro inesperado!");
            return false;
        }
    }

    public function BuscarUmMedico($id) {
        $medico = new MedicoModel();
        return $medico->PegarUm($id);
    }
}
<?php

class MedicoModel {
    public function PegarTodos() {
        global $conn;
        $sql = "SELECT medicos.`id`, nome
        FROM medicos 
        LEFT JOIN horarios ON medicos.`id` = horarios.`id_medico` AND horarios.`data_horario` = (
            SELECT min(data_horario) FROM horarios AS h WHERE h.`id_medico` = medicos.`id` AND h.`horario_agendado` = 0 AND h.`data_horario` >= NOW()
        )
        WHERE data_horario IS NOT NULL
        ORDER BY horarios.`data_horario` ASC";
        $select = $conn-> prepare($sql);
        $select-> execute();
        $result = $select->fetchAll();
        return $result;
    }

    public function PegarUm($id) {
        global $conn;
        $sql = "SELECT * FROM medicos WHERE `id` = :id";
        $select = $conn-> prepare($sql);
        $select->bindParam(":id", $id, PDO::PARAM_INT);
        $select-> execute();
        $result = $select->fetch();
        return $result;
    }

    public function PegarSenha($id) {
        global $conn;
        $sql = "SELECT `senha` FROM medicos WHERE `id` = :id";
        $select = $conn-> prepare($sql);
        $select->bindParam(":id", $id, PDO::PARAM_INT);
        $select-> execute();
        $result = $select->fetch();
        return $result["senha"];
    }

    public function CadastrarMedico($email, $nome, $senha) {
        global $conn;

        $sql = "INSERT INTO `medicos`(`email`, `nome`, `senha`) 
        VALUES (:EMAIL, :NOME, :SENHA)";
        
        $insert = $conn->prepare($sql);
        $insert->bindParam(":EMAIL", $email);
        $insert->bindParam(":NOME", $nome);
        $insert->bindParam(":SENHA", $senha);

        return $insert->execute();
    }

    public static function AtualizarMedico($id, $nome, $senha) {
        global $conn;

        $sql = "UPDATE `medicos` SET  
        `nome` = :NOME, `senha` = :SENHA 
        WHERE `id` = :ID";

        $update = $conn->prepare($sql);
        $update->bindParam(":ID", $id);
        $update->bindParam(":NOME", $nome);
        $update->bindParam(":SENHA", $senha);

        return $update->execute();
    }

    public static function DeletarUmMedico($id) {
        $sql = "DELETE FROM `medicos` WHERE `id` = :ID";
    
        $delete = $conn->prepare($sql);
        $delete->bindParam(":ID", $id);
    
        return $delete->execute();
    }
}
<?php

class MedicoModel {
    public function PegarTodos() {
        global $conn;
        $sql = "SELECT * FROM medicos";
        $select = $conn-> prepare($sql);
        $select-> execute();
        $result = $select->fetchAll();
        return $result;
    }

    public function PegarHorariosMedico($id_medico) {
        global $conn;
        $sql = "SELECT * FROM horarios WHERE id_medico = :id_medico";
        $select = $conn-> prepare($sql);
        $select-> bindParam(":id_medico", $id_medico, PDO::PARAM_INT);
        $select-> execute();
        $result = $select->fetchAll();
        return $result;
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

    public static function AtualizarMedico($id, $email, $nome, $senha) {
        global $conn;

        $sql = "UPDATE `medicos` SET  
        `email` = :EMAIL, `nome` = :NOME, `senha` = :SENHA 
        WHERE `id` = $id";

        $update = $conn->prepare($sql);
        $update->bindParam(":EMAIL", $email);
        $update->bindParam(":NOME", $nome);
        $update->bindParam(":SENHA", $senha);

        return $insert->execute();
    }

    public static function DeletarUmMedico($id) {
        $sql = "DELETE FROM `medicos` WHERE `id` = :ID";
    
        $delete = $conn->prepare($sql);
        $delete->bindParam(":ID", $id);
    
        return $delete->execute();
    }
}
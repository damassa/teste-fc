<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/controller/MedicoController.php";

if(MedicoController::Cadastro($_POST["email"], $_POST["nome"], $_POST["senha"])) {
    header("Location: ../../index.php?cadastrado=true");
} else {
    header("Location: cadastro_medico.php?erro=true");
}
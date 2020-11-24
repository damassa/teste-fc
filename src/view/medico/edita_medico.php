<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/controller/MedicoController.php";

if(MedicoController::Atualizar($_POST["id"], $_POST["nome"], $_POST["senha"], $_POST["senha_nova"])) {
    header("Location: ../../index.php?alterado=true");
} else {
    header("Location: altera_medico.php?erro=true&id=".$_POST["id"]);
}
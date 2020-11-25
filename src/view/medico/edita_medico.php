<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/utils/header-imports.php";

if(MedicoController::Atualizar($_POST["id"], $_POST["nome"], $_POST["senha"], $_POST["senha_nova"])) {
    header("Location: ../../index.php");
} else {
    header("Location: altera_medico.php?id=".$_POST["id"]);
}
<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/utils/header-imports.php";

if(MedicoController::Cadastro($_POST["email"], $_POST["nome"], $_POST["senha"])) {
    header("Location: ../../index.php");
} else {
    header("Location: cadastro_medico.php");
}
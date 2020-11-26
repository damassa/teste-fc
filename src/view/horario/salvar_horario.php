<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/utils/header-imports.php";

HorarioController::AdicionarHorario($_POST["id_medico"], $_POST["data_horario"]);
header("Location: ".$_SERVER["HTTP_REFERER"]);
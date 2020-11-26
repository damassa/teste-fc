<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/utils/header-imports.php";

HorarioController::AgendarHorario($_GET["id"]);
header("Location: ".$_SERVER["HTTP_REFERER"]);
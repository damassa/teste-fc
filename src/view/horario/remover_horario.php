<?php
include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/utils/header-imports.php";

HorarioController::RemoverHorario($_GET["id"]);
header("Location: ".$_SERVER["HTTP_REFERER"]);
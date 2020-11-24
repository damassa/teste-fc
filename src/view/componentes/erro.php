<?php 
if($_SESSION["erro"]) {
    echo $_SESSION["erro"];
    $_SESSION["erro"] = false;
}
?>    
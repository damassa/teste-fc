<?php 

if($_COOKIE["erro"]) {
    echo $_COOKIE["erro"];
    setcookie("erro", false, 0);
}

?>    
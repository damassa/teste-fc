<?php 

if($_COOKIE["erro"]) {
    echo "<div class='snackbar erro'>".$_COOKIE["erro"]."</div>";
    CriaAlerta("erro", false, 0);
}

if($_COOKIE["sucesso"]) {
    echo "<div class='snackbar sucesso'>".$_COOKIE["sucesso"]."</div>";
    CriaAlerta("sucesso", false, 0);
}

?>    
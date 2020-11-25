<?php

function CriaAlerta($tipo, $texto, $tempo = 60) {
    return setcookie($tipo, $texto, time()+$tempo, "/");
}
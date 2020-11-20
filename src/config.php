<?php

define("BASE_URL", "http://localhost/teste-fc/src/");

$db_server = 'localhost';
$db_name = 'consultorio';
$db_user = 'root';
$db_password = 'root';

$conn = new PDO(
    'mysql:host='.$db_server.';dbname='.$db_name.'', 
    $db_user, 
    $db_password
);

$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("set names utf8");

?>
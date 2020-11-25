<?php 
    include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/utils/header-imports.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://facilconsulta.com.br/site/assets/img/favicon/favicon-32x32.png" sizes="32x32">

    <link rel="stylesheet" href="<?=BASE_URL?>/view/styles/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <title>Teste Fácil Consulta</title>
</head>
<body>
    <header>
        <div class="headerContainer">
            <a class="botaoCadastro" href="<?=BASE_URL?>view/medico/cadastro_medico.php">Cadastro de médico</a>
        </div>
    </header>
<?php
    include $_SERVER["DOCUMENT_ROOT"]."/teste-fc/src/view/componentes/alertas.php";
?>
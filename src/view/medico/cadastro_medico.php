<?php 
require "../componentes/header.php";
?>

<div class="cadastroCard">
    <h1>Cadastro de médico</h1>
    <form method="post" action="salva_medico.php">
        <div class="labelForm">
            <label class="formLabel" for="name">Nome:</label>
        </div>
        <div class="inputForm"> 
            <input type="text" name="nome" placeholder="Insira o nome do profissional" required />
        </div>
        <div class="labelForm">
            <label class="formLabel" for="name">E-mail:</label>
        </div>
        <div class="inputForm">
            <input type="email" name="email" placeholder="exemplo@dominio.com.br" required />
        </div>
        <div class="labelForm">
            <label class="formLabel" for="name">Senha:</label>
        </div>
        <div class="inputForm">
            <input type="password" name="senha" placeholder="Escolha uma senha forte e segura" required />
        </div>
        <div class="buttonsForm">
            <div class="botaoContainer">
                <button type="submit">Realizar cadastro</button>
            </div>
            <div class="voltarContainer">
                <a href="<?=BASE_URL?>index.php">Voltar para a página inicial</a>
            </div>
        </div>
    </form>
</div>

<?php require "../componentes/rodape.php" ?>

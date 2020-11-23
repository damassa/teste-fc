<?php 
require "../componentes/header.php";
if($_GET["erro"]) {
    echo "Erro! E-mail ou senha inválidos!";
}
?>

<div class="cadastroCard">
    <h1>Cadastro de Médico</h1>
    <form method="post" action="salva_medico.php">
        <label for="name">Nome:</label>
        <input type="text" name="nome" required />
        <label for="name">E-mail:</label>
        <input type="email" name="email" required />
        <label for="name">Senha:</label>
        <input type="password" name="senha" required />
        <button type="submit">Realizar cadastro</button>
    </form>
</div>

<?php require "../componentes/rodape.php" ?>

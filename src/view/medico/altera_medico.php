<?php 
require "../componentes/header.php";
$medico = MedicoController::BuscarUmMedico($_GET["id"]);
?>

<div class="cadastroCard">
<h1>Editar médico</h1>
    <form method="post" action="edita_medico.php">
        <input type="hidden" name="id" value="<?=$medico["id"]?>" />
        
        <div class="labelForm">
            <label class="formLabel" for="name">Nome:</label>
        </div>
        <div class="inputForm"> 
            <input type="text" name="nome" placeholder="Insira o nome do profissional" value="<?=$medico["nome"]?>" required />
        </div>
        <div class="labelForm">
            <label class="formLabel" for="senha">Senha antiga:</label>
        </div>
        <div class="inputForm">
            <input type="password" name="senha" placeholder="Insira a senha antiga" required />
        </div>
        <div class="labelForm">
            <label class="formLabel" for="senha_nova">Senha nova:</label>
        </div>
        <div class="inputForm">
            <input type="password" name="senha_nova" placeholder="Insira a nova senha" required />
        </div>
        <div class="buttonsForm">
            <div class="botaoContainer">
                <button type="submit">Atualizar cadastro</button>
            </div>
            <div class="voltarContainer">
                <a href="<?=BASE_URL?>index.php">Voltar para a página inicial</a>
            </div>
        </div>
    </form>
    </div>
</div>

<?php require "../componentes/rodape.php" ?>
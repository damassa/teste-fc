<?php 
require "../componentes/header.php";
$medico = MedicoController::BuscarUmMedico($_GET["id"]);

?>

<div class="configContainer"> 
    <div class="addHorarioCard">
        <h1>Adicionar horários</h1>
        <div class="addHorarioDados">
            <strong>Nome: </strong>
            <h2><?=$medico["nome"]?></h2>
            <strong>Data e hora</strong>
            <form action="add_horario.php" method="post" id="form-horario">
                <input type="datetime-local" />
                <div class="buttonsForm">
                    <div class="botaoContainer">
                        <button type="submit">Adicionar horário</button>
                    </div>
                    <div class="voltarContainer">
                        <a href="<?=BASE_URL?>">Voltar para a página inicial</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="configHorarioCard">
        <h1>Horários configurados</h1>
        <div class="listaHorariosCard">
            <div class="listaHorarioContainer">
                <div class="listaHorarioContainerInfo">
                    <div class="horario">
                        <span>26/11/2020 07:00</span>
                    </div>
                    <div class="removerHorario">
                        <a href="">Remover</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#form-horario").submit(function(event){
        event.preventDefault();
        console.log("Foi");
    })
</script>
<?php require "../componentes/rodape.php" ?>
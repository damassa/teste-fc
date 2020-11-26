<?php 
require "../componentes/header.php";
$medico = MedicoController::BuscarUmMedico($_GET["medico"]);
$horarios = HorarioController::PegarHorarios($_GET["medico"]);

?>

<div class="configContainer"> 
    <div class="addHorarioCard">
        <h1>Adicionar horários</h1>
        <div class="addHorarioDados">
            <strong>Nome: </strong>
            <h2><?=$medico["nome"]?></h2>
            <strong>Data e hora</strong>
            <form action="salvar_horario.php" method="post" id="form-horario">
                <input type="hidden" name="id_medico" value=<?=$medico["id"]?> />
                <input type="datetime-local" name="data_horario" />
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
                <?php foreach($horarios as $horario) {?>
                    <div class="listaHorarioContainerInfo">
                        <div class="horario">
                            <span>
                                <?=date("d/m/Y H:i", strtotime($horario["data_horario"]))?>
                            </span>
                        </div>
                        <?php if ($horario["horario_agendado"] == 0) {?>
                            <div class="removerHorario">
                                <a href="remover_horario.php?id=<?=$horario["id"]?>">
                                    Remover
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>    
            </div>
        </div>
    </div>
</div>
<?php require "../componentes/rodape.php" ?>
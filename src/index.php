<?php 

require "view/componentes/header.php"; 
$medicos = MedicoController::Listagem();

?>

<div class="listCard">
    <?php forEach($medicos as $medico) {?>
        <div class="medicoCard">
            <div class="opcoesCard">
                <h1><?=$medico["nome"]?></h1>
                <div class="controleCard">
                    <a href="<?=BASE_URL?>view/medico/altera_medico.php?id=<?=$medico["id"]?>">
                        Editar cadastro
                    </a>
                    <a href="<?=BASE_URL?>view/horario/configurar_horario.php?medico=<?=$medico["id"]?>">
                        Configurar horários
                    </a>
                </div>
            </div>
            <div class="horarioCard">
                <?php forEach($medico["horarios"] as $horario) {?>
                    <a title="Agendar horário" href="agendar_horario.php?id=<?=$horario["id"]?>">
                        <?=date("d/m/Y \à\s\ H:i",strtotime($horario["data_horario"]))?>
                    </a>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php require "view/componentes/rodape.php"; ?>
<?php 
require "view/componentes/header.php"; 
$medicos = MedicoController::Listagem();
?>

<div class="listCard">
    <?php forEach($medicos as $medico) {?>
        <div class="medicoCard">
            <h1><?=$medico["nome"]?></h1>
            <a href="<?=BASE_URL?>view/medico/edicao_medico.php?id=<?=$medico["id"]?>">
                Editar cadastro
            </a>
            <a href="<?=BASE_URL?>view/horario/configurar_horario.php?medico=<?=$medico["id"]?>">
                Configurar horários
            </a>
            <div class="horarioCard">
                <?php forEach($medico["horarios"] as $horario) {?>
                    <span><?=date("d/m/Y \à\s\ H:i",strtotime($horario["data_horario"]))?></span>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php require "view/componentes/rodape.php"; ?>
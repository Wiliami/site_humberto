<?php
$Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :id", "id={$Modulos['modulo_id']}");
if($Read->getResult()) {
    foreach($Read->getResult() as $Aula) {
    }
}
?>
<!-- código de busca de módulos e cursos do banco de dados este código é para a página de aulas -->
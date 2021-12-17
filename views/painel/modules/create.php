<?php
$Read = new Read();
$Read->FullRead('SELECT * FROM modulos');
if($Read->getResult()) {
    $this->Error = 'Não existe modulos';
    $this->Result = false;
}

// Módulos de cursos
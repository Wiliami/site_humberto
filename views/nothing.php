
<?php

function myAutoload() {
    $cDir = [];
    $iDir = null;
    foreach($cDir as $dirName) {
        $File = _DIR_ . '/' . $dirName . '/' . $class . '.class.php';
        if(!$cDir && file_exists($File) && !is_dir($File)) {
            include_once($File);
            $iDir = true;
        }
    }
}

spl_autoload_register(myAutoload());

?>
<?php

$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();

echo $Component->getHeadHtmlPags();
echo $Component->getMenuAndSideBarDashboard();  
?>
Conteudo
<?php
echo $Component->getFooterDashboard();

?>

            

           
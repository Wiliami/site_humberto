<?php

$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();

echo $Component->getHeadHtmlPages();
echo $Component->getMenuAndSideBarDashboard();
echo $Component->getBarraMenuOptions();
?>
Configurações
<?php
echo $Component->getFooterDashboard();

?>

       
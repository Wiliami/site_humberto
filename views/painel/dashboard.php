<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getMenuAndSideBarDashboard2();
echo $Component->getBarraMenuOptions();
echo $Component->getFooterDashboard();
?>

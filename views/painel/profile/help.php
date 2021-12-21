<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getMenuAndSideBarDashboard();
echo $Component->getFooterDashboard();
?>
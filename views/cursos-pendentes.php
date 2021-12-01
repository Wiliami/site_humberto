<?php

$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();

echo $Component->getHeadHtmlPages();
echo $Component->getMenuAndSideBarDashboard();
?>
Cursos pendentes
<?php
echo $Component->getFooterDashboard();

?>

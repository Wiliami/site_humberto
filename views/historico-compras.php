<?php

$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();

echo $Component->getHeadHtmlPags();
echo $Component->getMenuAndSideBarDashboard();
echo $Component->getBarraMenuOptions();  
?>

<h3 style="margin-left: 30px;">Historico de compras de cursos</h3>

<?php

echo $Component->getFooterDashboard();

?>


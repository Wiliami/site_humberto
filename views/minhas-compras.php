<?php

$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlPages();
echo $Component->getMenuAndSideBarDashboard();
echo $Component->getBarraMenuOptions();
?>
Minhas compras
<?php

echo $Component->getFooterDashboard();

?>

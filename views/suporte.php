<?php

$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();

echo $Component->getHeadHtmlPages();
echo $Component->getMenuAndSideBarDashboard();
echo $Component->getBarraMenuOptions();  
?>

<h3 style="margin-left: 30px;">Suporte</h3>

<?php

echo $Component->getFooterDashboard();

?>

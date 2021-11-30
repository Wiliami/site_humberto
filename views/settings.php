<?php

$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();

echo $Component->getHeadHtmlPags();
echo $Component->getMenuAndSideBarDashboard();
?>
Settings
<?php
echo $Component->getFooterDashboard();

?>

       
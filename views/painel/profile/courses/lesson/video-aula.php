<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();


$Read = new Read();
$Read->FullRead("SELECT * FROM aulas");
if($Read->getResult()) {
    $DataLesson = $Read->getResult()[0];
} else {
    die(Error('Aula não encontrada!', ''));
}

?>
<div class="container">
    <!-- <nav class="navbar navbar-light bg-light"> -->
        <na class="navbar navbar-expand navbar-light bg-success static-top shadow d-flex align-items-center justify-content-center justify-content-md-between" title="Voltar para aula anterior">
            <div class="container-fluid">
                <a href="<?= BASE ?>/painel/profile/courses/lesson/details&p=<?= $DataLesson['aula_id'] ?>" class="navbar-brand d-flex flex-column text-start text-white">
                    Anterior 
                    <i class="fas fa-solid fa-angle-left"></i>
                </a>
                <i class="fas fa-solid fa-pipe"></i>
                <a href="<?= BASE ?>/painel/profile/courses/lesson/details&n=<?= $DataLesson['aula_id'] ?>"class="navbar-brand d-flex flex-column text-end text-white btn-sm" title="Avançar para próxima aula">
                    Avançar
                    <i class="fas fa-solid fa-angle-right"></i>
                </a>
            </div>
        </na>
    <!-- </nav> -->

    <div class="">
        <video id="video-aula" poster="" width="100%" controls prealod="none">
            <source src="<?= BASE ?>/src/video/humberto.mp4" type="video/mp4">     
        </video>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
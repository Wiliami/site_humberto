<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
$Username = $_SESSION['login']['user_name'];
// $aulaId = filter_input(INPUT_GET, 'a', FILTER_VALIDATE_INT);

// $Read = new Read();
// $Read->FullRead('SELECT * FROM aulas WHERE aula_id = :ai', "ai={$aulaId}");
// if($Read->getResult()) {
//     $DataLesson = $Read->getResult()[0];
//     $courseId = $DataLesson['curso_id'];
// } else {
//     die(Error('Aula não encontrada!', 'warning'));
// }
// ?>

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink "></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>



<!-- Brand Buttons -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Brand Buttons</h6>
    </div>
    <div class="card-body">
        <p>Google and Facebook buttons are available featuring each company's respective
            brand color. They are used on the user login and registration pages.</p>
        <p>You can create more custom buttons by adding a new color variable in the
            <code>_variables.scss</code> file and then using the Bootstrap button variant
            mixin to create a new style, as demonstrated in the <code>_buttons.scss</code>
            file.
        </p>
        <a href="#" class="btn btn-google btn-block"><i class="fab fa-google fa-fw"></i>
            .btn-google</a>
        <a href="#" class="btn btn-facebook btn-block"><i
            class="fab fa-facebook-f fa-fw"></i> .btn-facebook
        </a>

    </div>
</div>
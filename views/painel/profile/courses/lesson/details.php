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
$Username = $_SESSION['login']['user_name'];
$aulaId = filter_input(INPUT_GET, 'a', FILTER_VALIDATE_INT);
$courseId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);

// $Read = new Read();
// $Read->FullRead('SELECT * FROM aulas WHERE aula_id = :ai', "ai={$aulaId}");
// if($Read->getResult()) {
//     $DataLesson = $Read->getResult()[0];
//     $courseId = $DataLesson['curso_id'];
// } else {
//     die(Error('Aula não encontrada!', 'warning'));
// }

?>
<div class="container">
    <header class="navbar navbar-expand bg-success static-top shadow d-flex align-items-center justify-content-center justify-content-md-between">
        <ul class="header1" style="list-style: none;">
            <li>
                <a href="<?= BASE ?>/painel/aulas/nome-da-aula-anterior" class="small text-gray-200">
                    <div class="fw-normal text-white-50 mb-1">Anterior</div>
                    <i class="fas fa-arrow-circle-left mr-2 text-gray-200"></i>
                    <span>React Native</span>
                </a>
            </li>
        </ul>
        <div class="topbar-divider d-none d-sm-block"></div>
        <ul class="header2" style="list-style: none;">
            <li>
                <a href="<?= BASE ?>/painel/aulas/nome-da-proxima-aula" class="small text-gray-200">
                    <div class="fw-normal text-white-50 mb-1">Próxima</div>
                    <span>React JS</span>
                    <i class="fas fa-arrow-circle-right mr-2 text-gray-200"></i>
                </a>
            </li>
        </ul>
    </header>    
    <div class="embed-responsive embed-responsive-21by9">
        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207"></iframe>
    </div>
    <div class="d-flex flex-row mt-3">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT mc.*, c.curso_titulo, c.curso_descricao
            FROM matriculas_cursos mc
            LEFT JOIN cursos c ON c.curso_id = mc.curso_id
            WHERE mc.curso_id = :ci", "ci={$courseId}");
        if($Read->getResult()) {
            $DataCourse = $Read->getResult()[0];
                ?>
        <p class="ml-0 h6"><?= $DataCourse['curso_titulo'] ?></p>
        <?php 
        } else {
            die(Error('Curso não encontrado!', 'success'));
        }
        ?>
        <i class="fas fa-solid fa-chevron-right ml-2"></i>
        <?php
        $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
        if($Read->getResult()) {
            $DataModule = $Read->getResult()[0];
                ?>
        <p class="ml-2 h6"><?= $DataModule['modulo_name'] ?></p>
        <?php
        } else {
            Error('Módulos não encontrados', 'success');
        }
        ?>
    </div>
    <?php
    $Read->FullRead("SELECT * FROM aulas WHERE aula_id = :ai", "ai={$aulaId}");
    if($Read->getResult()) {
        foreach($Read->getResult() as $Lesson) {
            ?>
    <h1 class="h3 text-gray-900 mb-4 mt-4"><?= $Lesson['aula_name'] ?></h1>
    <?php               
        }
    } else {
        Error('Aula não encontrada!', 'success ');
    }
    ?>
    <hr>
    <form action="" method="post" id="form1">
        <!-- // $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // if(!empty($Post['enviar'])) {
        //     $CreateComment['comment_text'] = $Post['comment'];
        //     $Comment = new Comment();
        //     $Comment->createCommentLesson($CreateComment);
        //     if($Comment->getResult()) {
        //         Error($Comment->getError());
        //     } else {
        //         Error($Comment->getError(), 'warning');
        //     }
        // } 
        // -->
        <div class="form-group">
            <div class="py-3">
                <h6 class="h4 text-dark">Comentários</h6>
            </div>
            <div class="card-body">
                <div class="text-start">
                    <img class="img-profile rounded-circle" style="width: 40px; height: 40px;" src="<?= BASE ?>/src/images/undraw_profile.svg">
                    <textarea class="form-control mt-3" id="comment" name="comment" placeholder="Escreva seu comentário..." rows="3" required></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" id="submit" form="form1" class="btn btn-danger mt-3 p-2 ml-2" name="enviar" value="Publicar">
                </div>
                <?php
                $Read = new Read();
                $Read->FullRead("SELECT c.*, u.user_name
                    FROM comments c
                    LEFT JOIN users u ON u.user_id = c.comment_create_user");
                if($Read->getResult()) {    
                    $DataComment = $Read->getResult()[0];           
                        ?>  
                    <div class="d-flex align-items-center justify-content-start">
                        <img class="img-profile rounded-circle" style="width: 40px; height: 40px;" src="<?= BASE ?>/src/images/undraw_profile.svg">
                    </div>
                    <div class="d-flex flex-column rounded card-body bg-dark mt-3">
                        <div class="d-flex justify-content-between">
                            <h1 class="h6"><?= $Username ?></h1>
                            <span class="btn btn-success btn-sm"><?= $DataComment['comment_aprovacao'] ?></span>
                        </div>
                        <span class="h6 text-white"><?= $DataComment['comment_text'] ?></span>
                    <div class="mt-4">
                        <a href="" class="btn-sm btn-light" title="Editar comentário"><i class="fas fa-edit"></i></a>   
                        <a href="" class="btn-sm btn-light" title="Excluir comentário"><i class="fas fa-solid fa-trash"></i></a>
                    </div>
                    <?php
                    }
                    ?>
                </div>  
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#form1').submit(function(e) {
            e.preventDefault();

            var comment = $('#comment').val();
            
            $.ajax({
                url: '<?= BASE ?>/api?route=comments&action=create',
                type: 'POST',
                data: { comment: comment, action: 'add_comment'},
                dataType: 'json',
                }).done(function(result) {
                    console.log(result);
                }).fail(function(data) {
                    console.log(data);
                });
            return false;
        });
    });
</script>
<?= $Component->getFooterDashboard(); ?>

       
       
    
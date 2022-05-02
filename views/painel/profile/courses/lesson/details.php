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

// $Read->FullRead('SELECT * FROM aulas WHERE aula_id = :ai', "ai={$aulaId}");
// if($Read->getResult()) {
//     $DataLesson = $Read->getResult()[0];
//     $courseId = $DataLesson['curso_id'];
// } else {
//     die(Error('Aula não encontrada!', 'warning'));
// }
?>

<div class="container">
    <?php
    $Read = new Read();
    $Read->FullRead('SELECT * FROM aulas');
    if($Read->getResult()) {
        $DataLesson = $Read->getResult()[0];
    } else {
        Error('Aula não encontrada', 'danger');
    }
    ?>
</div>


<div class="container">
    <nav class="navbar navbar-expand navbar-light bg-success static-top shadow d-flex align-items-center justify-content-center justify-content-md-between" title="Voltar para aula anterior">
        <div class="container">
            <a href="<?= BASE ?>/painel/profile/courses/lesson/details&p=<?= $DataLesson['aula_id'] ?>" class="navbar-brand d-flex flex-column text-start text-white">
                Anterior 
                <i class="fas fa-solid fa-angle-left"></i>
            </a>
            <i class="fas fa-solid fa-pipe"></i>
            <a href="<?= BASE ?>/painel/profile/courses/lesson/details&n=<?= $DataLesson['aula_id'] ?>"class="navbar-brand d-flex flex-column text-end text-white" title="Avançar para próxima aula">
                Avançar
                <i class="fas fa-solid fa-angle-right"></i>
            </a>
        </div>
    </nav>

    <div class="mt-0">
        <video id="video-aula" poster="<?= BASE ?>/src/images/alexandre.jpg" width="100%" controls prealod="none">
            <source src="<?= BASE ?>/src/video/humberto.mp4" type="video/mp4">     
        </video>
    </div>
  
    <div class="d-flex flex-row mt-2">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT mc.*, c.curso_titulo, c.curso_descricao
            FROM matriculas_cursos mc
            LEFT JOIN cursos c ON c.curso_id = mc.curso_id
            WHERE mc.curso_id = :ci", "ci={$courseId}");
        if($Read->getResult()) {
            $DataCourse = $Read->getResult()[0];
                ?>
            <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataCourse['curso_id'] ?>" class="ml-0 h6 text-dark">
                <?= $DataCourse['curso_titulo'] ?>
            </a>
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
            <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataModule['curso_id'] ?>" class="ml-2 h6 text-dark">
                <?= $DataModule['modulo_name'] ?>
            </a>
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

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
                    // alert('Comentário publicado com sucesso!');
                    console.log(result);
                }).fail(function(data) {
                    console.log(data);
                });
            return false;
        });
    });
</script>
<?= $Component->getFooterDashboard(); ?>
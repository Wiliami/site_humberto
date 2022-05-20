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

$total       = rand(1, 5000);
$progresso   = rand(1, $total);
$porcentagem = ($total/$progresso) * 100;
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
    <div class="mt-0">
        <video id="video-aula" poster="<?= BASE ?>/src/images/alexandre.jpg" width="100%" controls prealod="none">
            <source src="<?= BASE ?>/src/video/humberto.mp4" type="video/mp4">
        </video>
    </div>
        <div class="d-flex align-items-center justify-content-between">
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
                    <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataCourse['curso_id'] ?>" class="ml-0 h6 text-dark" title="Nome do curso">
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
                    <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataModule['curso_id'] ?>" class="ml-2 h6 text-dark" title="Nome do módulo">
                        <?= $DataModule['modulo_name'] ?>
                    </a>
                <?php
                } else {
                    Error('Módulos não encontrados', 'success');
                }
                ?>       
            </div>
            <div class="d-flex justify-content-end">
                <a href="<?= BASE ?>/painel/profile/courses/lesson/details&p=<?= $DataLesson['aula_id'] ?>" class="p-2 btn btn-outline-dark">
                    Anterior 
                </a>
                <a href="<?= BASE ?>/painel/profile/courses/lesson/details&n=<?= $DataLesson['aula_id'] ?>" class="p-2 btn btn-outline-dark ml-2" title="Avançar para próxima aula">
                    Avançar
                </a>
            </div>
        </div>

        <!-- Barra de progresso -->
        <div class="">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $porcentagem.'%'; ?></div>
            </div>
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


    <!-- Barra de comentários postados do usuário -->
    <form action="" method="post" id="form1">
        <div class="form-group">
            <div class="py-3">
                <h6 class="h5 text-gray-900">Comentários</h6>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center text-start">
                    <img class="img-profile rounded-circle" style="width: 40px; height: 40px;" src="<?= BASE ?>/src/images/undraw_profile.svg">
                    <textarea class="form-control mt-3 ml-2" id="comment_user" name="comment" placeholder="Escreva seu comentário..." rows="3" required></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" id="submit" form="form1" class="btn btn-danger mt-3 p-2 ml-2" name="enviar" value="Publicar">
                </div>
            </div>
               
            <div class="card" id="card-comment">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="h6" id="username">Nome do usuário</div>
                    <h5 class="btn btn-success btn-sm">Aguardando aprovação</h5>
                </div>
                <div class="card-body">
                    <p class="card-text" id="error">Comentário do usuário no container</p>
                    <a href="<?= BASE ?>/" class="btn btn-dark" title="Editar comentário"><i class="fas fa-edit"></i></a>
                    <a href="<?= BASE ?>/" class="btn btn-dark" name="delete_comment" title="Excluir comentário"><i class="fas fa-solid fa-trash"></i></a>
                </div>
            </div>

        </div>
    </form>
    <button class="btn btn-success" id="button">Clique aqui</button>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript">
    $(function() {
        $('#form1').submit(function(e) {
            e.preventDefault();

            var comment = $('#comment_user').val();

            $.ajax({
                url: '<?= BASE ?>/api/?route=comments&action=create',
                type: 'POST',
                data: {comment_user: comment, action: 'add_comment'},
                dataType: 'json',
            }).done(function(result) {
                $('#error').text(result.error.text);
            }).fail(function(data) {
                $('#error').text(data.error.text);
                return false;
            });
        });
    });
</script>
<?= $Component->getFooterDashboard(); ?>
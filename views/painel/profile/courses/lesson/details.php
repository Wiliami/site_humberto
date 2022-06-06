<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
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
    $Read->FullRead('SELECT * FROM aulas WHERE aula_id = :ai', "ai={$aulaId}");
    if($Read->getResult()) {
        $DataLesson = $Read->getResult()[0];
    } else {
        die(Error('Aula não encontrada', 'danger'));
    }
    ?>

     <!-- Area aula-video -->
    <div>
        <video class="embed-responsive embed-responsive-16by9" id="video" controls>
            <source src="<?= $DataLesson['aula_url'] ?>">   
        </video>
        <div class="mt-3">
            <button class="btn btn-success" id="play">PLAY</button>
            <button class="btn btn-danger" id="pause">PAUSE</button>

            <p id="duration"></p>
            <p id="currenttime"></p>
            <p id="ola"></p>
        </div>
    </div>


    <div class="d-flex flex-row justify-content-between mt-3">
        <div class="d-flex flex-row d-md-block d-none">
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
                    <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataCourse['curso_id'] ?>" class="ml-0 h6 text-gray-800" title="Nome do curso">
                        <?= $DataCourse['curso_titulo'] ?>
                    </a>
                <?php 
                } else {
                    die(Error('Curso não encontrado!', 'success'));
                }
                ?>
                <i class="fas fa-solid fa-chevron-right ml-2 text-gray-800"></i>
                <?php
                $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
                if($Read->getResult()) {
                    $DataModule = $Read->getResult()[0];
                        ?>
                    <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataModule['curso_id'] ?>" class="ml-2 h6 text-gray-800 d-md-block d-none" title="Nome do módulo">
                        <?= $DataModule['modulo_name'] ?>
                    </a>
                <?php
                } else {
                    die(Error('Módulos não encontrados', 'success')); 
                }
                ?>       
            </div>
        </div>

        <div class="row col-sm-3 text-center">
            <div class="col-lg-6 mb-4">
                <a href="<?= $DataLesson['aula_url'] ?>" class="btn btn-outline-dark shadow">
                    Anterior
                </a>
            </div>
            <div class="col-lg-6 mb-4">
                <a href="<?= $DataLesson['aula_url'] ?>" class="btn btn-outline-dark shadow">
                    Avançar
                </a>
            </div>
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
        die(Error('Aula não encontrada!', 'success'));
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
            <div id="list_comments">
                <?php
                $Read->FullRead("SELECT c.*, u.user_name, s.desc
                    FROM comments c
                    LEFT JOIN users u ON u.user_id = c.user
                    LEFT JOIN situation s ON s.id = c.comment_status
                    WHERE aula = :ai", "ai={$aulaId}");
                if($Read->getResult()) {
                    foreach($Read->getResult() as $Comment) {
                    echo 
                        "<div class='card comment_{$Comment['comment_id']} mt-4' id='card-comment'> "
                            . "<div class='card-header d-flex align-items-center justify-content-between'> "
                                . "<div class='h6' id='username'>{$Comment['user_name']}</div>"
                                . "<h5 class='btn btn-success btn-sm'>{$Comment['desc']}</h5>"
                            . "</div> "
                            . "<div class='card-body'> "
                                . "<p class='card-text'>" . str_replace("\n"," ", nl2br($Comment['comment_text'], false)) . "</p> "
                                . "<a href='" . BASE . "/painel/profile/courses/lesson/update&comment=<?= ?> class='' title='Editar comentário'><i class='fas fa-edit'></i></a> "
                                . "<a href='" . BASE . "/' class='deleteComment' data-id='{$Comment['comment_id']}' name='delete_comment' style='color: red;' title='Excluir comentário'><i class='fas fa-solid fa-trash'></i></a>"
                            . "</div> "
                    .   "</div> ";
                    }
                }
                ?>
            </div>
        </div>
    </form>        
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#form1').submit(function(e) {
            e.preventDefault();

            var comment = $('#comment_user').val();
            let url = $(this).data('url');

            $.ajax({
                url: '<?= BASE ?>/api/?route=comments&action=create', // nome da pasta que irá os dados
                type: 'POST',
                data: {comment_user: comment, aula: '<?= $aulaId ?>', action: 'add_comment'},
                dataType: 'json',
            }).done(function(result) {
                console.log(result);
                if(result.script) {
                    eval(result.script);
                }
                $('#error').text(result.error.text);
            }).fail(function(data) {
                $('#error').text(data.error.text);
                return false;
            });
        });
        $( "body" ).on( "click", ".deleteComment", function() {
            let id = $(this).data('id');
            var result = confirm("Deseja realmente excluir o comentário?");

            if (result) {
                // Delete the user
                $.ajax({
                    url: '<?= BASE ?>/api/?route=comments&action=delete_pending',
                    type: 'POST',
                    data: {comment_id: id, action: 'delete_pending'},
                    dataType: 'json',
                }).done(function(result) {
                    console.log(result);
                    if(result.script) {
                        eval(result.script);
                    }
                    $('#error').text(result.error.text);
                }).fail(function(data) {
                    $('#error').text(data.error.text);
                    return false;
            });
            } else {
                // Do nothing; they cancelled
            }
            return false;
        });
    });
</script>


<script text="text/javascript" >
    //Criando as funcionalidades do video

    var myVideo = document.getElementById("#video");
    var btnPlay = document.getElementById("#play");
    var btnPause = document.getElementById("#pause");
    var textduration = document.getElementById("#duration");
    var textcurrenttime = document.getElementById("#currenttime");
    var textseconds = document.getElementById("#ola");

    btnPlay.addEventListener("click", function() {myVideo.play();}, false);
    btnPause.addEventListener("click", function() {myVideo.pause();}, false);
    
    myVideo.addEventListener("loadedmetadata", function() {textduration.innerHTML = "Duration: " + convertTime(myVideo.duration);}, false);
    myVideo.addEventListener("timeupdate", function() {textcurrenttime.innerHTML = "Current Time: " + convertTime(myVideo.currentTime);}, false);
    myVideo.addEventListener("secondupdate", function() {textseconds.innerHTML = "Seconds: " + convertTime(myVideo.currentTime);}, false);

    function convertSeconds(org) {
        var minute = Math.floor(org * 60) % 60;
        var second = Math.floor(org % 60);
        var seconds = (minute * 60) + second;
        return seconds;
    }

    function convertTime(org) {
        var minute = Math.floor(org / 60) % 60;
        var second = Math.floor(org % 60);
        return( minute + ' : ' + second);
    }

    function saltar(tempo) {
        var vid = document.getElementById("#video");
        document.getElementById("#video").currentTime = tempo;
        vid.pause();
    }

</script>

    Momento 1 - <button onclick="saltar(8)" class="btn btn-success">Saltar</button><br>
    Momento 2 - <button onclick="saltar(14)" class="btn btn-success mt-2">Saltar</button><br>
    Momento 3 - <button onclick="saltar(172)" class="btn btn-success mt-2">Saltar</button><br>

<?= $Component->getFooterDashboard(); ?>
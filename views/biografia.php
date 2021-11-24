<?php

    $Component = new Component();

    echo $Component->getHeadHtml();
    echo $Component->getMenu();

?>

            <section class="py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">

                            <h1 class="mb-0">Pr. Humberto Oliveira</h1>
                            <div class="col-sm-9" style="margin">
                                <p class="mb-0">
                                No último sábado, 30 de outubro, a liderança da Igreja Adventista da região sudoeste 
                                paulista, realizou a cerimônia de ordenação ao Ministério Pastoral dos pastores Thiago da
                                Silva Monteiro e Joel Gomes de Sousa. O evento aconteceu na Igreja Central de Sorocaba e 
                                contou com a presença de líderes paulista da Igreja Adventista, parentes, amigos, pastores e
                                membros de outros distritos.
                                </p><br>

                                <p class="mb-0">
                                A mensagem direcionada para os pastores foi do líder da Igreja Adventista para todo Estado
                                de São Paulo, o pastor Maurício Lima. Nas suas considerações ele ressaltou algumas marcas
                                que devem fazer parte do ministério do pastor. “É muito importante a comunhão diária
                                com Deus, a marca da espiritualidade. A marca da justiça e a marca do amor. Entre outras marcas, 
                                essas são indispensáveis”, ressaltou Lima.
                                </p><br>

                                <p class="mb-0">
                                O pastor Josemar Ventura é o responsável pelo grupo de 75 pastores no território sudoeste 
                                paulista. Para ele, participar desse momento na vida do pastor é muito significativo. 
                                “Realmente a gente sente uma alegria ao perceber que o Espírito Santo convence corações 
                                de jovens para se dedicarem, de forma integral, no trabalho de Deus e na salvação de pessoas.”
                                </p><br>
                            </div>

                            </div>
                        </div>

                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                            <img class="img-fluid rounded-3 my-5 bg-warning rounded-circle w-290 h-290" src="<?= BASE ?>/src/images/humberto.png" alt="image de Humberto Oliveira" />
                        </div>


                    </div>
                </div>
            </section>


<?php 

$Component = new Component();
echo $Component->getFooterExampleTest();

?>
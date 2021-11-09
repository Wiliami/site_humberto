<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASE ?>/src/css/index.css" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>
</head>

<body>


    <?php 

        $Component = new Component();
        echo $Component->getMenu();

    ?>

    <!-- Area cursos -->
    <section class="py-5 bg-white">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-start">
                        <h2 class="fw-bolder">Conheça os nosso cursos</h2>
                        <p class="lead fw-normal text-muted mb-5">Cursos em diversas áreas</p>
                    </div>
                </div>
            </div>

            <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <video class="card-img-top" muted>
                            <source type="video/mp4" />
                        </video>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Técnicas e perfomance.</h5>
                            </a>
                            <p class="card-text mb-0">Saiba como falar em público e como dominar a timidez na hora de se expressar para as pessoas.</p>

                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <div class="card-img-top">
                            <video class="card-img-top" muted>
                                <source type="video/mp4" />
                            </video>
                        </div>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Vida financeira</h5>
                            </a>
                            <p class="card-text mb-0">Como ter uma vida financeira equilibrada e como ter foco e
                                resultados na área mais desafiadora do ser humano.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">March 23, 2021 &middot; 4 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <div class="card-img-top">
                            <video class="card-img-top" muted>
                                <source type="video/mp4" />
                            </video>
                        </div>
                        


                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Propósito e carreira</h5>
                            </a>
                            <p class="card-text mb-0">Conheça as principais ferramentas que pessoas bem sucedidas
                                utilizam para uma vida de propósito.</p>
                        </div>

                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">April 2, 2021 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <video class="card-img-top" muted>
                            <source type="video/mp4" />
                        </video>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Técnicas e perfomance.</h5>
                            </a>
                            <p class="card-text mb-0">Saiba como falar em público e como dominar a timidez na hora de se
                                expressar para as pessoas.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <div class="card-img-top">
                            <video class="card-img-top" muted>
                                <source type="video/mp4" />
                            </video>
                        </div>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Vida financeira</h5>
                            </a>
                            <p class="card-text mb-0">Como ter uma vida financeira equilibrada e como ter foco e
                                resultados na área mais desafiadora do ser humano.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">March 23, 2021 &middot; 4 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <div class="card-img-top">
                            <video class="card-img-top" muted>
                                <source type="video/mp4" />
                            </video>
                        </div>




                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Propósito e carreira</h5>
                            </a>
                            <p class="card-text mb-0">Conheça as principais ferramentas que pessoas bem sucedidas
                                utilizam para uma vida de propósito.</p>
                        </div>

                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">April 2, 2021 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <video class="card-img-top" muted>
                            <source type="video/mp4" />
                        </video>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Técnicas e perfomance.</h5>
                            </a>
                            <p class="card-text mb-0">Saiba como falar em público e como dominar a timidez na hora de se
                                expressar para as pessoas.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <div class="card-img-top">
                            <video class="card-img-top" muted>
                                <source type="video/mp4" />
                            </video>
                        </div>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Vida financeira</h5>
                            </a>
                            <p class="card-text mb-0">Como ter uma vida financeira equilibrada e como ter foco e
                                resultados na área mais desafiadora do ser humano.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">March 23, 2021 &middot; 4 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <div class="card-img-top">
                            <video class="card-img-top" muted>
                                <source type="video/mp4" />
                            </video>
                        </div>




                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3">Propósito e carreira</h5>
                            </a>
                            <p class="card-text mb-0">Conheça as principais ferramentas que pessoas bem sucedidas
                                utilizam para uma vida de propósito.</p>
                        </div>

                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">unitbrasil</div>
                                        <div class="text-muted">April 2, 2021 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Button -->
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-center">
                    <a class="btn btn-warning btn-lg px-4 me-sm-3" href="/class">Veja todos os cursos</a>
                </div>
            </div>
        </div>
    </section>


    <?php 

        $Component = new Component();
        echo $Component->getFooter();

        ?>


</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferramenta de Buscas</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">

    <!-- Css -->
    <link rel="stylesheet" href="../../style/index.css" media="all">
    <link rel="stylesheet" href="../../style/index-home.css">
</head>

<body>
    <section id="mobile-v">
        <header class="d-flex">
            <img src="../../img/logo.png" alt="logo" class="logo">
            <h1 class="title-header">SHERLOCK</h1>
        </header> <!-- HEADER -->
        <main>
            <form action="#" method="post" class="was-validated">
                <input type="text" name="target" class="form-control" minlength="3" placeholder="Apelido ou nome completo" required>
                <div class="mt-3 mb-3">
                    <button class="btn-buscar">Buscar</button>
                </div>
                <a href="../keys/">Não sabe o nome completo?</a>
            </form>

            <section>
                <h3>RESULTADOS</h3>
            
                <!-- TAGS INSERIDOS PELA PHP, APAGAR DEPOIS DE PREPARAR O DESIGN -->
<!--                 <h4 id="aprox-result">Aproximadamente 50 resultados.</h4>
                <section class="d-flex justify-content-center">
                    <section class="m-2 text-center">
                        <img src="../../img/github_mini.png" alt="github icon mini">
                        10
                    </section>
                    <section class="m-2 text-center">
                        <img src="../../img/facebook_mini.png" alt="facebook_mini icon mini">
                        10
                    </section>
                    <section class="m-2 text-center">
                        <img src="../../img/instagram_mini.png" alt="instagram_mini icon mini">
                        10
                    </section>
                    <section class="m-2 text-center">
                        <img src="../../img/tiktok_mini.png" alt="tiktok_mini icon mini" class="icons-pesquisa">
                        10
                    </section>
                    <section class="m-2 text-center">
                        <img src="../../img/youtube_mini.png" alt="youtube icon mini" class="icons-pesquisa">
                        10
                    </section>
                </section>
                
                <section class="resultado d-flex ps-3">
                    <img src="../../img/tiktok_normal.png" alt="tiktok_normal normal" class="icons-pesquisa2 me-2 mt-2">
                    <h4 class="nome-perfil mt-3">NOME DO PERFIL</h4>
                </section>
                <section class="resultado d-flex ps-3">
                    <img src="../../img/facebook_normal.png" alt="facebook_normal normal" class="icons-pesquisa2 me-2 mt-2">
                    <h4 class="nome-perfil mt-3">NOME DO PERFIL</h4>
                </section>
                <section class="resultado d-flex ps-3">
                    <img src="../../img/youtube_normal.png" alt="youtube_normal normal" class="icons-pesquisa2 me-2 mt-2">
                    <h4 class="nome-perfil mt-3">NOME DO PERFIL</h4>
                </section>
                <section class="resultado d-flex ps-3">
                    <img src="../../img/github_normal.png" alt="github_normal normal" class="icons-pesquisa2 me-2 mt-2">
                    <h4 class="nome-perfil mt-3">NOME DO PERFIL</h4>
                </section>
                <section class="resultado d-flex ps-3">
                    <img src="../../img/instagram_normal.png" alt="instagram_normal normal" class="icons-pesquisa2 me-2 mt-2">
                    <h4 class="nome-perfil mt-3">NOME DO PERFIL</h4>
                </section> -->
            </section>

        </main> <!-- MAIN -->
    </section> <!-- MOBILE-V -->



    <!-- Aviso para +768px -->
    <section id="large-screen">
        <h1>Aviso</h1>
        <p>Aplicação disponível apenas para dispositivos Mobile.</p>
    </section>
</body>

</html>
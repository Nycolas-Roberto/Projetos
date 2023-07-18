<?php 
    try {
        session_start();
        if(!(isset($_SESSION['loginProf'])) && !(isset($_SESSION['senhaProf']))) {
            header("Location: ../../Login/pages/seletor.php");
        } else {
            echo "";
        }
    } catch (Exception $e) {
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/inicio.css">
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Link Fontawesome -->
    <script src="https://kit.fontawesome.com/1c0bdfefed.js" crossorigin="anonymous"></script>




    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela incial</title>
</head>
<?php 
    try {
        require_once("../../Login/php/db.php");
        $sqlAluno01 = "SELECT * FROM professor WHERE emailProf = '$_SESSION[loginProf]';";
        $respAluno01 = $connection->query($sqlAluno01);
        if(mysqli_num_rows($respAluno01) > 0) {
            while($dataAluno01 = mysqli_fetch_assoc($respAluno01)) {
                $nomeDoProf = $dataAluno01['nomeProf'];
                $idCursoProf = $dataAluno01['idprofessor'];
            }
        } else {
            header("Location: ../../Login/pages/seletor.php");
        }
    } catch (Exception $e) {
        die();
    }
?>
<body>
    <section class="principal">
        <main>
        <div class="botao_perfil">
                <ul class="retratil">
                    <li>
                        <input type="checkbox" name="botao" id="botao">
                        <label for="botao"><i class="fa-solid fa-user" style="color:white;"></i></label>
                        <div class="conteudo">
                            <ul>
                                <li>
                                    <?php echo "<p>$nomeDoProf</p>"?>
                                </li>
                                <li>
                                    <?php echo "<p>$idCursoProf</p>"?>
                                </li>
                                <li>
                                   <p>
                                        <a id="sair" href="../../Login/php/logout.php?sair=1"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>
                                    </p>
                                </li>
                            </ul>
                        </div><!-- Conteudo -->
                    </li>
                </ul><!-- Retratil -->
            </div><!-- Botão Perfil -->

            <div class="novidades">
                <p>Novidades</p>
            </div><!-- Novidades -->

            <div class="carrossel">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner carrossel">
                        <div class="carousel-item active">
                            <img src="../img/img-random01.jpg" class="d-block w-100" alt="..." id="slides">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/img-random02.jpg" class="d-block w-100" alt="" id="slides">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/img-random03.png" class="d-block w-100" alt="" id="slides">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div><!-- Embarque nesse carrossel -->

            <div class="inicio_dashboards">
                <a href="Unidade-Frequencia-Form.php" class="dashboard" id="inicio_dash_frequencia">
                    <h1>Frequência & Unidades</h1>
                    <img src="../img/clock-regular.png" alt="">
                </a>

                <a href="calendario.php" class="dashboard" id="inicio_dash_calendario">
                    <h1>Calendário</h1>
                    <img src="../img/calendar.png" alt="">

                </a>
                <a href="avisos.php" class="dashboard" id="inicio_dash_avisos">
                    <h1>Avisos</h1>
                    <img src="../img/bell.png" alt="">
                </a>

            </div><!-- inicio_Dashboards -->
        </main>
    </section>


    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/acc0f57857.js" crossorigin="anonymous"></script>

</body>

</html>
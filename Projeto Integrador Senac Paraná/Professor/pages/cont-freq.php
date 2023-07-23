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
    <link rel="stylesheet" href="../css/cont-freq.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequência e Unidades</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- Link Fontawesome -->
    <script src="https://kit.fontawesome.com/acc0f57857.js" crossorigin="anonymous"></script>

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
    <section class="fundo">
        <header>
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
        </header>
        <main>
            <div class="img">
                <img src="../img/clock.png" alt="">
                <figcaption>Frequência & Unidades</figcaption>
            </div><!-- Img -->

            <div class="seletor">
                <form action="#" method="GET">
                    <select name="select" id="select">

                    </select>
                </form>
            </div><!-- Seletor -->
            
            <main>
                <div class="quadro">
                    <div class="principal">
                        <div class="corda"></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos molestiae vitae iure
                            debitis, accusamus maxime doloremque provident aperiam voluptas optio dolorem commodi.
                            Molestias
                            dignissimos praesentium a sunt facere omnis amet?</p>
                    </div>
                </div><!-- Quadro -->
                <div class="dashboards">
                    <div class="faltas">
                        <h1>Faltas</h1>
                        <span id="faltas">12</span>
                    </div>
                    <div class="carga">
                        <h1>C. Horária</h1>
                        <span id="horaria">100</span>
                    </div>
                    <div class="maxima">
                        <h1>Faltas Max.</h1>
                        <span id="maxima">25</span>
                    </div>
                </div><!-- Dashboards -->
            </main>
        </main>
        <footer>
            <div class="home">
                <ul>
                    <li>
                        <a href="index.php"><i class="fa-sharp fa-solid fa-house" style="color: #ffffff;"></i></a>
                    </li>
                    <li id="editar">
                        <br>
                        <a href="Unidade-Frequencia-Form.php"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></a>
                    </li>
                </ul>
            </div><!-- Home -->
        </footer>
    </section><!-- Fundo -->
</body>

</html>
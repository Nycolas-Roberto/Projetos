<?php 
    try {
        session_start();
        if(!(isset($_SESSION['login'])) && !(isset($_SESSION['senha']))) {
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
    <link rel="stylesheet" href="../css/avisos.css">
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Link FontAwesome -->
    <script src="https://kit.fontawesome.com/1c0bdfefed.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avisos</title>
</head>
<?php 
    try {
        require_once("../../Login/php/db.php");
        $sqlAluno01 = "SELECT * FROM aluno WHERE emailAluno = '$_SESSION[login]';";
        $respAluno01 = $connection->query($sqlAluno01);
        if(mysqli_num_rows($respAluno01) > 0) {
            while($dataAluno01 = mysqli_fetch_assoc($respAluno01)) {
                $nomeDoAluno = $dataAluno01['nomeAluno'];
                $turmaDoAluno = $dataAluno01['turma_idturma'];
                $idCursoAluno = $dataAluno01['curso_idcurso'];
            }
        } else {
            header("Location: ../../Login/pages/seletor.php");
        }
    } catch (Exception $e) {
        die();
    }
?>
<body>
    <section class="content">
        <header>
        <div class="botao_perfil">
                <ul class="retratil">
                    <li>
                        <input type="checkbox" name="botao" id="botao">
                        <label for="botao"><i class="fa-solid fa-user" style="color:white;"></i></label>
                        <div class="conteudo">
                            <ul>
                                <li>
                                    <?php echo "<p>$nomeDoAluno</p>"?>
                                </li>
                                <li>
                                    <?php
                                        $sqlCurso = "SELECT * FROM curso WHERE idcurso = $idCursoAluno";
                                        $respCurso = $connection->query($sqlCurso);
                                        if(mysqli_num_rows($respCurso) > 0) {
                                            while($dataCurso = mysqli_fetch_assoc($respCurso)) {
                                                echo "<p>$dataCurso[nomeCurso]</p>";
                                            }
                                        }
                                    ?>
                                </li>
                                <li>
                                    <?php echo "<p>$turmaDoAluno</p>"?>
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
            <div class="title">
                <img src="../img/bell-custom.png" alt="Sino">
                <h1>Avisos </h1>
            </div><!-- Title -->
            <div class="quadro">
                <?php 
                    require_once("../../Login/php/db.php");
                    $sqlAvisos = "SELECT * FROM avisos";
                    $respAvisos = $connection->query($sqlAvisos);
                    if(mysqli_num_rows($respAvisos) > 0) {
                        while($dataAvisos = mysqli_fetch_assoc($respAvisos)) {
                            echo "$dataAvisos[aviso]";
                        }
                    }
                ?>
            </div><!-- Quadro -->
        </main>
        <footer>
            <div class="home">
                <a href="inicial.php"><i class="fa-sharp fa-solid fa-house" style="color: #ffffff;"></i></a>
            </div><!-- Home -->
        </footer>


        <!-- Link bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    </section>
</body>

</html>
<?php
try {
    session_start();
    if (!(isset($_SESSION['loginProf'])) && !(isset($_SESSION['senhaProf']))) {
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
    <link rel="stylesheet" href="../css/avisos-form.css">
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Link FontAwesome -->
    <script src="https://kit.fontawesome.com/1c0bdfefed.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JQuery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
try {
    require_once("../../Login/php/db.php");
    $sqlAluno01 = "SELECT * FROM professor WHERE emailProf = '$_SESSION[loginProf]';";
    $respAluno01 = $connection->query($sqlAluno01);
    if (mysqli_num_rows($respAluno01) > 0) {
        while ($dataAluno01 = mysqli_fetch_assoc($respAluno01)) {
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
                                    <?php echo "<p>$nomeDoProf</p>" ?>
                                </li>
                                <li>
                                    <?php echo "<p>$idCursoProf</p>" ?>
                                </li>
                                <li>
                                    <p>
                                        <a id="sair" href="../../Login/php/logout.php?sair=1"><i
                                                class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>
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
                <h1>Avisos </h1>
            </div><!-- Title -->
            <form action="#" method="POST" id="myform">
                <div class="txt">
                    <textarea name="msg" id="msg" cols="30" rows="14" maxlength="406"></textarea>
                    <span></span>
                </div>
        </main>

        <footer>
            <div id="home"> 
                <button type="submit" name='btn_editar_avisos'><i class="fa-solid fa-check" style="color: #ffffff;"> Pronto</i></button>
            </div><!-- Home -->
            <div id="home">
                <ul>
                    <li>
                        <a href="index.php"><i class="fa-sharp fa-solid fa-house" style="color: #ffffff;"></i></a>
                    </li>
                </ul>
            </div><!-- Home -->
        </footer>
        </form>
        <?php
            try {
                if (isset($_POST['btn_editar_avisos'])) {
                    require_once("../../Login/php/db.php");
                    $aviso = $_POST['msg'];
                    $sqlAvisoMsgg = "UPDATE `avisos` SET `aviso`='$aviso';";
                    $connection->query($sqlAvisoMsgg);
                    header("Location: avisos.php");
                }
            } catch (Exception $e) {
                die();
            }
        ?>
        <!-- Link bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    </section>
    <!-- Validação -->
    <script src="../js/script.js"></script>
</body>

</html>
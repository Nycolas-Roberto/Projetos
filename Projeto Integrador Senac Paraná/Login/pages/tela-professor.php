<?php
try {
    session_start();
    if (isset($_SESSION['loginProf']) && isset($_SESSION['senhaProf'])) {
        header("Location: ../../Professor/pages/inicial.php");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Professor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JQuery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</head>

<link rel="stylesheet" href="../css/professor.css"><!-- css -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<!-- bootstrap css -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<!-- FonteAwesome -->
<script src="https://kit.fontawesome.com/acc0f57857.js" crossorigin="anonymous"></script>



<body>
    <!-- Sessão principal -->
    <section class="principal">
        <header>
            <!-- Espaço para o logotipo -->
            <div class="logo"></div>
            <img src="../img/Logo-senac.png" alt="logo do senac" id="logo">
            </div><!-- logo -->
            <div class="title">
                <p>Entre com sua conta</p>
            </div>
        </header>
        <main>
            <form action="#" method="POST">
                <!-- Titulo instrucional -->


                <!-- Espaço para os campos de informação -->
                <div class="inp">
                    <input class="form-control" type="email" placeholder="Email:" name="email" id="email"></input>


                    <input type="password" placeholder="Senha:" required name="senha" minlength="8" maxlength="100"
                        id="senha"></input>


                    <input type="password" placeholder="Código de professor:" required name="codigo" minlength="3"
                        maxlength="100" id="codigo"></input>



                    <button type="submit" name='btn-login'>Entrar</button>
                    <?php
                    try {
                        if (isset($_POST['btn-login'])) {

                            // Login do usuário
                            $login = strtolower($_POST['email']);
                            $senha = strtolower($_POST['senha']);
                            $codigo = strtolower($_POST['codigo']);
                            /* Verificar login do usuário */
                            require_once('../php/db.php');
                            $sqlLogin = "SELECT * FROM professor WHERE emailProf = '$login' AND profCodigo = $codigo;";
                            $respLogin = $connection->query($sqlLogin);
                            if (mysqli_num_rows($respLogin) > 0) {
                                while ($dataHash = mysqli_fetch_assoc($respLogin)) {
                                    $hash = $dataHash['senhaProf'];
                                    if (password_verify($senha, $hash)) {
                                        $_SESSION['loginProf'] = $login;
                                        $_SESSION['senhaProf'] = $senha;
                                        header("Location: ../../Professor/pages/inicial.php");
                                    } else {
                                        die("<div class='error'>Verifique suas credenciais</div>");
                                    }
                                }
                            }
                        }

                    } catch (Exception $e) {
                        echo "<div class='error text-center'>Algo de errado ocorreu</div>";
                    }
                    ?>
                </div><!-- inputs -->
            </form>
        </main>
    </section>
    <footer>
        <a href="seletor.php"><i class="fa-sharp fa-solid fa-arrow-left" style="color: #ffffff;"></i></a>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script><!-- bootstrap javascript -->

    <script src="../js/valprof.js"></script>
</body>

</html>
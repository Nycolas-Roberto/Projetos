<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-ico">
    <link rel="stylesheet" href="../../style/index.css">
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../../../index.php">
                    <div class="icone-compras"></div>
                </a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link links link-animation" aria-current="page" href="../../../index.php"><i
                                    class='bx bxs-home'></i> Home</a>
                        </li>
                        </li>
                        <?php
                            try {
                                require_once("../../php/classes/classUser.php");
                                require_once("../../php/db.php");
                                if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                                    $user = new User($connection);
                                    $logado = $user->verificarLogin($_SESSION['login'], $_SESSION['login'], $_SESSION['password']);
                                    if ($logado == true) {
                                        echo "
                                                <li class='nav-item'>
                                                    <a class='nav-link links link-animation' aria-current='page' href='../compras/'><i class='bx bxs-shopping-bags'></i> Minhas compras</a>
                                                </li>
                                                ";
                                    } else {
                                        echo "
                                            <li class='nav-item'>
                                                <a class='nav-link links link-animation' aria-current='page' href='../login'><i class='bx bxs-user-circle'></i> Entrar</a>
                                            </li>
                                            <li class='nav-item'>
                                                <a class='nav-link links link-animation' aria-current='page' href='#'><i class='bx bxs-user-circle'></i> Registrar-se</a>
                                            </li>
                                            ";
                                    }
                                } else {
                                    echo "
                                        <li class='nav-item'>
                                            <a class='nav-link links link-animation' aria-current='page' href='../login'><i class='bx bxs-user-circle'></i> Entrar</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='nav-link links link-animation' aria-current='page' href='#'><i class='bx bxs-user-circle'></i> Registrar-se</a>
                                        </li>
                                        ";
                                }
                            } catch (Exception $error) {
                                die();
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="w-50 m-auto mt-5">
        <h1 class='text-center'>Crie sua conta.</h1>
        <hr class='border'>
        <form action="#" method="POST" autocomplete="on">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" aria-describedby="nome" placeholder="Digite seu nome." minlength="3" maxlength="100" required name="nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="Digite seu email@dominio.com" minlength="3" maxlength="100" required name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" placeholder="Digite sua senha." minlength="8" maxlength="100" required name="password">
            </div>
            <button type="submit" class="btn btn-success" name="btn-registro">Registrar</button>
        </form>

        <?php 
            try {
                if(isset($_POST['btn-registro'])) {
                    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password'])) {
                        $email = $_POST['email'];
                        $name = $_POST['nome'];
                        $password = $_POST['password'];
                        require_once("../../php/classes/classUser.php");
                        require_once("../../php/db.php");
                        $user = new User($connection);
                        $verificarLogin = $user->verificarLogin($name, $email, $password);
                        if($verificarLogin == true) {
                            echo "
                                <div class='error text-danger mt-3'>Erro ao tentar registrar sua conta.</div>
                            ";
                        } else {
                            $respRegistro = $user->registrarConta($name, $email, $password);
                            if($respRegistro == true) {
                                echo "
                                <div class='error text-success mt-3'>Sucesso ao registrar sua conta, tente <a href='../login/' style='text-decoration: none;'>Logar</a>.</div>
                                ";
                            } else {
                                echo "
                                <div class='error text-danger mt-3'>Erro ao tentar registrar sua conta!</div>
                                ";
                            }
                        }
                    }
                }
            } catch (Exception $error) {
                session_destroy();
                die();
            }
        ?>
    </main>

</body>

</html>
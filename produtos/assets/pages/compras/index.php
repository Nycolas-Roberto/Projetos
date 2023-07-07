<!-- 
    Essa página tem o objetivo de exibir o histórico de compras feitas pelo usuário.
 -->
<?php 
    /*
     * Essa tag PHP aberta tem o intuito de verificar se estamos logados ou não, caso estivermos logado não irá acontercer nada. Porém, caso não estivermos logado, o código irá redirecionar para a página principal do projeto. 
     */
    try {
        session_start(); // Abrir sessão para conseguirmos acessar as variáveis de sessão.
        if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
            echo "";
        } else {
            header("Location: ../../../index.php");
        }
    } catch (Exception $error) {
        session_destroy();
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre minha conta</title>
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-ico">
    <link rel="stylesheet" href="../../style/index.css">
    <link rel="stylesheet" href="../style/about.css">
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .historico-item {
            padding: 10px;
        }
        .imgHistorico {
            width: 120px;
            height: 120px;
            border-radius: 5px;
        }
    </style>
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
                            /**
                             * Esse código PHP irá verificar se estamos logado, caso estivermos logado irá exibir o link (Minhas Compras) e caso ao contrário, irá exibir os links (Entrar e Registrar-se).
                             */
                            try {
                                require_once("../../php/classes/classUser.php"); // Chamando a classe Usuário
                                require_once("../../php/db.php"); // Chamando a conexão de banco de dados
                                if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
                                    $user = new User($connection);
                                    $logado = $user->verificarLogin($_SESSION['login'], $_SESSION['login'], $_SESSION['password']); // Método de verificar se está logado.
                                    if ($logado == true) {
                                        echo "
                                            <li class='nav-item'>
                                                <a class='nav-link links link-animation' aria-current='page' href='../compras/'><i class='bx bxs-shopping-bags'></i> Minhas compras</a>
                                            </li>
                                            ";
                                    } else {
                                        session_destroy();
                                        echo "
                                        <li class='nav-item'>
                                            <a class='nav-link links link-animation' aria-current='page' href='#'><i class='bx bxs-user-circle'></i> Entrar</a>
                                        </li>
                                        ";
                                        header("Location: ../../../index.php");
                                    }
                                } else {
                                    echo "
                                    <li class='nav-item'>
                                        <a class='nav-link links link-animation' aria-current='page' href='#'><i class='bx bxs-user-circle'></i> Entrar</a>
                                    </li>
                                    ";
                                }
                            } catch (Exception $error) {
                                session_destroy();
                                die();
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class='m-3 mt-3 p-3'>
        <h1>Compras Realizadas</h1>
        <p>Nessa página você pode visualizar o histórico de suas compras feitas.</p>
        <?php 
            require_once("../../php/db.php");
            require_once("../../php/classes/classUser.php");
            $idUser = $user->getId($_SESSION['login'], $_SESSION['login']); // Método para capturar ID do usuário
            $sqlHistorico = "SELECT produto.prod_nome,produto.prod_preco,produto.prod_descricao,produto.prod_img FROM produto INNER JOIN users_has_produto_user ON users_has_produto_user.produto_user_idproduto_user = produto.idproduto_user WHERE users_has_produto_user.users_idusers = $idUser"; // Comando SQL para capturar histórico de compras
            $respHistorico = $connection->query($sqlHistorico);
            if(mysqli_num_rows($respHistorico) > 0) {
                while($dataHistorico = mysqli_fetch_assoc($respHistorico)) {
                echo "
                    <h3 class='fs-5 bg-dark text-white d-flex historico-item'>
                        <div class='img'>
                            <img src='../../img/$dataHistorico[prod_img]' alt='' class='imgHistorico'>
                        </div>
                        <div class='ms-2 info w-50'>
                            <p>$dataHistorico[prod_nome]</p>
                            <p>$dataHistorico[prod_descricao]</p>
                            <p>$dataHistorico[prod_preco]</p>
                        </div>
                    </h3>
                ";
                }
            } else {
                echo "
                    <p class='text-danger'>Você não fez nenhuma compra.</p>
                ";
            }

        ?>
    </main>
    <footer class="p-4">
        <h3 class="text-center">Mais Informações</h3>
        <div class="d-flex">
            <div class="infos m-3 w-50">
                <h4 class="fs-5">Redes Sociais</h4>
                <a href="#" class="links-footer"><i class='bx bxl-instagram-alt text-white'></i> Instagram</a>
                <a href="#" class="links-footer"><i class='bx bxl-facebook-circle text-white'></i> Facebook</a>
                <a href="#" class="links-footer"><i class='bx bxs-help-circle text-danger'></i> Solução de Problemas</a>
            </div>
            <div class="infos infos2 m-3 w-50">
                <h4 class="fs-5">Minha conta</h4>
                <?php
                require_once("../../php/classes/classUser.php");
                require_once("../../php/db.php");
                if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                    $user = new User($connection);
                    $logado = $user->verificarLogin($_SESSION['login'], $_SESSION['login'], $_SESSION['password']);
                    if ($logado == true) {
                        echo "
                                <form action='#' method='POST'><button href='#' class='btn btn-outline-danger links-footer' name='btn-sair'><i class='bx bxs-exit'></i> Sair</button></form>
                            ";
                        if (isset($_POST['btn-sair'])) {
                            unset($_SESSION['login']);
                            unset($_SESSION['password']);
                            echo "<script>location.reload(true);</script>";
                        }
                    } else {
                        echo "
                                <a href='assets/pages/login' class='links-footer'><i class='bx bxs-user-circle text-white'></i> Entre</a>
                            ";
                    }
                } else {
                    echo "
                            <a href='assets/pages/login' class='links-footer'><i class='bx bxs-user-circle text-white'></i> Entre</a>
                        ";
                }
                ?>

            </div>
        </div>
        <p class="ms-3 cnpj">CNPJ n.º 03.447.333/0000-00 | CEP 06233-903 - SHOP</p>
    </footer>
</body>
</html>
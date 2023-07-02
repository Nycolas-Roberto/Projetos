<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Geral</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-ico">
    <link rel="stylesheet" href="assets/style/index.css">
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @media screen and (min-width: 769px) {
            .comprar {
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 30%;
                height: 350px;
                background-color: rgba(35, 35, 35);
                z-index: 9999;
                padding: 10px;
                text-align: center;
                border-radius: 10px;
                box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.6);
                transition: .2s;
                transition-timing-function: ease;
            }

            .comprar:hover {
                border-left: 1px solid cyan;
                border-right: 1px solid cyan;
            }

            .fecharPopup {
                position: absolute;
                top: 5px;
                right: 10px;
                cursor: pointer;
            }

            .fecharPopup:hover {
                background-color: rgba(209, 68, 68, 0.911);
            }
        }
    </style>
</head>


<body>
    <div class="comprar text-white">
        <span class='fecharPopup'>&times;</span>
        <p class="text-success fs-5">Produto comprado com sucesso</p>
    </div>
    <header class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <div class="icone-compras"></div>
                </a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link links link-animation" aria-current="page" href="#"><i
                                    class='bx bxs-home'></i> Home</a>
                        </li>
                        <?php
                        try {
                            session_start();
                            require_once("assets/php/classes/classUser.php");
                            require_once("assets/php/db.php");
                            if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                                $user = new User($connection);
                                $logado = $user->verificarLogin($_SESSION['login'], $_SESSION['login'], $_SESSION['password']);
                                if ($logado == true) {
                                    echo "
                                            <li class='nav-item'>
                                                <a class='nav-link links link-animation' aria-current='page' href='assets/pages/compras'><i class='bx bxs-shopping-bags'></i> Minhas compras</a>
                                            </li>
                                            ";
                                } else {
                                    echo "
                                        <li class='nav-item'>
                                            <a class='nav-link links link-animation' aria-current='page' href='assets/pages/login/'><i class='bx bxs-user-circle'></i> Entrar</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='nav-link links link-animation' aria-current='page' href='assets/pages/signup/'><i class='bx bxs-user-circle'></i> Registrar-se</a>
                                        </li>
                                        ";
                                }
                            } else {
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link links link-animation' aria-current='page' href='assets/pages/login/'><i class='bx bxs-user-circle'></i> Entrar</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link links link-animation' aria-current='page' href='assets/pages/signup'><i class='bx bxs-user-circle'></i> Registrar-se</a>
                                    </li>
                                    ";
                            }
                        } catch (Exception $error) {
                            die();
                        }
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="mt-5 container">
    </main>
    <section class="mt-3">
        <div id="carouselExample" class="carousel slide shadow-carousel">
            <div class="carousel-inner">
                <div class="carousel-item active img-carousel01 imgs-carousel">

                </div>
                <div class="carousel-item img-carousel02 imgs-carousel">

                </div>
                <div class="carousel-item img-carousel03 imgs-carousel">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="mt-5">
        <h1 class="mais-comprados border-rgb ">Produtos</h1>
        <div class="d-flex flex-wrap justify-content-center">
            <?php 
                require_once("assets/php/classes/classProd.php");
                require_once("assets/php/db.php");
                $sqlProduto = "SELECT * FROM produto;";
                $respProduto = $connection->query($sqlProduto);
                if(mysqli_num_rows($respProduto) > 0) {
                    while($dataProduto = mysqli_fetch_assoc($respProduto)) {
                        echo "
                            <div class='card m-3' style='width: 18rem;'>
                            <img src='assets/img/$dataProduto[prod_img]' class='card-img-top' alt='notebook'>
                            <div class='card-body'>
                                <h5 class='card-title' name='produto_nome'>$dataProduto[prod_nome]</h5>
                                <p class='card-text' name='produto_desc'>$dataProduto[prod_descricao]</p>
                                <form action='#' method='POST' class='d-flex'>
                                ";
                                if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                                    if ($logado == true) {
                                        echo "
                                                <button class='btn btn-success btn-exibir-popup' name='btn-comprar-produto'>Comprar</button>
                                                <input type='hidden' value='$dataProduto[idproduto_user]' name='produto_id'>
                                            ";
                                    } else {
                                        echo "
                                                <p class='m-2 text-danger'><a href='assets/pages/login' style='text-decoration: none;'>Logar</a></p>
                                            ";
                                    }
                                };
                                echo "
                                    <p class='m-2' name='produto_preco'>R$ $dataProduto[prod_preco]</p>
                                </form>
                                </div>
                            </div>
                        ";
                    }
                }
            ?>
            <?php 
                if(isset($_POST['btn-comprar-produto'])) {
                    $produtoId = $_POST['produto_id'];
                    $idUser = $user->getId($_SESSION['login'], $_SESSION['login']);
                    $sqlComprar = "INSERT INTO `users_has_produto_user`(`users_idusers`, `produto_user_idproduto_user`) VALUES ('$idUser','$produtoId');";
                    $connection->query($sqlComprar);

                }
            ?>
        </div>
    </section>
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
                require_once("assets/php/classes/classUser.php");
                require_once("assets/php/db.php");
                if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                    $user = new User($connection);
                    $logado = $user->verificarLogin($_SESSION['login'], $_SESSION['login'], $_SESSION['password']);
                    if ($logado == true) {
                        echo "
                                <a href='assets/pages/login/about.php' class='links-footer'><i class='bx bxs-user-circle text-white'></i> Sobre</a>
                                <form action='#' method='POST'><button href='assets/pages/compras/index.php' class='btn btn-outline-danger links-footer' name='btn-sair'><i class='bx bxs-exit'></i> Sair</button></form>
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
        <p class="ms-3 cnpj">CNPJ n.º 03.447.333/0820-00 | CEP 06233-903 - SHOP</p>
    </footer>
</body>

</html>
<script src="assets/js/popUps.js"></script>
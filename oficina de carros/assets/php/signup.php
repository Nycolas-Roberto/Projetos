<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doyona - Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- BoxIcons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <!-- Bootstrap -->
</head>
<body style="background-color: rgb(31,31,31)">
    <?php
        session_start();
        try {
            $login = htmlspecialchars(strtolower($_POST['nomeLogin']));
            $senha = htmlspecialchars(strtolower($_POST['senhaLogin']));
            if(strlen($login) <= 50 && strlen($senha) <= 50) {
                require_once('db.php');
                $sqlHash = "SELECT * FROM clientes WHERE cli_nome = '$login' || cli_email = '$login'";
                $respHash = $connection->query($sqlHash);
                if(mysqli_num_rows($respHash) > 0) {
                    while($dataHash = mysqli_fetch_assoc($respHash)) {
                        $hash = $dataHash['cli_senha'];
                        if(password_verify($senha, $hash)) {
                            $_SESSION['login'] = $login;
                            $_SESSION['senha'] = $senha;
                            echo "<div class='bg-success text-center m-auto mt-5 p-3 text-white' style='width: 50vw; border-radius: 5px;'>Sucesso ao logar, <a href='../../index.php' style='text-decoration: none;'>voltar</a> para a página principal.</div>";
                        } else {
                            echo "<div class='error text-white m-3 text-center text-white'><i class='bx bxs-message-alt-error'></i>Falha ao logar, verifique seu parâmetros novamente!</div>";
                        }
                    }
                } else {
                    echo "<div class='error text-white m-3 text-center text-white'><i class='bx bxs-message-alt-error'></i>Falha ao logar, verifique seu parâmetros novamente.</div>";
                }
            }
        } catch (Exception $e) {
            echo "<div class='error text-white m-3 text-center'><i class='bx bxs-message-alt-error'></i>ERRO</div>";
        }
    ?>
</body>
</html>

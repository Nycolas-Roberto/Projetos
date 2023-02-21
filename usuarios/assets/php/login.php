<?php 
    require_once('MySQL.php');
    $email = $_POST['user_email'];
    $senha = $_POST['user_pass'];

    $login = mysqli_query($connection,"SELECT * from users WHERE user_email = '$email' and user_password = '$senha'");

    if(strlen($email) <= 50 && strlen($senha) <= 50) {
        if(strlen($email) >= 1 && strlen($senha) >= 8) {
            if(mysqli_num_rows($login)>0) {
                $id = mysqli_fetch_assoc(mysqli_query($connection,"SELECT user_id FROM users WHERE user_email = '$email' and user_password = '$senha'"));
                $apelido = mysqli_fetch_assoc(mysqli_query($connection,"SELECT user_apelido FROM users WHERE user_email = '$email' and user_password = '$senha'"));
                echo "Login Realizado com sucesso!<br>EMAIL: $email<br>SENHA: $senha<br>ID DA CONTA: ".$id['user_id']."<br>"."APELIDO: ".$apelido['user_apelido'];
            } else {
                die("Usuário não encontrado");
            }
        } else {
            die('VOCÊ PRECISA DIGITAR ALGO PARA LOGAR!');
        }
    } else {
        die('LIMITE DE CARACTERES ATINGIDO');
    }

?>

<?php 
    require_once('MySQL.php');
    $email = $_POST['user_email'];
    $senha = $_POST['user_pass'];
    $apelido = $_POST['user_apelido'];

    if(strlen($email) <= 50 && strlen($senha) <= 50 ) {
        if(strlen($email) >= 1 && strlen($senha) >= 8) {
            $cadastrar = mysqli_query($connection,"INSERT INTO users(user_email,user_password,user_apelido) VALUES ('$email','$senha','$apelido')");
            if($cadastrar==true){
                echo "Cadastrado com Sucesso, você já pode logar!";
            } else {
                die('ERRO AO CADASTRAR-SE');
            }
        } else {
            die('VOCÊ PRECISA DIGITAR ALGO PARA CADASTRAR-SE!');
        }
    } else {
        die('LIMITE DE CARACTERES ATINGIDO');
    }

?>
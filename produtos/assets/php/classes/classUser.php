<?php 
    try {
        class User {
            private $connection;

            public function __construct($connection) {
                $this->connection = $connection;
            }
            public function registrarConta($nome, $email, $senha) {
                if(strlen($nome) >= 3 && isset($email) && strlen($senha) >= 8) {
                    $criptoSenha = password_hash($senha, PASSWORD_DEFAULT);
                    $sqlRegistro = "INSERT INTO users VALUES (default, '$nome','$email','$criptoSenha');";
                    $respRegistro = $this->connection->query($sqlRegistro);
                    if($respRegistro) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }

            public function getPasswordDB($nome, $email) {
                if(strlen($nome) >= 3 && isset($email)) {
                    $sqlGetSenha = "SELECT senha FROM users WHERE nome = '$nome' OR email = '$email';";
                    $respGetSenha = $this->connection->query($sqlGetSenha);
                    if(mysqli_num_rows($respGetSenha) > 0) {
                        while($dataGetSenha = mysqli_fetch_assoc($respGetSenha)) {
                            $senhaCripto = $dataGetSenha['senha'];
                        }
                    }
                    return $senhaCripto;
                }
            }

            public function verificarLogin($nome, $email, $senha) {
                if(strlen($nome) >= 3 && isset($email)) {
                    $sqlLogin01 = "SELECT * FROM users WHERE nome = '$nome' OR email = '$email';";
                    $respLogin01 = $this->connection->query($sqlLogin01);
                    if(mysqli_num_rows($respLogin01) > 0) {
                        $Hash = $this->getPasswordDB($nome, $email);
                        if($Hash !== null) {
                            $next = password_verify($senha, $Hash);
                            if($next == true) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                }
            }

            public function getName($nome,$email) {
                if(strlen($nome) >= 3 && isset($email)) {
                    $sqlGetName = "SELECT nome FROM users WHERE nome = '$nome' OR email = '$email'";
                    $respGetName = $this->connection->query($sqlGetName);
                    if(mysqli_num_rows($respGetName) > 0) {
                        while($dataGetName = mysqli_fetch_assoc($respGetName)) {
                            $nome = $dataGetName['nome'];
                        }
                    }
                    return $nome;
                }
            }

            public function getId($nome,$email) {
                if(strlen($nome) >= 3 && isset($email)) {
                    $sqlGetId = "SELECT idusers FROM users WHERE nome = '$nome' OR email = '$email'";
                    $respGetId = $this->connection->query($sqlGetId);
                    if(mysqli_num_rows($respGetId) > 0) {
                        while($dataGetId = mysqli_fetch_assoc($respGetId)) {
                            $id = $dataGetId['idusers'];
                        }
                    }
                    return $id;
                }
            }

            public function getEmail($nome,$email) {
                if(strlen($nome) >= 3 && isset($email)) {
                    $sqlGetEmail = "SELECT email FROM users WHERE nome = '$nome' OR email = '$email';";
                    $respGetEmail = $this->connection->query($sqlGetEmail);
                    if(mysqli_num_rows($respGetEmail) > 0) {
                        while($dataGetEmail = mysqli_fetch_assoc($respGetEmail)) {
                            $email = $dataGetEmail['email'];
                        }
                    }
                    return $email;
                }
            }

            public function getComprasQtd($idUser) {
                if(isset($idUser)) {
                    $sqlGetComprasQtd = "SELECT count(users_idusers) as qtdCompras FROM users_has_produto_user WHERE users_idusers = $idUser";
                    $respGetComprasQtd = $this->connection->query($sqlGetComprasQtd);
                    if(mysqli_num_rows($respGetComprasQtd) > 0) {
                        while($dataGetComprasQtd = mysqli_fetch_assoc($respGetComprasQtd)) {
                            $qtdCompras = $dataGetComprasQtd['qtdCompras'];
                        }
                    }
                }
                return $qtdCompras;
            }
        }
    } catch (Exception $error) {
        die();
    }

?>
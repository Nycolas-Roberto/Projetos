<?php
    try {
        session_start();
        if (isset($_GET['sair'])) {
            if (isset($_SESSION['login']) && isset($_SESSION['senha']) || isset($_SESSION['loginProf']) && isset($_SESSION['senhaProf'])) {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);

                unset($_SESSION['loginProf']);
                unset($_SESSION['senhaProf']);
                header("Location: ../../Login/pages/seletor.php");
            } else {
                echo "";
            }
        }

    } catch (Exception $e) {
        die();
    }
?>
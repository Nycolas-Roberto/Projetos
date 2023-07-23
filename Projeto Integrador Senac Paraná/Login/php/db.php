<?php
    try {
        $connection = mysqli_connect("localhost", "root", "", "senacparana");
    } catch (Exception $e) {
        die("<div class='error'>Erro ao conectar ao banco de dados</div>");
    }
?>
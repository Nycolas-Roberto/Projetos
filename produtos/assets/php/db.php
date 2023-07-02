<?php 
    try {
        $connection = mysqli_connect("localhost", "root", "", "produtos");
    } catch (Exception $e) {
        mysqli_close($connection);
        die();
    }
?>
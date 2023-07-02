<?php 
    class Produto {
        private $connection;

        public function __construct($connection) {
            $this->connection = $connection;
        }

        public function getNome($idProduto) {
            $sqlProduto = "SELECT prod_nome FROM produto WHERE idproduto_user = $idProduto;";
            $respProduto = $this->connection->query($sqlProduto);
            if(mysqli_num_rows($respProduto) > 0) {
                while($dataProduto = mysqli_fetch_assoc($respProduto)) {
                    $nomeProduto = $dataProduto['prod_nome'];
                }
            }
            return $nomeProduto;
        }
        public function getDesc($idProduto) {
            $sqlProduto = "SELECT prod_descricao FROM produto WHERE idproduto_user = $idProduto;";
            $respProduto = $this->connection->query($sqlProduto);
            if(mysqli_num_rows($respProduto) > 0) {
                while($dataProduto = mysqli_fetch_assoc($respProduto)) {
                    $nomeProduto = $dataProduto['prod_descricao'];
                }
            }
            return $nomeProduto;
        }


        public function getPreco($idProduto) {
            $sqlProduto = "SELECT prod_preco FROM produto WHERE idproduto_user = $idProduto;";
            $respProduto = $this->connection->query($sqlProduto);
            if(mysqli_num_rows($respProduto) > 0) {
                while($dataProduto = mysqli_fetch_assoc($respProduto)) {
                    $nomeProduto = $dataProduto['prod_preco'];
                }
            }
            return $nomeProduto;
        }
    }
?>
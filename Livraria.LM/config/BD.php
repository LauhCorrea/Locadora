<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=livro" ,
                "root" ,
                "root"
            );

            return $conn;
        }
    }
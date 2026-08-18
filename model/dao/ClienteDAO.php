<?php 
    class ClienteDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM cliente");
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }
?>
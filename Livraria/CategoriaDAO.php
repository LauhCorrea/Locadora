<?php 
    class CategoriaDAO {
        public function create($categoria) {
            try {
                $query = BD::getConexao()->prepare("INSERT INTO Categoria(nome_categoria) VALUES (:x)");
                $query->bindValue(':x', $categoria->getNome_categoria(),PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
             catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }  
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Categoria");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaCategoria = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $categoria = new Categoria(); // Classe bean
                    $categoria->setId($linha['id_Categoria']);
                    $categoria->setNome_categoria($linha['nome_categoria']);

                    array_push($listaCategoria, $categoria);
                }
                
                return $listaCategoria;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }
    }
?>
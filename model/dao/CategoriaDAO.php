<?php 
    class CategoriaDAO {
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
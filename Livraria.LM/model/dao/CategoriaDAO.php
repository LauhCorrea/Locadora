<?php 
    class CategoriaDAO {
        public function create($categoria) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO categoria(nome_categoria) 
                    VALUES (:n)"
                );
                $query->bindValue(':n', $categoria->getNome_categoria(), PDO::PARAM_STR);
    

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
                $query = BD::getConexao()->prepare("SELECT * FROM categoria");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
                $listaCategoria = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $categoria = new Categoria(); //Clase bean
                    $categoria->setId($linha['id_Categoria']);
                    $categoria->setNome_categoria($linha['nome_categoria']);
                
                   
                    array_push($listaCategoria, $categoria);
                }
                return $listarCategoria;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM categoria WHERE id_Categoria= :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria(); //Clase bean
                    $categoria->setId($linha['id_Categoria']);
                    $categoria->setNome_categoria($linha['nome_categoria']);
                   
                }
                return $categoria;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }
    


        public function update($categoria) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE categoria SET nome = :n, 
                    WHERE id_Categoria = :i"
                );
                $query->bindValue(':i', $categoria->getId_Categoria(), PDO::PARAM_STR);
                $query->bindValue(':n', $categoria->getNome_categoria(), PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM categoria
                    WHERE id_Categoria = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }
    ?>
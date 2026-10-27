<?php
    class LivroDAO {
        public function create($livro) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO livro(titulo, autor, editora, estoque, estoque, id_Categoria) 
                    VALUES (:t, :a, :e, :p, :q, :c)"
                );
                $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':a', $livro->getAutor(), PDO::PARAM_INT);
                $query->bindValue(':e', $livro->getEditora(), PDO::PARAM_STR);
                $query->bindValue(':p', $livro->getestoque(), PDO::PARAM_INT);
                $query->bindValue(':q', $livro->getEstoque(), PDO::PARAM_INT);
                //Bind para chave estrangeira
                $query->bindValue(':c', $livro->getCategoria()->getId(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM livro");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listalivros = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $livro = new livro(); // Classe bean
                    $livro->setId($linha['id_livro']);
                    $livro->setTitulo($linha['titulo']);
                    $livro->setAutor($linha['autor']);
                    $livro->setEditora($linha['editora']);
                    $livro->setEstoque($linha['preco']);
                    $livro->setEstoque($linha['estoque']);
                    //Atributo da associação com Categoria
                    $daoCategoria = new CategoriaDAO();
                    $categoria = $daoCategoria->find($linha['id_Categoria']);
                    $livro->setCategoria($categoria);

                    array_push($listalivros, $livro);
                }
                
                return $listalivros;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM livro WHERE id_livro = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $livro = new livro(); // Classe bean
                    $livro->setId($linha['id_livro']);
                    $livro->setTitulo($linha['titulo']);
                    $livro->setAutor($linha['autor']);
                    $livro->setEditora($linha['editora']);
                    $livro->setEstoque($linha['preco']);
                    $livro->setEstoque($linha['estoque']);
                }
                
                return $livro;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }

        public function update($livro) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE livro
                    SET titulo = :t, autor = :a, editora = :e, preco = :p, estoque = :q
                    WHERE id_livro = :i"
                );
                $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':a', $livro->getAutor(), PDO::PARAM_INT);
                $query->bindValue(':s', $livro->getEditora(), PDO::PARAM_STR);
                $query->bindValue(':e', $livro->getPreco(), PDO::PARAM_INT);
                $query->bindValue(':i', $livro->getestoque(), PDO::PARAM_INT);
                $query->bindValue(':i', $livro->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM livro
                    WHERE id_livro = :i"
                );                
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }
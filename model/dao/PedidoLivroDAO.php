
<?php
    class PedidoLivroDAO {

        
        public function create($PedidoLivro) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO pedido_has_livro1
                    (quantidade, Pedido_id_Pedido, Livro_id_Livro)
                    VALUES (:q, :p, :L)"
                );

                $query->bindValue(':q', $PedidoLivro->getQuantidade(), PDO::PARAM_INT);
                $query->bindValue(':p', $PedidoLivro->getPedido()->getId_Pedido(), PDO::PARAM_INT);
                $query->bindValue(':L', $PedidoLivro->getLivro()->getId(), PDO::PARAM_INT);


                if (!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch (PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }


        public function read($id_Pedido) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM pedido_has_livro1 WHERE Pedido_id_Pedido = :p");
                $query->bindValue(':p', $id_Pedido, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaPedidoLivros = array();

                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $PedidoLivro = new PedidoLivro();

                    $PedidoLivro->setQuantidade($linha['quantidade']);
                  

                    // Associação com Pedido
                    $daoPedido = new PedidoDAO();
                    $pedido = $daoPedido->find($linha['Pedido_id_Pedido']);
                    $PedidoLivro->setPedido($pedido);

                    // Associação com Livro
                    $daoLivro = new LivroDAO();
                    $livro = $daoLivro->find($linha['Livro_id_Livro']);
                    $PedidoLivro->setLivro($livro);

                    array_push($listaPedidoLivros, $PedidoLivro);
                }

                return $listaPedidoLivros;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        

        public function destroy($idPedido, $idLivro) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM PedidoLivro
                    WHERE Pedido_id_Pedido = :i and Livro_id_Livro = :l"
                );

                $query->bindValue(':i', $idPedido, PDO::PARAM_INT);
                $query->bindValue(':l', $idLivro, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }

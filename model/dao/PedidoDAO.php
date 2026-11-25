
<?php
    class PedidoDAO {

        
        public function create($pedido) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO pedido
                    (data_pedido, valor_total, status, Pagamento_id_Pagamento, Cliente_id_Cliente)
                    VALUES (:d, :v, :s, :p, :c)"
                );

                $query->bindValue(':d', $pedido->getDataPedido(), PDO::PARAM_STR);
                $query->bindValue(':v', $pedido->getValorTotal());
                $query->bindValue(':s', $pedido->getStatus(), PDO::PARAM_STR);

                // Chave estrangeira Pagamento
                $query->bindValue(':p', $pedido->getPagamento()->getId(), PDO::PARAM_INT);

                // Chave estrangeira Cliente
                $query->bindValue(':c', $pedido->getCliente()->getId(), PDO::PARAM_INT);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch (PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }


        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM pedido");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaPedidos = array();

                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $pedido = new Pedido();

                    $pedido->setId_Pedido($linha['id_Pedido']);
                    $pedido->setDataPedido($linha['data_pedido']);
                    $pedido->setValorTotal($linha['valor_total']);
                    $pedido->setStatus($linha['status']);

                    // Associação com Pagamento
                    $daoPagamento = new PagamentoDAO();
                    $pagamento = $daoPagamento->find($linha['Pagamento_id_Pagamento']);
                    $pedido->setPagamento($pagamento);

                    // Associação com Cliente
                    $daoCliente = new ClienteDAO();
                    $cliente = $daoCliente->find($linha['Cliente_id_Cliente']);
                    $pedido->setCliente($cliente);

                    array_push($listaPedidos, $pedido);
                }

                return $listaPedidos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM pedido WHERE id_Pedido = :i"
                );

                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $pedido = null;

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $pedido = new Pedido();

                    $pedido->setId_Pedido($linha['id_Pedido']);
                    $pedido->setDataPedido($linha['data_pedido']);
                    $pedido->setValorTotal($linha['valor_total']);
                    $pedido->setStatus($linha['status']);

                    // Associação com Pagamento
                    $daoPagamento = new PagamentoDAO();
                    $pagamento = $daoPagamento->find($linha['Pagamento_id_Pagamento']);
                    $pedido->setPagamento($pagamento);

                    // Associação com Cliente
                    $daoCliente = new ClienteDAO();
                    $cliente = $daoCliente->find($linha['Cliente_id_Cliente']);
                    $pedido->setCliente($cliente);
                }

                return $pedido;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($pedido) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE pedido
                    SET data_pedido = :d,
                        valor_total = :v,
                        status = :s,
                        Pagamento_id_Pagamento = :p,
                        Cliente_id_Cliente = :c
                    WHERE id_Pedido = :i"
                );

                $query->bindValue(':d', $pedido->getDataPedido(), PDO::PARAM_STR);
                $query->bindValue(':v', $pedido->getValorTotal());
                $query->bindValue(':s', $pedido->getStatus(), PDO::PARAM_STR);

                // Bind para chave estrangeira Pagamento
                $query->bindValue(':p', $pedido->getPagamento()->getId(), PDO::PARAM_INT);

                // Bind para chave estrangeira Cliente
                $query->bindValue(':c', $pedido->getCliente()->getId(), PDO::PARAM_INT);

                $query->bindValue(':i', $pedido->getId_Pedido(), PDO::PARAM_INT);

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
                    "DELETE FROM pedido
                    WHERE id_Pedido = :i"
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

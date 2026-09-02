<?php 
    class PagamentoDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Pagamento");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaPagamento = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $pagamento = new Pagamento(); // Classe bean
                    $pagamento->setId($linha['id_Pagamento']);
                    $pagamento->setForma_pagamento($linha['forma_pagamento']);

                    array_push($listaPagamento, $pagamento);
                }
                
                return $listaPagamento;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }
    }
?>
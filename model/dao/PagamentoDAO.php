<?php 
    class PagamentoDAO {
        public function create($pagamento) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO pagamento(forma_pagamento) 
                    VALUES (:n)"
                );
                $query->bindValue(':n', $pagamento->getForma_pagamento(), PDO::PARAM_STR);
    

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

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM pagamento WHERE id_Pagamento= :i");
                $query->bindValue(':i', $id, PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $pagamento = new pagamento(); //Clase bean
                    $pagamento->setId($linha['id_Pagamento']);
                    $pagamento->setForma_pagamento($linha['forma_pagamento']);
                   
                }
                return $pagamento;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }
    


        public function update($pagamento) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE pagamento SET forma_pagamento= :n 
                    WHERE id_Pagamento = :i"
                );
                $query->bindValue(':i', $pagamento->getId(), PDO::PARAM_STR);
                $query->bindValue(':n', $pagamento->getForma_pagamento(), PDO::PARAM_STR);

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
                    "DELETE FROM pagamento
                    WHERE id_Pagamento = :i"
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
<?php 
    class ClienteDAO {
        public function create($cliente) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO cliente(nome, email, senha, telefone, tipo_usuario) 
                    VALUES (:n, :e, :s, :t, :tp)"
                );
                $query->bindValue(':n', $cliente->getNome(), PDO::PARAM_STR);
                $query->bindValue(':e', $cliente->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':s', $cliente->getSenha(), PDO::PARAM_STR);
                $query->bindValue(':t', $cliente->getTelefone(), PDO::PARAM_STR);
                $query->bindValue(':tp', $cliente->getTipo_usuario(), PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM cliente");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
                $listaClientes = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $cliente = new Cliente(); //Clase bean
                    $cliente->setId($linha['id_cliente']);
                    $cliente->setNome($linha['nome']);
                    $cliente->setEmail($linha['email']);
                    $cliente->setSenha($linha['senha']);
                    $cliente->setTelefone($linha['telefone']);
                    $cliente->setTipo_usuario($linha['tipo_usuario']);
                   
                    array_push($listaClientes, $cliente);
                }
                return $listarClientes;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM cliente WHERE id_cliente= :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $cliente = new Cliente(); //Clase bean
                    $cliente->setId($linha['id_Cliente']);
                    $cliente->setNome($linha['nome']);
                    $cliente->setEmail($linha['email']);
                    $cliente->setSenha($linha['senha']);
                    $cliente->setTelefone($linha['telefone']);
                    $cliente->setTipo_usuario($linha['tipo_usuario']);
                   
                }
                return $cliente;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }
    


        public function update($cliente) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE cliente SET nome = :n, email = :e, senha = :s, telefone = :t, ripo_usuario = :tp 
                    WHERE id_cliente = :i"
                );
                $query->bindValue(':i', $cliente->getId(), PDO::PARAM_STR);
                $query->bindValue(':n', $cliente->getNome(), PDO::PARAM_STR);
                $query->bindValue(':e', $cliente->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':s', $cliente->getSenha(), PDO::PARAM_STR);
                $query->bindValue(':t', $cliente->getTelefone(), PDO::PARAM_STR);
                $query->bindValue(':tp', $cliente->getTipo_usuario(), PDO::PARAM_STR);

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
                    "DELETE FROM cliente
                    WHERE id_cliente = :i"
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
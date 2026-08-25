<?php 
    class ClienteDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM cliente");

                if(!$query->execute()) {
                    print r($queri->errorInfo());
                }
                $listaClientes = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linhas) {
                    $cliente = new Cliente(); //Clase bean
                    $cliente->setId($linha['id_cliente']);
                    $cliente->setId($linha['nome']);
                    $cliente->setId($linha['email']);
                    $cliente->setId($linha['senha']);
                    $cliente->setId($linha['telefone']);
                    $cliente->setId($linha['tipo_usuario']);
                   
                    array_push($listaClientes, $cliente);
                }
                return $listarCllientes;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }
?>
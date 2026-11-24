
<?php
    class Pedido {
        // Atributos
        private $id_Pedido;
        private $dataPedido;
        private $valorTotal;
        private $status;
        private $pagamento; // Associação com classe Pagamento
        private $cliente; // Associação com classe Cliente

        // Métodos de encapsulamento (getters e setters)
        public function getId_Pedido() {
            return $this->id_Pedido;
        }

        public function setId_Pedido($id_Pedido) {
            $this->id_Pedido = $id_Pedido;
        }

        public function getDataPedido() {
            return $this->dataPedido;
        }

        public function setDataPedido($dataPedido) {
            $this->dataPedido = $dataPedido;
        }

        public function getValorTotal() {
            return $this->valorTotal;
        }

        public function setValorTotal($valorTotal) {
            $this->valorTotal = $valorTotal;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        // Get Set do atributo da associação com Pagamento
        public function getPagamento() {
            return $this->pagamento;
        }

        public function setPagamento($pagamento) {
            $this->pagamento = $pagamento;
        }

        // Get Set do atributo da associação com Cliente
        public function getCliente() {
            return $this->cliente;
        }

        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }
    }

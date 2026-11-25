
<?php
    class PedidoLivro {
        // Atributos
        private $pedido;
        private $livro;
        private $quantidade;
        
        // Métodos de encapsulamento (getters e setters)
        public function getQuantidade() {
            return $this->quantidade;
        }

        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }
        
        // Get Set do atributo da associação com Pagamento
        public function getPedido() {
            return $this->pedido;
        }

        public function setPedido($pedido) {
            $this->pedido = $pedido;
        }

        // Get Set do atributo da associação com Cliente
        public function getLivro() {
            return $this->livro;
        }

        public function setLivro($livro) {
            $this->livro = $livro;
        }
    }

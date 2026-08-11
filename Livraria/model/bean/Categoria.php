<?php
    class Cliente {
        //Atributos
        private $id;
        private $nome_categoria;

        //Métodos construtores
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome_categoria() {
            return $this->nome_categoria_categoria;
        }

        public function setNome_categoria($nome_categoria) {
            $this->nome_categoria = $nome_categoria;
        }
    }
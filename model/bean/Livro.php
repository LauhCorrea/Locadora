<?php
    class Livro {
        // Atributos
        private $id;
        private $titulo;
        private $autor;
        private $editora;
        private $preco; 
        private $estoque; //Associação com classe categoria

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function setAutor($autor) {
            $this->autor = $autor;
        }

        public function geteditora() {
            return $this->editora;
        }

        public function seteditora($editora) {
            $this->editora = $editora;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }
        
         public function getEstoque() {
            return $this->estoque;
        }

        public function setEstoque($estoque) {
            $this->estoque = $estoque;
        }

        //Get Set do atributo da associação
        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }
    }
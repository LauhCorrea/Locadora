<?php
    class Cliente {
        //Atributos
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $telefone;
        private $tipo_usuario;

        //Métodos construtores
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

         public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        
        public function getTipo_usuario() {
            return $this->tipo_usuario;
        }

        public function setTipo_usuario($tipo_usuario) {
            $this->tipo_usuario = $tipo_usuario;
        }

    }
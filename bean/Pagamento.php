<?php
    class Pagamento {
        //Atributos
        private $id;
        private $forma_pagamento;

        //Métodos construtores
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getForma_pagamento() {
            return $this->forma_pagamento;
        }

        public function setForma_pagamento($forma_pagamento) {
            $this->forma_pagamento = $forma_pagamento;
        }
    }
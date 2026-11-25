<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $pagamento = new pagamento();

    // Definir os valores dos atributos a partir do form
    $pagamento->setForma_pagamento($_POST['nome']);


    // Instanciar um objeto da classe ClienteDAO
    $dao = new PagamentoDAO();

    // Invocar o método create
    $dao->create($pagamento);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');
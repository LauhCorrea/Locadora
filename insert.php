<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $cliente = new Cliente();

    // Definir os valores dos atributos a partir do form
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefone($_POST['telefone']);

    // Instanciar um objeto da classe ClienteDAO
    $dao = new ClienteDAO();

    // Invocar o método create
    $dao->create($cliente);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');
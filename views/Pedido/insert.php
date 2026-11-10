<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe pedido (bean)
    $pedido = new Pedido();

    // Definir os valores dos atributos a partir do form
    $pedido->setNome($_POST['nome']);
    $pedido->setEmail($_POST['email']);
    $pedido->setSenha($_POST['senha']);
    $pedido->setTelefone($_POST['telefone']);
    $pedido->setTipo_usuario($_POST['tipo_usuario']);


    // Instanciar um objeto da classe pedidoDAO
    $dao = new pedidoDAO();

    // Invocar o método create
    $dao->create($pedido);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');
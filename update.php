<?php
    require "../../autoload.php";

    //instanciar objeto da classe pedido (bean)
    $pedido = new Pedido();

    //Definir os valores dos atributos a partir dos dados do form

    $pedido->setNome($_POST['nome']);
    $pedido->setEmail($_POST['email']);
    $pedido->setSenha($_POST['senha']);
    $pedido->setTelefone($_POST['telefone']);
    $pedido->setTipo_usuario($_POST['tipo_usuario']);
    $pedido->setId($_POST['id']);

    //instanciar objeto da classe pedidoDAO
    $dao = new pedidoDAO();

    //invocar o metodo update da classe pedidoDAO
    $dao->update($pedido);

    //redirecionar para o index 
    header('Location: index.php');
?>
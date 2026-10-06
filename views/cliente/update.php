<?php
    require "../../autoload.php";

    //instanciar objeto da classe cliente (bean)
    $cliente = new Cliente();

    //Definir os valores dos atributos a partir dos dados do form

    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setSenha($_POST['senha']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setTipo_usuario($_POST['tipo_usuario']);
    $cliente->setId($_POST['id']);

    //instanciar objeto da classe ClienteDAO
    $dao = new ClienteDAO();

    //invocar o metodo update da classe ClienteDAO
    $dao->update($cliente);

    //redirecionar para o index 
    header('Location: index.php');
?>
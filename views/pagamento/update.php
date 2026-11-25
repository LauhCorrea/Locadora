<?php
    require "../../autoload.php";

    //instanciar objeto da classe cliente (bean)
    $pagamento = new Pagamento();

    //Definir os valores dos atributos a partir dos dados do form

    $pagamento->setforma_pagamento($_POST['forma_pagamento']);
    $pagamento->setId($_POST['id']);

    //instanciar objeto da classe ClienteDAO
    $dao = new PagamentoDAO();

    //invocar o metodo update da classe ClienteDAO
    $dao->update($pagamento);

    //redirecionar para o index 
    header('Location: index.php');
?>
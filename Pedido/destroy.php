<?php
    require "../../autoload.php";

    //coletar o valor do ID pela URL
    $id = $_GET['id'];

    //instanciar um objeto da classe PedidoDAO
    $dao = new PedidoDAO();

    //invocar o método para excluir
    $dao->destroy ($id);

    //redirecionar para index
    header('Location: index.php');
?>
<?php
    require "../../autoload.php";

    //coletar o valor do ID pela URL
    $id = $_GET['idPedido'];

    //instanciar um objeto da classe PedidoDAO
    $dao = new PedidoLivroDAO();

    //invocar o método para excluir
    $dao->destroy ($id);

    //redirecionar para index
    header('Location: create.php?id=' . $_POST['idPedido']);
?>
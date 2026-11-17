<?php
    require "../../autoload.php";

    //coletar o valor do ID pela URL
    $id = $_GET['id'];

    //instanciar um objeto da classe ClienteDAO
    $dao = new CategoriaDAO();

    //invocar o método para excluir
    $dao->destroy ($id);

    //redirecionar para index
    header('Location: index.php');
?>
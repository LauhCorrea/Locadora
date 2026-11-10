<?php
    require "../../autoload.php";

    //coletar o valor do ID pela URL
    $id = $_GET['id'];

    //instanciar um objeto da classe LivroDAO
    $dao = new LivroDAO();

    //invocar o método para excluir
    $dao->destroy ($id);

    //redirecionar para index
    header('Location: index.php');
?>
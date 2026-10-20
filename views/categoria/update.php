<?php
    require "../../autoload.php";

    //instanciar objeto da classe cliente (bean)
    $categoria = new Categoria();

    //Definir os valores dos atributos a partir dos dados do form

    $categoria->setNome_categoria($_POST['nome_categoria']);
    $categoria->setId($_POST['id']);

    //instanciar objeto da classe ClienteDAO
    $dao = new CategoriaDAO();

    //invocar o metodo update da classe ClienteDAO
    $dao->update($categoria);

    //redirecionar para o index 
    header('Location: index.php');
?>
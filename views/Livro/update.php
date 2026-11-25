<?php
    require "../../autoload.php";

    //instanciar objeto da classe livro (bean)
    $livro = new livro();

    //Definir os valores dos atributos a partir dos dados do form

    $livro->setTitulo($_POST['titulo']);
    $livro->setAutor($_POST['autor']);
    $livro->setEditora($_POST['editora']);
    $livro->setPreco($_POST['preco']);
    $livro->setEstoque($_POST['estoque']);
    $livro->setId($_POST['id']);
     // Instanciar um objeto da Categoria
    $categoria = new Categoria();
    $categoria->setId($_POST['id_Categoria']);

    // Definir a categoria no filme
    $livro->setCategoria($categoria);

    //instanciar objeto da classe livroDAO
    $dao = new livroDAO();

    //invocar o metodo update da classe livroDAO
    $dao->update($livro);

    //redirecionar para o index 
    header('Location: index.php');
?>
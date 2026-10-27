<?php
    require "../../autoload.php";

    //instanciar objeto da classe livro (bean)
    $livro = new livro();

    //Definir os valores dos atributos a partir dos dados do form

    $livro->setNome($_POST['titulo']);
    $livro->setEmail($_POST['autor']);
    $livro->setSenha($_POST['editora']);
    $livro->setTelefone($_POST['preco']);
    $livro->setTipo_usuario($_POST['estoque']);
    $livro->setId($_POST['id']);

    //instanciar objeto da classe livroDAO
    $dao = new livroDAO();

    //invocar o metodo update da classe livroDAO
    $dao->update($livro);

    //redirecionar para o index 
    header('Location: index.php');
?>
<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe livro (bean)
    $livro = new livro();

    // Definir os valores dos atributos a partir do form
    $livro->setTitulo($_POST['titulo']);
    $livro->setAutor($_POST['autor']);
    $livro->setEditora($_POST['editora']);
    $livro->setPreco($_POST['preco']);
    $livro->setEstoque($_POST['estoque']);

    //Instanciar um objeto da Categoria
    $categoria = new Categoria();
    $categoria->setId($_POST['id_Categoria']);

    //Definir a categoria do Livro
    $livro->SetCategoria($categoria);

    // Instanciar um objeto da classe livroDAO
    $dao = new livroDAO();

    // Invocar o método create
    $dao->create($livro);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');
<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $categoria = new Categoria();

    // Definir os valores dos atributos a partir do form
    $cliente->setNome_categoria($_POST['nome_categoria']);


    // Instanciar um objeto da classe ClienteDAO
    $dao = new CategoriaDAO();

    // Invocar o método create
    $dao->create($categoria);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');
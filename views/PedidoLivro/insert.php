<?php
require "../../autoload.php";

// Instanciar o pedido
$PedidoLivro = new PedidoLivro();

// Definir os dados do pedido
$PedidoLivro->setQuantidade($_POST['quantidade']);

// Buscar o pagamento Pedido
$daoPedido = new PedidoDAO();
$pedido = $daoPedido->find($_POST['idPedido']);
$PedidoLivro->setPedido($pedido);

// Buscar o Livro selecionado
$daoLivro = new LivroDAO();
$livro = $daoLivro->find($_POST['Livro_id_Livro']);
$PedidoLivro->setLivro($livro);

// Criar o pedido
$dao = new PedidoLivroDAO();
$dao->create($PedidoLivro);

// Redirecionar
header('Location: create.php?id=' . $_POST['idPedido']);
exit;

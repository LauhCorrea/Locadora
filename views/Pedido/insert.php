<?php
require "../../autoload.php";

// Instanciar o pedido
$pedido = new Pedido();

// Definir os dados do pedido
$pedido->setDataPedido($_POST['data_pedido']);
$pedido->setValorTotal($_POST['valor_total']);
$pedido->setStatus($_POST['status']);

// Buscar o pagamento selecionado
$daoPagamento = new PagamentoDAO();
$pagamento = $daoPagamento->find($_POST['Pagamento_id_Pagamento']);
$pedido->setPagamento($pagamento);

// Buscar o cliente selecionado
$daoCliente = new ClienteDAO();
$cliente = $daoCliente->find($_POST['Cliente_id_Cliente']);
$pedido->setCliente($cliente);

// Criar o pedido
$dao = new PedidoDAO();
$dao->create($pedido);

// Redirecionar
header('Location: index.php');
exit;

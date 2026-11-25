<?php
    require "../../autoload.php";

    //instanciar objeto da classe pedido (bean)
    $pedido = new Pedido();

    //Definir os valores dos atributos a partir dos dados do form


    // Definir os dados do pedido
    $pedido->setDataPedido($_POST['data_pedido']);
    $pedido->setValorTotal($_POST['valor_pedido']);
    $pedido->setStatus($_POST['status']);

    // Buscar o pagamento selecionado
    $daoPagamento = new PagamentoDAO();
    $pagamento = $daoPagamento->find($_POST['Pagamento_id_Pagamento']);
    $pedido->setPagamento($pagamento);

    // Buscar o cliente selecionado
    $daoCliente = new ClienteDAO();
    $cliente = $daoCliente->find($_POST['Cliente_id_Cliente']);
    $pedido->setCliente($cliente);
    
    $pedido->setId_Pedido($_POST['id']);

    //instanciar objeto da classe pedidoDAO
    $dao = new pedidoDAO();

    //invocar o metodo update da classe pedidoDAO
    $dao->update($pedido);

    //redirecionar para o index 
    header('Location: index.php');
?>
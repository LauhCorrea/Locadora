
<?php
    // Incluir o arquivo para carregamento das classes
    require "../../autoload.php";

    // Instanciar um objeto da classe DAO
    $dao = new PedidoDAO();
?>

<!doctype html>
<html lang="pt-br" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gerenciamento de Pedidos</title>

    <script src="../../js/color-modes.js"></script>

    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../css/dashboard.css" rel="stylesheet" />

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow"
        data-bs-theme="dark">

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">
            Sistema de Livraria
        </a>

    </header>

    <div class="container-fluid">
        <div class="row">

            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">

                <div class="offcanvas-md offcanvas-end bg-body-tertiary"
                    tabindex="-1" id="sidebarMenu">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">Sistema</h5>

                        <button type="button" class="btn-close"
                            data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu">
                        </button>
                    </div>

                    <?php include "../menu/navbar.php" ?>

                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <h1 class="h2">Gerenciamento de Pedidos :D</h1>

                </div>

                <div class="mb-3">
                    <a href="create.php" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Novo Pedido
                    </a>
                </div>

                <div class="table-responsive">

                    <table class="table table-hover table-bordered">

                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Data do Pedido</th>
                                <th>Valor Total</th>
                                <th>Status</th>
                                <th>Pagamento</th>
                                <th>Cliente</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach($dao->read() as $pedido) : ?>

                            <tr>

                                <td>
                                    <?= $pedido->getId() ?>
                                </td>

                                <td>
                                    <?= $pedido->getDataPedido() ?>
                                </td>

                                <td>
                                    R$ <?= number_format($pedido->getValorTotal(), 2, ',', '.') ?>
                                </td>

                                <td>
                                    <?= $pedido->getStatus() ?>
                                </td>

                                <td>
                                    <?= $pedido->getPagamento()->getId() ?>
                                </td>

                                <td>
                                    <?= $pedido->getCliente()->getNome() ?>
                                </td>

                                <td>

                                    <a title="Editar"
                                        class="btn btn-warning btn-sm"
                                        href="edit.php?id=<?= $pedido->getId() ?>">

                                        <i class="bi bi-pen"></i>

                                    </a>

                                    <a title="Excluir"
                                        class="btn btn-danger btn-sm"
                                        href="destroy.php?id=<?= $pedido->getId() ?>"
                                        onclick="return confirm('Deseja realmente excluir este pedido?')">

                                        <i class="bi bi-trash3"></i>

                                    </a>

                                </td>

                            </tr>

                            <?php endforeach ?>

                        </tbody>

                    </table>

                </div>

            </main>

        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/dashboard.js"></script>

</body>
</html>

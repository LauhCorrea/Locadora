<?php
    require "../../autoload.php";

    $daoLivro = new LivroDAO();
    $PedidoLivro = new PedidoLivroDAO();
?>
<!doctype html>
<html lang="pt-br" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastrar Pedido</title>

    <script src="../../js/color-modes.js"></script>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../css/dashboard.css" rel="stylesheet" />
</head>

<body>

    <?php
    // Inclua os arquivos necessários para utilizar a classe Livro
    // e a classe Pedido, conforme a estrutura do seu projeto.
    ?>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow"
        data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">
            Sistema
        </a>
    </header>

    <div class="container-fluid">
        <div class="row">

            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary"
                    tabindex="-1" id="sidebarMenu">

                    <?php include "../menu/navbar.php" ?>

                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Adicionar Livro ao Pedido # <?= $_GET['id'] ?></h1>
                </div>

                <div class="table-responsive small">

                    <form action="insert.php" method="post">

                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" name="quantidade" id="quantidade"
                                class="form-control" step="0.01" min="0" required>
                        </div>

                        <div class="form-group">
                            <label for="Livro_id_Livro">Livro</label>

                            <select name="Livro_id_Livro"
                                id="Livro_id_Livro"
                                class="form-control" required>

                                <option value="">Selecione o Livro</option>

                                <?php
                                foreach ($daoLivro->read() as $Livro) {
                                ?>

                                <option value="<?= $Livro->getId() ?>">
                                    <?= $Livro->getTitulo() ?>
                                </option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div>
                            <input type="hidden" name="idPedido" value="<?= $_GET['id'] ?>">
                        </div>

                        <br>

                        <div class="form-group">
                            <input type="reset" value="Limpar" class="btn btn-secondary">
                            <input type="submit" value="Salvar" class="btn btn-success">
                        </div>

                    </form>

                </div>

                <!-- Inserir uma tabela com os cadastrados -->
                <div class="table-responsive small">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Quantidade</th>
                                <th>Título</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($PedidoLivro->read( $_GET['id'] ) as $PedidoLivro) : ?>
                                <tr>
                                    <td>
                                        <?= $PedidoLivro->getQuantidade() ?>
                                    </td>

                                    <td>
                                        <?= $PedidoLivro->getLivro()->getTitulo() ?>
                                    </td>

                                    
                            <?php endforeach; ?>
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
```